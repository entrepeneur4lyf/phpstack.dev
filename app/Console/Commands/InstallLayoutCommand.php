<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Config;
use App\Support\ComponentRegistry;
use function Laravel\Prompts\select;

class InstallLayoutCommand extends Command
{
    protected $signature = 'mantinelivewire:layout';

    protected $description = 'Install a Mantine UI layout component';

    protected $categories = [
        'notifications' => [
            'name' => 'Notifications',
            'count' => 1,
            'components' => [
                'toast',
            ]
        ],
        'error' => [
            'name' => 'Error Pages',
            'count' => 5,
            'components' => [
                'not-found-image',
                'not-found-title',
                'nothing-found-background',
                'server-error',
                'server-overload',
            ]
        ],
        'features' => [
            'name' => 'Features',
            'count' => 5,
            'components' => [
                'features-asymmetrical',
                'features-cards',
                'features-grid',
                'features-images',
                'features-title',
            ]
        ],
        'auth' => [
            'name' => 'Authentication',
            'count' => 4,
            'components' => [
                'authentication-form',
                'authentication-image',
                'authentication-title',
                'forgot-password',
            ]
        ],
        'hero' => [
            'name' => 'Hero Headers',
            'count' => 6,
            'components' => [
                'hero-bullets',
                'hero-content-left',
                'hero-image-background',
                'hero-image-right',
                'hero-text',
                'hero-title',
            ]
        ],
        'cards' => [
            'name' => 'Cards',
            'count' => 7,
            'components' => [
                'actions-grid',
                'badge-card',
                'card-with-stats',
                'features-card',
                'stats-ring-card',
                'switches-card',
                'task-card',
            ]
        ],
        'headers' => [
            'name' => 'Headers',
            'count' => 6,
            'components' => [
                'header-simple',
                'header-menu',
                'header-search',
                'header-tabs',
                'header-double',
                'header-mega-menu',
            ]
        ],
        'navbars' => [
            'name' => 'Navbars',
            'count' => 9,
            'components' => [
                'navbar-simple',
                'navbar-segmented',
                'navbar-nested',
                'navbar-minimal',
                'navbar-search',
                'navbar-links-group',
                'navbar-icons',
                'navbar-divided',
                'navbar-collapse',
            ]
        ],
        'footers' => [
            'name' => 'Footers',
            'count' => 4,
            'components' => [
                'footer-simple',
                'footer-social',
                'footer-links',
                'footer-centered',
            ]
        ],
        'grids' => [
            'name' => 'Grids',
            'count' => 3,
            'components' => [
                'grid-asymmetrical',
                'lead-grid',
                'subgrid',
            ]
        ],
        'users' => [
            'name' => 'Users',
            'count' => 8,
            'components' => [
                'user-button',
                'user-card-image',
                'user-info-action',
                'user-info-icons',
                'user-menu',
                'users-roles-table',
                'users-stack',
                'users-table',
            ]
        ],
    ];

    public function handle()
    {
        // Choose category
        $category = select(
            'Which category of layout would you like to install?',
            collect($this->categories)->mapWithKeys(function($cat, $key) {
                return [$key => "{$cat['name']} ({$cat['count']} components)"];
            })->all()
        );

        // Choose component from category
        $component = select(
            "Which {$this->categories[$category]['name']} component would you like to install?",
            $this->categories[$category]['components']
        );

        // Convert kebab-case to PascalCase for component name
        $componentName = str_replace(' ', '', ucwords(str_replace('-', ' ', $component)));

        // Create necessary directories
        $jsPath = resource_path('js/Components/Custom/' . $componentName);
        $livewirePath = app_path('Livewire/Layouts');
        $viewsPath = resource_path('views/livewire/layouts');

        foreach ([$jsPath, $livewirePath, $viewsPath] as $path) {
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }
        }

        // Copy React component
        $jsStubPath = __DIR__ . "/../../stubs/js/Components/Custom/{$componentName}";
        File::copyDirectory($jsStubPath, $jsPath);

