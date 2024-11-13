<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSlider extends Component
{
    public $value = 40;
    public $rangeValue = [20, 80];
    public $endValue = 50;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic slider -->
                <x-mantine-slider
                    wire:model="value"
                    :marks="[
                        ['value' => 20, 'label' => '20%'],
                        ['value' => 50, 'label' => '50%'],
                        ['value' => 80, 'label' => '80%'],
                    ]"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-slider size="xs" :default-value="40" />
                        <x-mantine-slider size="sm" :default-value="40" />
                        <x-mantine-slider size="md" :default-value="40" />
                        <x-mantine-slider size="lg" :default-value="40" />
                        <x-mantine-slider size="xl" :default-value="40" />
                    </x-mantine-stack>
                </div>

                <!-- With label -->
                <div class="mt-4">
                    <x-mantine-text size="sm">No label</x-mantine-text>
                    <x-mantine-slider :default-value="40" :label="null" />

                    <x-mantine-text size="sm" mt="xl">Formatted label</x-mantine-text>
                    <x-mantine-slider :default-value="40" :label="function ($value) { return $value . ' °C'; }" />

                    <x-mantine-text size="sm" mt="xl">Label always visible</x-mantine-text>
                    <x-mantine-slider :default-value="40" :label-always-on="true" />

                    <x-mantine-text size="sm" mt="xl">Custom label transition</x-mantine-text>
                    <x-mantine-slider
                        :default-value="40"
                        :label-transition-props="[
                            'transition' => 'skew-down',
                            'duration' => 150,
                            'timingFunction' => 'linear',
                        ]"
                    />
                </div>

                <!-- With min, max and step -->
                <div class="mt-4">
                    <x-mantine-text>Decimal step</x-mantine-text>
                    <x-mantine-slider
                        :default-value="0"
                        :min="-10"
                        :max="10"
                        :label="function ($value) { return number_format($value, 1); }"
                        :step="0.1"
                    />

                    <x-mantine-text mt="md">Step matched with marks</x-mantine-text>
                    <x-mantine-slider
                        :default-value="50"
                        :step="25"
                        :marks="[
                            ['value' => 0, 'label' => 'xs'],
                            ['value' => 25, 'label' => 'sm'],
                            ['value' => 50, 'label' => 'md'],
                            ['value' => 75, 'label' => 'lg'],
                            ['value' => 100, 'label' => 'xl'],
                        ]"
                    />
                </div>

                <!-- Decimal values -->
                <x-mantine-slider
                    :min="0"
                    :max="1"
                    :step="0.0005"
                    :default-value="0.5535"
                    class="mt-4"
                />

                <!-- Range slider -->
                <x-mantine-slider-range
                    wire:model="rangeValue"
                    :marks="[
                        ['value' => 20, 'label' => '20%'],
                        ['value' => 50, 'label' => '50%'],
                        ['value' => 80, 'label' => '80%'],
                    ]"
                    class="mt-4"
                />

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-slider :default-value="60" :disabled="true" />
                    <x-mantine-slider-range
                        mt="xl"
                        mb="xl"
                        :disabled="true"
                        :default-value="[25, 75]"
                        :marks="[
                            ['value' => 0, 'label' => 'xs'],
                            ['value' => 25, 'label' => 'sm'],
                            ['value' => 50, 'label' => 'md'],
                            ['value' => 75, 'label' => 'lg'],
                            ['value' => 100, 'label' => 'xl'],
                        ]"
                    />
                </div>

                <!-- With thumb children -->
                <div class="mt-4">
                    <x-mantine-slider
                        :thumb-children='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>'
                        color="red"
                        :label="null"
                        :default-value="40"
                        :thumb-size="26"
                        :styles="[
                            'thumb' => [
                                'borderWidth' => '2px',
                                'padding' => '3px',
                            ],
                        ]"
                    />

                    <x-mantine-slider-range
                        mt="xl"
                        :styles="[
                            'thumb' => [
                                'borderWidth' => '2px',
                                'padding' => '3px',
                            ],
                        ]"
                        color="red"
                        :label="null"
                        :default-value="[20, 60]"
                        :thumb-size="26"
                        :thumb-children="[
                            '<svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"/></svg>',
                            '<svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"/></svg>',
                        ]"
                    />
                </div>

                <!-- With scale -->
                <div class="mt-4">
                    <x-mantine-slider
                        :scale="function ($value) { return pow(2, $value); }"
                        :step="1"
                        :min="2"
                        :max="30"
                        :label-always-on="true"
                        :default-value="10"
                        :label="function ($value) {
                            $units = ['KB', 'MB', 'GB', 'TB'];
                            $unitIndex = 0;
                            $scaledValue = $value;
                            
                            while ($scaledValue >= 1024 && $unitIndex < count($units) - 1) {
                                $unitIndex += 1;
                                $scaledValue /= 1024;
                            }
                            
                            return $scaledValue . ' ' . $units[$unitIndex];
                        }"
                    />

                    <x-mantine-slider-range
                        mt="50"
                        :scale="function ($value) { return pow(2, $value); }"
                        :step="1"
                        :min="2"
                        :max="30"
                        :label-always-on="true"
                        :default-value="[10, 20]"
                        :label="function ($value) {
                            $units = ['KB', 'MB', 'GB', 'TB'];
                            $unitIndex = 0;
                            $scaledValue = $value;
                            
                            while ($scaledValue >= 1024 && $unitIndex < count($units) - 1) {
                                $unitIndex += 1;
                                $scaledValue /= 1024;
                            }
                            
                            return $scaledValue . ' ' . $units[$unitIndex];
                        }"
                    />
                </div>

                <!-- Inverted -->
                <div class="mt-4">
                    <x-mantine-slider :inverted="true" :default-value="80" />
                    <x-mantine-slider-range :inverted="true" :default-value="[40, 80]" mt="xl" />
                </div>

                <!-- With onChangeEnd -->
                <div class="mt-4">
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-slider
                            wire:model="value"
                            wire:change-end="endValue"
                        />
                        <x-mantine-text mt="md" size="sm">
                            onChange value: <b>{{ $value }}</b>
                        </x-mantine-text>
                        <x-mantine-text mt="5" size="sm">
                            onChangeEnd value: <b>{{ $endValue }}</b>
                        </x-mantine-text>
                    </x-mantine-box>
                </div>
            </div>
        blade;
    }
}
