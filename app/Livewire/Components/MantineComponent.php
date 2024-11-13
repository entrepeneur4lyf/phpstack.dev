<?php

namespace App\Livewire\Components;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use Livewire\Component;
use Illuminate\Support\Facades\Config;
use MantineLivewire\Support\ComponentRegistry;

/**
 * Base Mantine Component
 * 
 * Abstract base class for all Mantine components. Provides core functionality for
 * React component integration and prop handling. This class handles the bridge between
 * Laravel Blade components and their React implementations.
 *
 * Features:
 * - Automatic component name resolution
 * - React component path mapping
 * - Props management and data passing
 * - Integration with Mingle for React/Laravel bridge
 * - Event handling between PHP and React
 * - Default props from config
 * - Color scheme support
 * - Unique component identification
 *
 * @property string $componentName The component's class name
 * @property array $props The component's props to be passed to React
 *
 * @example Basic Component Implementation
 * ```php
 * class Button extends MantineComponent
 * {
 *     public function __construct(
 *         public mixed $variant = null,
 *         public mixed $color = null,
 *         public bool $lightHidden = false,
 *         public bool $darkHidden = false,
 *     ) {
 *         parent::__construct();
 *         
 *         $this->props = [
 *             'variant' => $variant,
 *             'color' => $color,
 *             'lightHidden' => $lightHidden,
 *             'darkHidden' => $darkHidden,
 *         ];
 *     }
 *
 *     // Handle events from React
 *     #[On('buttonClicked')]
 *     public function handleClick($data)
 *     {
 *         // React component called: wire.$dispatch('buttonClicked', data)
 *         logger()->info('Button clicked with data:', $data);
 *     }
 *
 *     // Dispatch events to React
 *     public function updateState()
 *     {
 *         // React component listens with: wire.on('stateUpdated', handler)
 *         $this->dispatch('stateUpdated', state: 'completed');
 *     }
 * }
 * ```
 *
 * @example React Component Usage
 * ```jsx
 * function Button({ wire, mingleData, children }) {
 *     React.useEffect(() => {
 *         // Listen for PHP events
 *         wire.on('stateUpdated', (state) => {
 *             console.log('State updated:', state);
 *         });
 *     }, []);
 *
 *     const handleClick = () => {
 *         // Call PHP methods
 *         wire.handleClick().then(result => {
 *             console.log('PHP method returned:', result);
 *         });
 *
 *         // Dispatch events to PHP
 *         wire.$dispatch('buttonClicked', {
 *             timestamp: Date.now()
 *         });
 *     };
 *
 *     return (
 *         <MantineButton onClick={handleClick}>
 *             {children}
 *         </MantineButton>
 *     );
 * }
 * ```
 */
abstract class MantineComponent extends Component implements HasMingles
{
    use InteractsWithMingles;

    /**
     * The component's class name.
     *
     * @var string
     */
    protected string $componentName;

    /**
     * The component's props to be passed to React.
     *
     * @var array
     */
    protected array $props = [];

    /**
     * Whether the component should be hidden in light mode.
     *
     * @var bool
     */
    public bool $lightHidden = false;

    /**
     * Whether the component should be hidden in dark mode.
     *
     * @var bool
     */
    public bool $darkHidden = false;

    /**
     * Unique identifier for the component instance.
     *
     * @var string
     */
    public string $uuid;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->componentName = class_basename($this);
        $this->loadDefaultProps();
        $this->uuid = "mantine" . md5(serialize($this));
    }

    /**
     * Load default props from config
     */
    protected function loadDefaultProps(): void
    {
        $defaults = Config::get("mantinelivewire.defaults.{$this->componentName}", []);
        $this->props = array_merge($defaults, $this->props);
    }

    /**
     * Get the path to the React component.
     * This path is used by Mingle to locate and load the React component.
     *
     * @return string
     */
    public function component(): string
    {
        // Register the component when it's used
        ComponentRegistry::register($this->componentName);
        
        return "resources/js/Components/{$this->componentName}/index.js";
    }

    /**
     * Get the data to be passed to the React component.
     * This data is available in React as the mingleData prop.
     *
     * @return array
     */
    public function mingleData(): array
    {
        return array_merge($this->props, [
            'lightHidden' => $this->lightHidden,
            'darkHidden' => $this->darkHidden,
            'uuid' => $this->uuid,
        ]);
    }

    /**
     * Get default props for this component
     */
    public static function getDefaults(): array
    {
        $componentName = class_basename(static::class);
        return Config::get("mantinelivewire.defaults.{$componentName}", []);
    }

    /**
     * Create a new instance with custom default props
     */
    public static function withProps(array $props): static
    {
        $instance = new static();
        $instance->props = array_merge($instance->props, $props);
        return $instance;
    }

    /**
     * Extend the component with new default props
     */
    public static function extend(array $config): array
    {
        return [
            'defaultProps' => $config['defaultProps'] ?? [],
        ];
    }

    /**
     * Get the current color scheme
     */
    protected function getColorScheme(): string
    {
        $forced = Config::get('mantinelivewire.color-scheme.force');
        if ($forced) {
            return $forced;
        }

        return Config::get('mantinelivewire.color-scheme.default', 'light');
    }

    /**
     * Render the component.
     * Uses a base view that sets up the Mingle bridge.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('mantine::components.base')->with([
            'uuid' => $this->uuid,
        ]);
    }
}