        // Copy Livewire component
        $livewireStubPath = __DIR__ . "/../../stubs/livewire/layouts/{$componentName}.php";
        $livewirePath = app_path("Livewire/Layouts/{$componentName}.php");
        File::copy($livewireStubPath, $livewirePath);

        // Copy blade view
        $viewStubPath = __DIR__ . "/../../stubs/layouts/{$category}/{$component}.blade.php";
        $viewPath = resource_path("views/livewire/layouts/{$component}.blade.php");

        if (!File::exists($viewStubPath)) {
            $this->error("Layout stub not found: {$viewStubPath}");
            return 1;
        }

        // If view exists, back it up
        if (File::exists($viewPath)) {
            File::copy($viewPath, $viewPath . '.bak');
            $this->info("Backed up existing view to {$component}.blade.php.bak");
        }

        // Copy view
        File::copy($viewStubPath, $viewPath);

        // Add component to protected list
        $configPath = config_path('mantinelivewire.php');
        if (File::exists($configPath)) {
            $config = File::get($configPath);
            
            // Check if component is already protected
            if (!str_contains($config, "'{$componentName}',")) {
                // Find the protected_components array
                $pattern = "/'protected_components'\s*=>\s*\[\s*(.*?)\s*\],/s";
                if (preg_match($pattern, $config, $matches)) {
                    $currentComponents = $matches[1];
                    $newComponents = $currentComponents . "\n        '{$componentName}',";
                    $config = str_replace($currentComponents, $newComponents, $config);
                    File::put($configPath, $config);
                    $this->info("Added {$componentName} to protected components");
                }
            }
        }

        // Register component
        ComponentRegistry::register($componentName);

        // Trigger build
        $this->info("\nTriggering build to compile new component...");
        
        // Detect package manager
        $packageManager = $this->detectPackageManager();
        $buildCommand = match($packageManager) {
            'npm' => 'npm run build',
            'yarn' => 'yarn build',
            'bun' => 'bun run build',
            'pnpm' => 'pnpm build',
            default => 'npm run build'
        };

        Process::run($buildCommand, function ($type, $output) {
            echo $output;
        });

        $this->info("\nCreated {$component} layout");

        // Show usage example
        $this->info("\nUse this layout in your blade views:");
        $this->line("\n<fg=blue>@livewire(\\App\\Livewire\\Layouts\\{$componentName}::class)</fg=blue>");

        // Show additional usage examples for special components
        if ($component === 'toast') {
            $this->info("\nToast Usage Example:");
            $this->line("\n<fg=blue>// In your Livewire component:");
            $this->line("public function save()");
            $this->line("{");
            $this->line("    // Your save logic here");
            $this->line("    \$this->toast->success('Success', 'Data saved successfully');");
            $this->line("}");
            $this->line("\n// Available methods:");
            $this->line("success(title, message, timeout = 4000)");
            $this->line("error(title, message, timeout = 4000)");
            $this->line("info(title, message, timeout = 4000)");
            $this->line("warning(title, message, timeout = 4000)</fg=blue>");
        }

        $this->info("\nNote: If your application uses a different namespace than 'App', update the namespace in the Livewire component file.");

        return 0;
    }

    protected function detectPackageManager(): string
    {
        $os = PHP_OS;
        $findCommand = stripos($os, 'WIN') === 0 ? 'where' : 'which';

        $yarn = Process::run($findCommand . ' yarn')->output();
        $npm = Process::run($findCommand . ' npm')->output();
        $bun = Process::run($findCommand . ' bun')->output();
        $pnpm = Process::run($findCommand . ' pnpm')->output();

        if (str($yarn)->isNotEmpty()) return 'yarn';
        if (str($bun)->isNotEmpty()) return 'bun';
        if (str($pnpm)->isNotEmpty()) return 'pnpm';
        return 'npm';
    }
}
