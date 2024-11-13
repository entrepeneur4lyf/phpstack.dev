<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example BackgroundImage Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade BackgroundImage component.
 * It showcases different layouts, content positioning, and styling options through practical examples.
 *
 * Features demonstrated:
 * - Basic background image usage
 * - Different border radius options
 * - Link functionality
 * - Custom content layouts
 * - Integration with other Mantine components
 *
 * @see \MantineBlade\Components\BackgroundImage
 * @link https://mantine.dev/core/background-image/
 */
class ExampleBackgroundImage extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic background image with centered text
     * 2. Different border radius variations
     * 3. Background image as a clickable link
     * 4. Complex layout with header and footer content
     *
     * Each example showcases different features and customization
     * options available with the BackgroundImage component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-box maw="300" mx="auto">
                        <x-mantine-background-image
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-6.png"
                            radius="sm"
                        >
                            <x-mantine-center p="md">
                                <x-mantine-text c="white">
                                    BackgroundImage component can be used to add any content on image. It is useful for hero
                                    headers and other similar sections
                                </x-mantine-text>
                            </x-mantine-center>
                        </x-mantine-background-image>
                    </x-mantine-box>
                </div>

                <!-- With different radius -->
                <div class="mt-8">
                    <x-mantine-box maw="300" mx="auto">
                        <x-mantine-background-image
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-6.png"
                            radius="xl"
                        >
                            <x-mantine-center p="md">
                                <x-mantine-text c="white">
                                    With extra large radius
                                </x-mantine-text>
                            </x-mantine-center>
                        </x-mantine-background-image>
                    </x-mantine-box>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-box maw="300" mx="auto">
                        <x-mantine-background-image
                            component="a"
                            href="https://mantine.dev"
                            target="_blank"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-6.png"
                            radius="md"
                        >
                            <x-mantine-center p="md">
                                <x-mantine-text c="white">
                                    Click me to visit Mantine website
                                </x-mantine-text>
                            </x-mantine-center>
                        </x-mantine-background-image>
                    </x-mantine-box>
                </div>

                <!-- With custom content -->
                <div class="mt-8">
                    <x-mantine-box maw="300" mx="auto">
                        <x-mantine-background-image
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-6.png"
                            radius="md"
                        >
                            <x-mantine-stack p="xl" justify="space-between" h="300">
                                <x-mantine-text fw="700" c="white">
                                    Header content
                                </x-mantine-text>

                                <x-mantine-group justify="space-between">
                                    <x-mantine-text c="white">
                                        Footer content
                                    </x-mantine-text>
                                    <x-mantine-button variant="white" size="xs">
                                        Action button
                                    </x-mantine-button>
                                </x-mantine-group>
                            </x-mantine-stack>
                        </x-mantine-background-image>
                    </x-mantine-box>
                </div>
            </div>
        blade;
    }
}
