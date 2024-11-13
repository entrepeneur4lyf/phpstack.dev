<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCloseButton extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-close-button
                    aria-label="Close modal"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-close-button
                            size="xs"
                            aria-label="Close xs"
                        />
                        <x-mantine-close-button
                            size="sm"
                            aria-label="Close sm"
                        />
                        <x-mantine-close-button
                            size="md"
                            aria-label="Close md"
                        />
                        <x-mantine-close-button
                            size="lg"
                            aria-label="Close lg"
                        />
                        <x-mantine-close-button
                            size="xl"
                            aria-label="Close xl"
                        />
                    </x-mantine-group>
                </div>

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-close-button
                            variant="transparent"
                            aria-label="Close transparent"
                        />
                        <x-mantine-close-button
                            variant="subtle"
                            aria-label="Close subtle"
                        />
                    </x-mantine-group>
                </div>

                <!-- With custom icon -->
                <div class="mt-4">
                    <x-mantine-close-button
                        :icon="'<i class=\"fas fa-times\" style=\"width: 18px; height: 18px;\"></i>'"
                        aria-label="Close with custom icon"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-close-button
                        :disabled="true"
                        aria-label="Close disabled"
                    />
                </div>

                <!-- As link -->
                <div class="mt-4">
                    <x-mantine-close-button
                        component="a"
                        href="#"
                        target="_blank"
                        aria-label="Close as link"
                    />
                </div>

                <!-- With visually hidden text -->
                <div class="mt-4">
                    <x-mantine-close-button>
                        <x-mantine-visually-hidden>
                            Close modal
                        </x-mantine-visually-hidden>
                    </x-mantine-close-button>
                </div>
            </div>
        blade;
    }
}
