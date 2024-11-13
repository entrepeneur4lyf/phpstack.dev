<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Button Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Button component.
 * It showcases different styles, states, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic button usage
 * - Different visual variants
 * - Size variations
 * - Loading states
 * - Gradient styling
 * - Icon integration
 * - Full width buttons
 * - Link functionality
 * - Form integration
 *
 * @see \MantineBlade\Components\Button
 * @link https://mantine.dev/core/button/
 */
class ExampleButton extends Component
{
    /**
     * Controls the loading state of loading examples
     *
     * @var bool
     */
    public $loading = false;

    /**
     * Toggle loading state
     *
     * @return void
     */
    public function toggleLoading()
    {
        $this->loading = !$this->loading;
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic button with variant and color
     * 2. Different visual variants
     * 3. Size variations
     * 4. Loading states with custom loaders
     * 5. Gradient buttons
     * 6. Buttons with icons
     * 7. Full width buttons
     * 8. Button as link
     * 9. Form submission buttons
     *
     * Each example showcases different features and customization
     * options available with the Button component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-button variant="filled" color="blue">
                        Click me
                    </x-mantine-button>
                </div>

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-button variant="filled">Filled</x-mantine-button>
                        <x-mantine-button variant="light">Light</x-mantine-button>
                        <x-mantine-button variant="outline">Outline</x-mantine-button>
                        <x-mantine-button variant="subtle">Subtle</x-mantine-button>
                        <x-mantine-button variant="transparent">Transparent</x-mantine-button>
                        <x-mantine-button variant="white">White</x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-button size="xs">Extra small</x-mantine-button>
                        <x-mantine-button size="sm">Small</x-mantine-button>
                        <x-mantine-button size="md">Medium</x-mantine-button>
                        <x-mantine-button size="lg">Large</x-mantine-button>
                        <x-mantine-button size="xl">Extra large</x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Loading state -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-button
                            :loading="$loading"
                            wire:click="toggleLoading"
                        >
                            Toggle loading
                        </x-mantine-button>

                        <x-mantine-button
                            :loading="$loading"
                            :loader-props="['type' => 'dots']"
                        >
                            With dots loader
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Gradient variant -->
                <div class="mt-4">
                    <x-mantine-button
                        variant="gradient"
                        :gradient="['from' => 'indigo', 'to' => 'cyan']"
                    >
                        Gradient button
                    </x-mantine-button>
                </div>

                <!-- With icons -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-button
                            :left-section="'<i class=\"fas fa-download\"></i>'"
                        >
                            Download
                        </x-mantine-button>

                        <x-mantine-button
                            :right-section="'<i class=\"fas fa-arrow-right\"></i>'"
                            variant="light"
                        >
                            Continue
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Full width -->
                <div class="mt-4">
                    <x-mantine-button :full-width="true">
                        Full width button
                    </x-mantine-button>
                </div>

                <!-- As link -->
                <div class="mt-4">
                    <x-mantine-button
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        variant="light"
                    >
                        External link
                    </x-mantine-button>
                </div>

                <!-- Form submission -->
                <div class="mt-4">
                    <form>
                        <x-mantine-button type="submit">
                            Submit form
                        </x-mantine-button>
                    </form>
                </div>
            </div>
        blade;
    }
}
