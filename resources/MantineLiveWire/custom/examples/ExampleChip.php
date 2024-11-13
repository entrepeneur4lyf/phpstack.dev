<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Chip Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Chip component.
 * It showcases different selection modes, styles, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic chip usage
 * - Different variants
 * - Single selection groups
 * - Multiple selection groups
 * - Custom icons
 * - State management
 * - Disabled states
 *
 * @see \MantineBlade\Components\Chip
 * @link https://mantine.dev/core/chip/
 */
class ExampleChip extends Component
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
     * 1. Basic chip with default state
     * 2. Different visual variants
     * 3. Single selection chip group
     * 4. Multiple selection chip group
     * 5. Custom icon integration
     * 6. Disabled states
     * 7. State management with Livewire
     *
     * Each example showcases different features and customization
     * options available with the Chip component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic chip -->
                <x-mantine-chip :default-checked="true">
                    Awesome chip
                </x-mantine-chip>

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-chip variant="outline">Outline default</x-mantine-chip>
                        <x-mantine-chip variant="outline" checked>Outline checked</x-mantine-chip>
                        <x-mantine-chip variant="outline" checked disabled>Outline checked disabled</x-mantine-chip>
                        
                        <x-mantine-chip variant="light">Light default</x-mantine-chip>
                        <x-mantine-chip variant="light" checked>Light checked</x-mantine-chip>
                        <x-mantine-chip variant="light" checked disabled>Light checked disabled</x-mantine-chip>
                        
                        <x-mantine-chip variant="filled">Filled default</x-mantine-chip>
                        <x-mantine-chip variant="filled" checked>Filled checked</x-mantine-chip>
                        <x-mantine-chip variant="filled" checked disabled>Filled checked disabled</x-mantine-chip>
                    </x-mantine-stack>
                </div>

                <!-- Single selection group -->
                <div class="mt-4">
                    <x-mantine-chip-group wire:model.live="singleValue">
                        <x-mantine-group justify="center">
                            <x-mantine-chip value="1">Single chip</x-mantine-chip>
                            <x-mantine-chip value="2">Can be selected</x-mantine-chip>
                            <x-mantine-chip value="3">At a time</x-mantine-chip>
                        </x-mantine-group>
                    </x-mantine-chip-group>
                </div>

                <!-- Multiple selection group -->
                <div class="mt-4">
                    <x-mantine-chip-group :multiple="true" wire:model.live="multipleValues">
                        <x-mantine-group justify="center">
                            <x-mantine-chip value="1">Multiple chips</x-mantine-chip>
                            <x-mantine-chip value="2">Can be selected</x-mantine-chip>
                            <x-mantine-chip value="3">At a time</x-mantine-chip>
                        </x-mantine-group>
                    </x-mantine-chip-group>
                </div>

                <!-- Custom icon -->
                <div class="mt-4">
                    <x-mantine-chip
                        icon='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"/></svg>'
                        color="red"
                        variant="filled"
                        :default-checked="true"
                    >
                        Forbidden
                    </x-mantine-chip>
                </div>
            </div>
        blade;
    }
}
