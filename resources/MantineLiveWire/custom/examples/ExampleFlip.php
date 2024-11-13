<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Flip Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Flip component.
 * It showcases different animations, configurations, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic flip card usage
 * - Different flip directions (horizontal/vertical)
 * - Controlled and uncontrolled flip states
 * - Custom animation timing and easing
 * - Integration with other Mantine components
 * - Practical use cases (product cards, info panels)
 *
 * @see \MantineBlade\Components\Flip
 * @link https://gfazioli.github.io/mantine-flip/
 */
class ExampleFlip extends Component
{
    /**
     * Controls the flip state for the controlled example
     *
     * @var bool
     */
    public $isFlipped = false;

    /**
     * Toggle the controlled flip state
     *
     * @return void
     */
    public function toggleFlip()
    {
        $this->isFlipped = !$this->isFlipped;
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic flip card with default settings
     * 2. Different flip directions
     * 3. Controlled flip state
     * 4. Custom animation timing
     * 5. Integration with other components
     * 6. Practical examples
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4">Basic Flip Card</h3>
                    <x-mantine-flip h={200} w={350}>
                        <x-mantine-paper shadow="sm" p="xl" withBorder>
                            <h4 class="text-xl mb-4">Front Side</h4>
                            <p class="mb-4">Click the button to flip the card</p>
                            <x-mantine-flip.target>
                                <x-mantine-button>Flip Card</x-mantine-button>
                            </x-mantine-flip.target>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="sm" p="xl" withBorder>
                            <h4 class="text-xl mb-4">Back Side</h4>
                            <p class="mb-4">You can flip it back</p>
                            <x-mantine-flip.target>
                                <x-mantine-button variant="light">Flip Back</x-mantine-button>
                            </x-mantine-flip.target>
                        </x-mantine-paper>
                    </x-mantine-flip>
                </div>

                <!-- Different flip directions -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4">Flip Directions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-mantine-flip h={200} w={350} direction="horizontal">
                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <h4 class="text-xl mb-4">Horizontal Flip</h4>
                                <x-mantine-flip.target>
                                    <x-mantine-button>Flip Horizontally</x-mantine-button>
                                </x-mantine-flip.target>
                            </x-mantine-paper>

                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <p>Flipped horizontally!</p>
                                <x-mantine-flip.target>
                                    <x-mantine-button variant="light">Back</x-mantine-button>
                                </x-mantine-flip.target>
                            </x-mantine-paper>
                        </x-mantine-flip>

                        <x-mantine-flip h={200} w={350} direction="vertical">
                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <h4 class="text-xl mb-4">Vertical Flip</h4>
                                <x-mantine-flip.target>
                                    <x-mantine-button>Flip Vertically</x-mantine-button>
                                </x-mantine-flip.target>
                            </x-mantine-paper>

                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <p>Flipped vertically!</p>
                                <x-mantine-flip.target>
                                    <x-mantine-button variant="light">Back</x-mantine-button>
                                </x-mantine-flip.target>
                            </x-mantine-paper>
                        </x-mantine-flip>
                    </div>
                </div>

                <!-- Controlled flip state -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4">Controlled Flip State</h3>
                    <x-mantine-flex align="center" gap="md">
                        <x-mantine-button wire:click="toggleFlip">
                            Toggle Flip State
                        </x-mantine-button>
                        <span>Current state: {{ $isFlipped ? 'Flipped' : 'Front' }}</span>
                    </x-mantine-flex>

                    <div class="mt-4">
                        <x-mantine-flip h={200} w={350} :flipped="$isFlipped">
                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <h4 class="text-xl">Controlled Front</h4>
                                <p>Use the button above to control the flip state</p>
                            </x-mantine-paper>

                            <x-mantine-paper shadow="sm" p="xl" withBorder>
                                <h4 class="text-xl">Controlled Back</h4>
                                <p>This flip state is controlled by Livewire</p>
                            </x-mantine-paper>
                        </x-mantine-flip>
                    </div>
                </div>

                <!-- Custom animation -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4">Custom Animation</h3>
                    <x-mantine-flip 
                        h={200} 
                        w={350}
                        :duration="1000"
                        easing="ease-in-out"
                        :perspective="1500"
                    >
                        <x-mantine-paper shadow="sm" p="xl" withBorder>
                            <h4 class="text-xl mb-4">Slow Flip</h4>
                            <p class="mb-4">With custom timing and perspective</p>
                            <x-mantine-flip.target>
                                <x-mantine-button>Flip Slowly</x-mantine-button>
                            </x-mantine-flip.target>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="sm" p="xl" withBorder>
                            <p>Custom animation complete!</p>
                            <x-mantine-flip.target>
                                <x-mantine-button variant="light">Back</x-mantine-button>
                            </x-mantine-flip.target>
                        </x-mantine-paper>
                    </x-mantine-flip>
                </div>

                <!-- Practical example -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4">Product Card Example</h3>
                    <x-mantine-flip h={400} w={350}>
                        <x-mantine-paper shadow="sm" withBorder>
                            <x-mantine-image
                                src="https://placehold.co/350x200"
                                alt="Product"
                                height={200}
                            />
                            <div class="p-4">
                                <h4 class="text-xl font-bold mb-2">Premium Headphones</h4>
                                <p class="text-gray-600 mb-4">
                                    High-quality wireless headphones with noise cancellation
                                </p>
                                <x-mantine-flip.target>
                                    <x-mantine-button fullWidth>
                                        View Details
                                    </x-mantine-button>
                                </x-mantine-flip.target>
                            </div>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="sm" p="xl" withBorder>
                            <h4 class="text-xl font-bold mb-4">Product Details</h4>
                            <x-mantine-list spacing="xs" size="sm" center mb="md">
                                <x-mantine-list-item>40mm Dynamic Drivers</x-mantine-list-item>
                                <x-mantine-list-item>Active Noise Cancellation</x-mantine-list-item>
                                <x-mantine-list-item>30-Hour Battery Life</x-mantine-list-item>
                                <x-mantine-list-item>Bluetooth 5.0</x-mantine-list-item>
                            </x-mantine-list>
                            <x-mantine-button fullWidth mb="sm">Add to Cart - $299</x-mantine-button>
                            <x-mantine-flip.target>
                                <x-mantine-button variant="light" fullWidth>
                                    Back to Preview
                                </x-mantine-button>
                            </x-mantine-flip.target>
                        </x-mantine-paper>
                    </x-mantine-flip>
                </div>
            </div>
        blade;
    }
}
