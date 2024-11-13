<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class VoltServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Volt::mount([
            config('livewire.view_path', resource_path('views/livewire')),
            resource_path('views/pages'),
            resource_path('Livewire/views/livewire'),
            resource_path('Livewire/views/volt'),
            resource_path('Livewire/views/volt/pages'),
            resource_path('Livewire/views/volt/profile'),
            resource_path('Livewire/views/volt/layout'),
            resource_path('Livewire/views/volt/welcome'),
        ]);

        // Register path aliases for easier referencing
        Volt::alias([
            'layouts' => resource_path('Livewire/views/layouts'),
            'components' => resource_path('Livewire/views/components'),
            'auth' => resource_path('Livewire/views/volt/pages/auth'),
            'profile' => resource_path('Livewire/views/volt/profile'),
        ]);
    }
}
