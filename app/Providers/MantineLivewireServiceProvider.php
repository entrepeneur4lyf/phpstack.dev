<?php

namespace MantineLivewire;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MantineLivewire\Commands\MantineLivewireInstallCommand;
use MantineLivewire\Commands\InstallLayoutCommand;
use MantineLivewire\Commands\GenerateIdeHelpersCommand;
use MantineLivewire\Components\BaseLayout;
use MantineLivewire\Components\ColorSchemeScript;
use MantineLivewire\Support\ComponentRegistry;
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

        // Register components in the MantineLivewire namespace
        Blade::componentNamespace('MantineLivewire\\Components', $prefix);

        // Register view components
        Blade::component('color-scheme-script', ColorSchemeScript::class);
        Blade::component($prefix . '-layouts.base', BaseLayout::class);
        Blade::component('BladeUI\Icons\Components\Icon', $prefix.'-bladeui-icon');

        // Register Livewire event listeners for Mantine hooks
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::listen('component.initialized', function ($component) {
                if (in_array(\MantineLivewire\Traits\WithMantineHooks::class, class_uses_recursive($component))) {
                    $component->bootWithMantineHooks();
                }
            });
        }

        // Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mantinelivewire');
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
            $uses = Arr::except(array_flip($directiveArguments), [$name, $functionArguments]);
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
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mantinelivewire.php', 'mantinelivewire');
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
        // Publishing the configuration file
        $this->publishes([
            __DIR__ . '/../config/mantinelivewire.php' => config_path('mantinelivewire.php'),
        ], 'mantinelivewire.config');

        // Publishing assets
        $this->publishes([
            __DIR__.'/../resources/js/Components' => resource_path('js/Components'),
            __DIR__.'/../resources/css' => resource_path('css/vendor/mantinelivewire'),
            __DIR__.'/../stubs/vite.config.mjs' => base_path('vite.config.mjs'),
            __DIR__.'/../stubs/vite-plugin-mantine.mjs' => base_path('vite-plugin-mantine.mjs'),
        ], 'mantinelivewire-assets');

        // Publishing stubs
        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs/mantinelivewire'),
        ], 'mantinelivewire-stubs');

        // Register commands
        $this->commands([
            MantineLivewireInstallCommand::class,
            InstallLayoutCommand::class,
            GenerateIdeHelpersCommand::class
        ]);
    }
}
