<?php

namespace MantineLivewire\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use MantineLivewire\Support\ComponentRegistry;
use Barryvdh\LaravelIdeHelper\Console\GeneratorCommand;

class GenerateIdeHelpersCommand extends GeneratorCommand
{
    protected $name = 'mantinelivewire:ide-helpers';
    protected $description = 'Generate IDE helper files for MantineLivewire components';

    public function handle()
    {
        $this->info('Generating IDE helpers for MantineLivewire components...');

        // Generate component documentation
        $this->generateComponentDocs();

        // Generate trait documentation
        $this->generateTraitsDocs();

        // Generate Laravel IDE Helper files
        $this->call('ide-helper:generate');
        $this->call('ide-helper:meta');

        $this->info('IDE helpers generated successfully!');
    }

    protected function generateComponentDocs()
    {
        $components = ComponentRegistry::all();
        $docsContent = "<?php\n\n/**\n * MantineLivewire IDE Helper\n *\n * @author MantineLivewire\n */\n\n";
        
        // Common props that all components can use
        $commonProps = [
            'variant' => ['filled', 'light', 'outline', 'subtle', 'default', 'white'],
            'color' => ['primary', 'secondary', 'success', 'warning', 'error'],
            'size' => ['xs', 'sm', 'md', 'lg', 'xl'],
            'radius' => ['xs', 'sm', 'md', 'lg', 'xl'],
        ];

        $docsContent .= "namespace MantineLivewire\\Components {\n\n";

        // Base component class documentation
        $docsContent .= "\t/**\n";
        $docsContent .= "\t * @method static self make(array \$props = [])\n";
        $docsContent .= "\t * @method self withProps(array \$props)\n";
        foreach ($commonProps as $prop => $values) {
            $valuesStr = implode('|', $values);
            $docsContent .= "\t * @property-read string \${$prop} {$valuesStr}\n";
        }
        $docsContent .= "\t */\n";
        $docsContent .= "\tclass MantineComponent {}\n\n";

        // Individual component documentation
        foreach ($components as $name => $component) {
            $className = class_basename($component);
            $docsContent .= "\t/**\n";
            $docsContent .= "\t * {$className} Component\n";
            $docsContent .= "\t *\n";
            
            // Add component-specific props
            $this->addComponentSpecificProps($docsContent, $className);
            
            $docsContent .= "\t * @method static self make(array \$props = [])\n";
            $docsContent .= "\t * @method self withProps(array \$props)\n";
            foreach ($commonProps as $prop => $values) {
                $valuesStr = implode('|', $values);
                $docsContent .= "\t * @property-read string \${$prop} {$valuesStr}\n";
            }
            $docsContent .= "\t */\n";
            $docsContent .= "\tclass {$className} extends MantineComponent {}\n\n";
        }

        $docsContent .= "}\n";

        File::put(base_path('_ide_helper_mantinelivewire.php'), $docsContent);
    }

    protected function addComponentSpecificProps(&$docsContent, $className)
    {
        // Add component-specific props based on the component type
        switch ($className) {
            case 'Button':
                $docsContent .= "\t * @property-read string \$type button|submit|reset\n";
                $docsContent .= "\t * @property-read bool \$loading\n";
                $docsContent .= "\t * @property-read bool \$disabled\n";
                break;
                
            case 'TextInput':
                $docsContent .= "\t * @property-read string \$type text|password|email|number|tel|url\n";
                $docsContent .= "\t * @property-read string \$placeholder\n";
                $docsContent .= "\t * @property-read bool \$disabled\n";
                $docsContent .= "\t * @property-read bool \$required\n";
                break;
                
            case 'Select':
                $docsContent .= "\t * @property-read array \$data\n";
                $docsContent .= "\t * @property-read bool \$searchable\n";
                $docsContent .= "\t * @property-read bool \$clearable\n";
                $docsContent .= "\t * @property-read bool \$disabled\n";
                break;
                
            case 'Modal':
                $docsContent .= "\t * @property-read bool \$opened\n";
                $docsContent .= "\t * @property-read string \$title\n";
                $docsContent .= "\t * @property-read bool \$closeOnClickOutside\n";
                $docsContent .= "\t * @property-read bool \$closeOnEscape\n";
                break;
                
            case 'Card':
                $docsContent .= "\t * @property-read string \$shadow sm|md|lg|xl\n";
                $docsContent .= "\t * @property-read string \$padding xs|sm|md|lg|xl\n";
                $docsContent .= "\t * @property-read bool \$withBorder\n";
                break;
                
            // Add more components as needed
        }
    }

    protected function generateTraitsDocs()
    {
        $traits = [
            'WithMantineForm' => [
                'methods' => [
                    'initForm' => ['array $initialValues', 'Initialize form with values'],
                    'getInputProps' => ['string $name', 'Get props for form input'],
                    'validate' => [null, 'Validate form data'],
                    'reset' => [null, 'Reset form to initial values'],
                ],
                'properties' => [
                    'form' => ['array', 'Form data'],
                    'errors' => ['array', 'Validation errors'],
                ],
            ],
            'WithMantineHooks' => [
                'methods' => [
                    'useHook' => ['string $name, array $params = [], ?callable $callback = null', 'Use a Mantine hook'],
                    'useMediaQuery' => ['string $query, ?callable $callback = null', 'Use media query hook'],
                    'useViewportSize' => ['?callable $callback = null', 'Use viewport size hook'],
                ],
            ],
            'WithColorScheme' => [
                'methods' => [
                    'setColorScheme' => ['string $scheme', 'Set color scheme (light/dark)'],
                    'getColorScheme' => [null, 'Get current color scheme'],
                    'toggleColorScheme' => [null, 'Toggle between light/dark'],
                ],
                'properties' => [
                    'colorScheme' => ['string', 'Current color scheme'],
                ],
            ],
        ];

        $docsContent = "<?php\n\n/**\n * MantineLivewire Traits IDE Helper\n *\n * @author MantineLivewire\n */\n\n";

        foreach ($traits as $trait => $info) {
            $docsContent .= "namespace MantineLivewire\\Traits {\n";
            $docsContent .= "\t/**\n";
            
            // Add method documentation
            if (isset($info['methods'])) {
                foreach ($info['methods'] as $method => $details) {
                    [$params, $description] = $details;
                    $docsContent .= "\t * @method void {$method}(" . ($params ?? '') . ") {$description}\n";
                }
            }
            
            // Add property documentation
            if (isset($info['properties'])) {
                foreach ($info['properties'] as $property => $details) {
                    [$type, $description] = $details;
                    $docsContent .= "\t * @property {$type} \${$property} {$description}\n";
                }
            }
            
            $docsContent .= "\t */\n";
            $docsContent .= "\ttrait {$trait} {}\n";
            $docsContent .= "}\n\n";
        }

        File::put(base_path('_ide_helper_mantinelivewire_traits.php'), $docsContent);
    }
}
