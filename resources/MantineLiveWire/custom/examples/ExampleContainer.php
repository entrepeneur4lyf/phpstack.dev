<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleContainer extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic container -->
                <x-mantine-container>
                    <p>Default container with responsive max-width</p>
                </x-mantine-container>

                <!-- Container with custom size -->
                <x-mantine-container size="xs">
                    <p>Extra small container</p>
                </x-mantine-container>

                <!-- Container with custom padding -->
                <x-mantine-container padding="xl">
                    <p>Container with extra large padding</p>
                </x-mantine-container>

                <!-- Fluid container -->
                <x-mantine-container :fluid="true">
                    <p>Fluid container that takes full width</p>
                </x-mantine-container>
            </div>
        blade;
    }
}
