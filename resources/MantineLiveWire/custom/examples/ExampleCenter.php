<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Center Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Center component.
 * It showcases different centering techniques and layout options through practical examples.
 *
 * Features demonstrated:
 * - Basic content centering
 * - Inline centering
 * - Fixed dimensions
 * - Integration with other components
 * - Custom styling
 *
 * @see \MantineBlade\Components\Center
 * @link https://mantine.dev/core/center/
 */
class ExampleCenter extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic centering of block content
     * 2. Inline centering for text elements
     * 3. Centering with fixed dimensions
     * 4. Centering with custom styles
     * 5. Integration with other Mantine components
     *
     * Each example showcases different features and customization
     * options available with the Center component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic centering -->
                <x-mantine-center>
                    <div>Centered content</div>
                </x-mantine-center>

                <!-- Inline centering -->
                <x-mantine-center :inline="true">
                    <span>Centered inline content</span>
                </x-mantine-center>

                <!-- Centering with dimensions -->
                <x-mantine-center style="width: 400px; height: 100px;">
                    <div>Content centered in a box</div>
                </x-mantine-center>

                <!-- With custom styles -->
                <div class="mt-4">
                    <x-mantine-center
                        :styles="[
                            'root' => [
                                'backgroundColor' => 'var(--mantine-color-blue-light)',
                                'borderRadius' => 'var(--mantine-radius-md)',
                                'padding' => 'var(--mantine-spacing-md)',
                            ],
                        ]"
                    >
                        <div>Styled centered content</div>
                    </x-mantine-center>
                </div>

                <!-- With other Mantine components -->
                <div class="mt-4">
                    <x-mantine-center>
                        <x-mantine-button size="xl" radius="xl">
                            Centered Button
                        </x-mantine-button>
                    </x-mantine-center>
                </div>

                <!-- With responsive dimensions -->
                <div class="mt-4">
                    <x-mantine-center
                        :styles="[
                            'root' => [
                                'width' => '100%',
                                'height' => '150px',
                                '@media (min-width: 768px)' => [
                                    'width' => '50%',
                                    'margin' => '0 auto',
                                ],
                            ],
                        ]"
                    >
                        <div>Responsive centered content</div>
                    </x-mantine-center>
                </div>
            </div>
        blade;
    }
}
