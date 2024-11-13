<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Livewire\Components\Scripts\ColorSchemeScript;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register view paths
        View::addLocation(resource_path('Livewire/views'));
        View::addNamespace('livewire', resource_path('Livewire/views/livewire'));
        View::addNamespace('layouts', resource_path('Livewire/views/layouts'));
        View::addNamespace('components', resource_path('Livewire/views/components'));
        View::addNamespace('volt', resource_path('Livewire/views/volt'));

        // Register Blade components
        Blade::componentNamespace('App\\View\\Components', 'app');
        
        // Register common aliases
        Blade::component('layouts.app', 'app-layout');
        Blade::component('layouts.guest', 'guest-layout');

        // Register color scheme script for dark mode support
        Blade::component('color-scheme-script', ColorSchemeScript::class);
        Blade::directive('colorScheme', function () {
            return "<?php echo view('components.scripts.color-scheme')->render(); ?>";
        });

        // Register Livewire hooks for Mantine integration
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::listen('component.initialized', function ($component) {
                if (method_exists($component, 'bootWithMantineTheme')) {
                    $component->bootWithMantineTheme();
                }
            });
        }
    }
}
