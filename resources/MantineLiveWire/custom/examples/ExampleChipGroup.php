<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example ChipGroup Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade ChipGroup component.
 * It showcases different selection modes, styles, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic chip group usage
 * - Single selection mode
 * - Multiple selection mode
 * - Custom styling
 * - State management
 *
 * @see \MantineBlade\Components\ChipGroup
 * @link https://mantine.dev/core/chip/
 */
class ExampleChipGroup extends Component
{
    /**
     * Value for single selection example
     *
     * @var string|null
     */
    public ?string $singleValue = null;

    /**
     * Values for multiple selection example
     *
     * @var array
     */
    public array $multipleValues = [];

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic chip group with single selection
     * 2. Multiple selection chip group
     * 3. Custom styling and layout
     * 4. State management with Livewire
     *
     * Each example showcases different features and customization
     * options available with the ChipGroup component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Single selection group -->
                <x-mantine-chip-group wire:model.live="singleValue">
                    <x-mantine-group justify="center">
                        <x-mantine-chip value="1">Option 1</x-mantine-chip>
                        <x-mantine-chip value="2">Option 2</x-mantine-chip>
                    </x-mantine-group>
                </x-mantine-chip-group>

                <!-- Multiple selection group -->
                <div class="mt-4">
                    <x-mantine-chip-group :multiple="true" wire:model.live="multipleValues">
                        <x-mantine-group justify="center">
                            <x-mantine-chip value="1">Option 1</x-mantine-chip>
                            <x-mantine-chip value="2">Option 2</x-mantine-chip>
                        </x-mantine-group>
                    </x-mantine-chip-group>
                </div>

                <!-- Custom styled chips -->
                <div class="mt-4">
                    <x-mantine-chip-group>
                        <x-mantine-chip color="red">Red Chip</x-mantine-chip>
                        <x-mantine-chip color="green">Green Chip</x-mantine-chip>
                        <x-mantine-chip color="blue">Blue Chip</x-mantine-chip>
                    </x-mantine-chip-group>
                </div>
            </div>
        blade;
    }
}
