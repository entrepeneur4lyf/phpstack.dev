<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\MantineLivewireInstallCommand;
use App\Console\Commands\InstallLayoutCommand;
use App\Livewire\Components\BaseLayout;
use App\Livewire\Components\ColorSchemeScript;
use App\Support\ComponentRegistry;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MantineLivewireServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerComponents();
        $this->registerBladeDirectives();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Register the component registry as a singleton
        $this->app->singleton(ComponentRegistry::class);

        // Register a binding for getting used components
        $this->app->bind('mantinelivewire.used-components', function () {
            return ComponentRegistry::getUsedComponents();
        });

        // Reset component registry on each request in non-console environment
        if (!$this->app->runningInConsole()) {
            $this->app->terminating(function () {
                ComponentRegistry::reset();
            });
        }
    }

    protected function registerComponents()
    {
        $prefix = config('mantinelivewire.prefix', 'mantine');

        // Register UI Components
        Blade::componentNamespace('App\\Livewire\\Components', $prefix);

        // Register view components
        Blade::component('color-scheme-script', ColorSchemeScript::class);
        Blade::component($prefix . '-layouts.base', BaseLayout::class);
        Blade::component('BladeUI\Icons\Components\Icon', $prefix.'-bladeui-icon');

        // Register Livewire event listeners for Mantine hooks
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::listen('component.initialized', function ($component) {
                if (in_array(\App\Traits\WithMantineHooks::class, class_uses_recursive($component))) {
                    $component->bootWithMantineHooks();
                }
            });
        }

        // Register views
        $mantinePath = resource_path('MantineLiveWire');
        $livewirePath = resource_path('Livewire');
        
        // Register blade templates
        $this->loadViewsFrom("{$mantinePath}/custom/blade", 'mantinelivewire-blade');
        
        // Register React components
        $this->loadViewsFrom("{$mantinePath}/custom/react", 'mantinelivewire-react');
        
        // Register example components and layouts
        $this->loadViewsFrom("{$mantinePath}/custom/examples", 'mantinelivewire-examples');
        $this->loadViewsFrom("{$mantinePath}/layouts", 'mantinelivewire-layout-examples');
        
        // Register base views
        $this->loadViewsFrom("{$mantinePath}/views", 'mantinelivewire');

        // Register Livewire views
        $this->loadViewsFrom("{$livewirePath}/views", 'livewire');
        $this->loadViewsFrom("{$livewirePath}/views/layouts", 'livewire-layouts');
        $this->loadViewsFrom("{$livewirePath}/views/components", 'livewire-components');
        $this->loadViewsFrom("{$livewirePath}/views/volt", 'livewire-volt');
    }

    public function registerBladeDirectives()
    {
        $this->registerScopeDirective();
    }

    public function registerScopeDirective(): void
    {
        /**
         * All credits from this blade directive goes to Konrad Kalemba.
         * Just copied and modified for my very specific use case.
         *
         * https://github.com/konradkalemba/blade-components-scoped-slots
         * 
         * @see MaryUI giggity ;)
         */
        Blade::directive('scope', function ($expression) {
            // Split the expression by `top-level` commas (not in parentheses)
            $directiveArguments = preg_split("/,(?![^\(\(]*[\)\)])/", $expression);
            $directiveArguments = array_map('trim', $directiveArguments);

            [$name, $functionArguments] = $directiveArguments;

            // Build function "uses" to inject extra external variables
            $uses = \Arr::except(array_flip($directiveArguments), [$name, $functionArguments]);
            $uses = array_flip($uses);
            array_push($uses, '$__env');
            array_push($uses, '$__bladeCompiler');
            $uses = implode(',', $uses);

            /**
             *  Slot names can`t contains dot , eg: `user.city`.
             *  So we convert `user.city` to `user___city`
             *
             *  Later, on component it will be replaced back.
             */
            $name = str_replace('.', '___', $name);

            return "<?php \$__bladeCompiler = \$__bladeCompiler ?? null; \$loop = null; \$__env->slot({$name}, function({$functionArguments}) use ({$uses}) { \$loop = (object) \$__env->getLoopStack()[0] ?>";
        });

        Blade::directive('endscope', function () {
            return '<?php }); ?>';
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the main class as a singleton
        $this->app->singleton(\App\Models\MantineLivewire::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mantinelivewire'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        // Register commands
        $this->commands([
            MantineLivewireInstallCommand::class,
            InstallLayoutCommand::class
        ]);
    }
}
