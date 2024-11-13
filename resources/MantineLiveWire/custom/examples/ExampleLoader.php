<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleLoader extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-loader color="blue" />

                <!-- Different types -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-loader type="oval" />
                        <x-mantine-loader type="bars" />
                        <x-mantine-loader type="dots" />
                    </x-mantine-group>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-loader size="xs" />
                        <x-mantine-loader size="sm" />
                        <x-mantine-loader size="md" />
                        <x-mantine-loader size="lg" />
                        <x-mantine-loader size="xl" />
                    </x-mantine-group>
                </div>

                <!-- Custom size -->
                <div class="mt-4">
                    <x-mantine-loader :size="30" />
                </div>

                <!-- Different colors -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-loader color="blue" />
                        <x-mantine-loader color="red" />
                        <x-mantine-loader color="green" />
                        <x-mantine-loader color="yellow" />
                        <x-mantine-loader color="grape" />
                    </x-mantine-group>
                </div>

                <!-- With custom text -->
                <div class="mt-4">
                    <x-mantine-loader>
                        Loading...
                    </x-mantine-loader>
                </div>

                <!-- Custom CSS loader example -->
                <div class="mt-4">
                    <x-mantine-loader
                        type="custom"
                        :loaders="[
                            'custom' => [
                                'styles' => [
                                    '@keyframes custom-loader {
                                        0% { transform: rotate(0deg); }
                                        100% { transform: rotate(360deg); }
                                    }',
                                    '.custom-loader {
                                        width: var(--loader-size);
                                        height: var(--loader-size);
                                        border: calc(var(--loader-size) / 8) solid var(--loader-color);
                                        border-right-color: transparent;
                                        border-radius: 50%;
                                        animation: custom-loader 1s linear infinite;
                                    }'
                                ],
                                'template' => '<div class=\"custom-loader\"></div>'
                            ]
                        ]"
                    />
                </div>

                <!-- In button context -->
                <div class="mt-4">
                    <x-mantine-button loading>
                        <x-mantine-loader size="sm" color="white" />
                        Loading...
                    </x-mantine-button>
                </div>

                <!-- In loading overlay context -->
                <div class="mt-4">
                    <div class="relative p-4 border rounded">
                        <x-mantine-loading-overlay :visible="true">
                            <x-mantine-loader color="blue">
                                Processing your request...
                            </x-mantine-loader>
                        </x-mantine-loading-overlay>
                        
                        <p>Content under the overlay</p>
                    </div>
                </div>
            </div>
        blade;
    }
}
