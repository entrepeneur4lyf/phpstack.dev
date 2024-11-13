<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Burger Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Burger component.
 * It showcases different states, sizes, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic burger menu
 * - Different sizes
 * - Custom line thickness
 * - Custom colors
 * - Transition duration
 * - Disabled state
 * - Accessibility features
 * - Navigation menu integration
 *
 * @see \MantineBlade\Components\Burger
 * @link https://mantine.dev/core/burger/
 */
class ExampleBurger extends Component
{
    /**
     * Controls the opened/closed state of the burger menu
     *
     * @var bool
     */
    public $opened = false;

    /**
     * Toggle the burger menu state
     *
     * @return void
     */
    public function toggle()
    {
        $this->opened = !$this->opened;
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic burger menu with toggle functionality
     * 2. Size variations from xs to xl
     * 3. Custom line thickness
     * 4. Custom colors
     * 5. Custom transition duration
     * 6. Disabled state
     * 7. Accessibility integration
     * 8. Navigation menu example
     *
     * Each example showcases different features and customization
     * options available with the Burger component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-burger
                    :opened="$opened"
                    :on-click="fn() => $this->toggle()"
                    aria-label="Toggle navigation"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-burger
                            size="xs"
                            :opened="$opened"
                            :on-click="fn() => $this->toggle()"
                            aria-label="Toggle navigation"
                        />
                        <x-mantine-burger
                            size="sm"
                            :opened="$opened"
                            :on-click="fn() => $this->toggle()"
                            aria-label="Toggle navigation"
                        />
                        <x-mantine-burger
                            size="md"
                            :opened="$opened"
                            :on-click="fn() => $this->toggle()"
                            aria-label="Toggle navigation"
                        />
                        <x-mantine-burger
                            size="lg"
                            :opened="$opened"
                            :on-click="fn() => $this->toggle()"
                            aria-label="Toggle navigation"
                        />
                        <x-mantine-burger
                            size="xl"
                            :opened="$opened"
                            :on-click="fn() => $this->toggle()"
                            aria-label="Toggle navigation"
                        />
                    </x-mantine-group>
                </div>

                <!-- With custom line size -->
                <div class="mt-4">
                    <x-mantine-burger
                        :line-size="2"
                        size="xl"
                        :opened="$opened"
                        :on-click="fn() => $this->toggle()"
                        aria-label="Toggle navigation"
                    />
                </div>

                <!-- With custom color -->
                <div class="mt-4">
                    <x-mantine-burger
                        color="red"
                        :opened="$opened"
                        :on-click="fn() => $this->toggle()"
                        aria-label="Toggle navigation"
                    />
                </div>

                <!-- With custom transition duration -->
                <div class="mt-4">
                    <x-mantine-burger
                        :transition-duration="500"
                        :opened="$opened"
                        :on-click="fn() => $this->toggle()"
                        aria-label="Toggle navigation"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-burger
                        :disabled="true"
                        :opened="$opened"
                        :on-click="fn() => $this->toggle()"
                        aria-label="Toggle navigation"
                    />
                </div>

                <!-- With visually hidden text -->
                <div class="mt-4">
                    <x-mantine-burger :opened="$opened" :on-click="fn() => $this->toggle()">
                        <x-mantine-visually-hidden>
                            Toggle navigation
                        </x-mantine-visually-hidden>
                    </x-mantine-burger>
                </div>

                <!-- Navigation menu example -->
                <div class="mt-4 relative">
                    <x-mantine-burger
                        :opened="$opened"
                        :on-click="fn() => $this->toggle()"
                        aria-label="Toggle navigation"
                    />

                    @if($opened)
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2">
                            <x-mantine-anchor href="#" class="block px-4 py-2 hover:bg-gray-100">
                                Home
                            </x-mantine-anchor>
                            <x-mantine-anchor href="#" class="block px-4 py-2 hover:bg-gray-100">
                                About
                            </x-mantine-anchor>
                            <x-mantine-anchor href="#" class="block px-4 py-2 hover:bg-gray-100">
                                Contact
                            </x-mantine-anchor>
                        </div>
                    @endif
                </div>
            </div>
        blade;
    }
}
