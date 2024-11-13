<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleUnstyledButton extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-unstyled-button>
                    Button without styles
                </x-mantine-unstyled-button>

                <!-- As a link -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Link button
                    </x-mantine-unstyled-button>
                </div>

                <!-- With click handler -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        :on-click="fn() => $this->handleClick()"
                    >
                        Click me
                    </x-mantine-unstyled-button>
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        :disabled="true"
                    >
                        Disabled button
                    </x-mantine-unstyled-button>
                </div>

                <!-- With custom styles -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
                    >
                        Custom styled button
                    </x-mantine-unstyled-button>
                </div>

                <!-- With ARIA label -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        aria-label="Close dialog"
                    >
                        <i class="fas fa-times"></i>
                    </x-mantine-unstyled-button>
                </div>

                <!-- With custom role -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        role="menuitem"
                    >
                        Menu item button
                    </x-mantine-unstyled-button>
                </div>

                <!-- As a form submit button -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        type="submit"
                        form="my-form"
                    >
                        Submit form
                    </x-mantine-unstyled-button>
                </div>

                <!-- With tab index -->
                <div class="mt-4">
                    <x-mantine-unstyled-button
                        :tab-index="2"
                    >
                        Focusable button
                    </x-mantine-unstyled-button>
                </div>
            </div>
        blade;
    }

    public function handleClick()
    {
        // Handle click event
        $this->dispatch('notify', [
            'message' => 'Button clicked!',
            'type' => 'success'
        ]);
    }
}
