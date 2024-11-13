<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example ColorInput Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade ColorInput component.
 * It showcases different formats, swatches, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic color input
 * - Different color formats
 * - Predefined swatches
 * - Color picker integration
 * - Error states
 * - Size variations
 * - Eye dropper functionality
 * - Custom styling
 *
 * @see \MantineBlade\Components\ColorInput
 * @link https://mantine.dev/core/color-input/
 */
class ExampleColorInput extends Component
{
    /**
     * Selected color value
     *
     * @var string|null
     */
    public ?string $color = null;

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic color input with hex format
     * 2. Different color formats (rgba, rgb, hsl)
     * 3. Predefined color swatches
     * 4. Color picker integration
     * 5. Error and disabled states
     * 6. Size variations
     * 7. Eye dropper functionality
     * 8. Custom styling options
     *
     * Each example showcases different features and customization
     * options available with the ColorInput component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-color-input
                    label="Pick a color"
                    placeholder="Pick color"
                    format="hex"
                />

                <!-- Different formats -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-color-input
                            label="HEX color"
                            placeholder="#FFFFFF"
                            format="hex"
                        />
                        <x-mantine-color-input
                            label="RGBA color"
                            placeholder="rgba(255, 255, 255, 1)"
                            format="rgba"
                        />
                        <x-mantine-color-input
                            label="RGB color"
                            placeholder="rgb(255, 255, 255)"
                            format="rgb"
                        />
                        <x-mantine-color-input
                            label="HSL color"
                            placeholder="hsl(0, 0%, 100%)"
                            format="hsl"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With swatches -->
                <div class="mt-4">
                    <x-mantine-color-input
                        label="With swatches"
                        placeholder="Pick color"
                        :swatches="[
                            '#25262b', '#868e96', '#fa5252', '#e64980', '#be4bdb',
                            '#7950f2', '#4c6ef5', '#228be6', '#15aabf', '#12b886',
                        ]"
                        :swatches-per-row="5"
                        format="hex"
                    />
                </div>

                <!-- With color picker -->
                <div class="mt-4">
                    <x-mantine-color-input
                        label="With color picker"
                        placeholder="Pick color"
                        :with-picker="true"
                        format="rgba"
                    />
                </div>

                <!-- With error state -->
                <div class="mt-4">
                    <x-mantine-color-input
                        label="With error"
                        placeholder="Pick color"
                        error="Invalid color"
                        format="hex"
                    />
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group align="end">
                        <x-mantine-color-input size="xs" label="xs" />
                        <x-mantine-color-input size="sm" label="sm" />
                        <x-mantine-color-input size="md" label="md" />
                        <x-mantine-color-input size="lg" label="lg" />
                        <x-mantine-color-input size="xl" label="xl" />
                    </x-mantine-group>
                </div>

                <!-- With eye dropper -->
                <div class="mt-4">
                    <x-mantine-color-input
                        label="With eye dropper"
                        placeholder="Pick color"
                        :eye-dropper-button-props="[
                            'title' => 'Open eye dropper',
                        ]"
                    />
                </div>

                <!-- Controlled input -->
                <div class="mt-4">
                    <x-mantine-color-input
                        wire:model.live="color"
                        label="Controlled input"
                        placeholder="Pick color"
                        format="hex"
                    />
                    <x-mantine-text mt="sm">Selected color: {{ $color ?? 'none' }}</x-mantine-text>
                </div>
            </div>
        blade;
    }
}
