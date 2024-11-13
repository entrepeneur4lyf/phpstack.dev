<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Code Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Code component.
 * It showcases different styles, layouts, and formatting options through practical examples.
 *
 * Features demonstrated:
 * - Basic code display
 * - Block code formatting
 * - Different visual variants
 * - Color customization
 * - Border radius options
 * - Custom styling
 *
 * @see \MantineBlade\Components\Code
 * @link https://mantine.dev/core/code/
 */
class ExampleCode extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic inline code
     * 2. Block code with syntax
     * 3. Different visual variants
     * 4. Custom colors
     * 5. Border radius variations
     * 6. Custom styling options
     *
     * Each example showcases different features and customization
     * options available with the Code component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic inline code -->
                <div>
                    <x-mantine-text>
                        Use <x-mantine-code>console.log('Hello world')</x-mantine-code> to log messages to the console
                    </x-mantine-text>
                </div>

                <!-- Block code -->
                <div class="mt-4">
                    <x-mantine-code :block="true" color="blue">
                        function hello() {
                            console.log('Hello world!');
                            return 'Hello world!';
                        }
                    </x-mantine-code>
                </div>

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-code variant="filled">Filled variant</x-mantine-code>
                        <x-mantine-code variant="light">Light variant</x-mantine-code>
                        <x-mantine-code variant="outline">Outline variant</x-mantine-code>
                        <x-mantine-code variant="transparent">Transparent variant</x-mantine-code>
                    </x-mantine-stack>
                </div>

                <!-- With custom colors -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-code color="blue">Blue code</x-mantine-code>
                        <x-mantine-code color="teal">Teal code</x-mantine-code>
                        <x-mantine-code color="grape">Grape code</x-mantine-code>
                    </x-mantine-stack>
                </div>

                <!-- With different radius -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-code radius="xs">Extra small radius</x-mantine-code>
                        <x-mantine-code radius="md">Medium radius</x-mantine-code>
                        <x-mantine-code radius="xl">Extra large radius</x-mantine-code>
                    </x-mantine-stack>
                </div>

                <!-- With custom styles -->
                <div class="mt-4">
                    <x-mantine-code
                        :block="true"
                        :styles="[
                            'root' => [
                                'backgroundColor' => 'var(--mantine-color-blue-light)',
                                'borderLeft' => '4px solid var(--mantine-color-blue-filled)',
                            ],
                        ]"
                    >
                        // Custom styled code block
                        const value = 'Hello world';
                        console.log(value);
                    </x-mantine-code>
                </div>
            </div>
        blade;
    }
}
