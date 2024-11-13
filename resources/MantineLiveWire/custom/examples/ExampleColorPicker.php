<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleColorPicker extends Component
{
    public ?string $color = null;
    public array $swatches = [
        '#2e2e2e', '#868e96', '#fa5252', '#e64980', '#be4bdb',
        '#7950f2', '#4c6ef5', '#228be6', '#15aabf', '#12b886',
        '#40c057', '#82c91e', '#fab005', '#fd7e14'
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic color picker -->
                <x-mantine-color-picker
                    wire:model.live="color"
                    :format="'hex'"
                />

                <!-- With swatches -->
                <div class="mt-4">
                    <x-mantine-color-picker
                        :swatches="$swatches"
                        :swatches-per-row="7"
                        :format="'hex'"
                    />
                </div>

                <!-- Only picker -->
                <div class="mt-4">
                    <x-mantine-color-picker
                        :only-picker="true"
                        :size="'xl'"
                        :format="'rgba'"
                    />
                </div>

                <!-- Full width -->
                <div class="mt-4">
                    <x-mantine-color-picker
                        :full-width="true"
                        :format="'hex'"
                        :swatches="$swatches"
                    />
                </div>

                <!-- With accessibility labels -->
                <div class="mt-4">
                    <x-mantine-color-picker
                        saturation-label="Saturation"
                        hue-label="Hue"
                        alpha-label="Opacity"
                        :format="'rgba'"
                    />
                </div>

                <!-- Different formats -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-color-picker :format="'hex'" />
                        <x-mantine-color-picker :format="'rgba'" />
                        <x-mantine-color-picker :format="'hsla'" />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-color-picker size="xs" />
                        <x-mantine-color-picker size="sm" />
                        <x-mantine-color-picker size="md" />
                        <x-mantine-color-picker size="lg" />
                        <x-mantine-color-picker size="xl" />
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
