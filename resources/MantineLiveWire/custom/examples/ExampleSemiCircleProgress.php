<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSemiCircleProgress extends Component
{
    public $value = 30;

    public function setRandomValue()
    {
        $this->value = rand(0, 100);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-semi-circle-progress
                    :value="40"
                    fill-direction="left-to-right"
                    orientation="up"
                    filled-segment-color="blue"
                    :size="200"
                    :thickness="12"
                    label="Label"
                />

                <!-- Different fill directions -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-semi-circle-progress
                            :value="40"
                            fill-direction="right-to-left"
                            label="Right to left"
                        />
                        <x-mantine-semi-circle-progress
                            :value="40"
                            fill-direction="left-to-right"
                            label="Left to right"
                        />
                    </x-mantine-group>
                </div>

                <!-- Different orientations -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-semi-circle-progress
                            :value="40"
                            orientation="up"
                            label="Up"
                        />
                        <x-mantine-semi-circle-progress
                            :value="40"
                            orientation="down"
                            label="Down"
                        />
                    </x-mantine-group>
                </div>

                <!-- With custom empty segment color -->
                <div class="mt-4">
                    <x-mantine-semi-circle-progress
                        :value="30"
                        empty-segment-color="var(--mantine-color-dimmed)"
                    />
                </div>

                <!-- Different label positions -->
                <div class="mt-4">
                    <x-mantine-semi-circle-progress
                        :value="30"
                        label="Bottom"
                        class="mb-8"
                    />
                    <x-mantine-semi-circle-progress
                        :value="30"
                        label="Center"
                        label-position="center"
                    />
                </div>

                <!-- With transition -->
                <div class="mt-4">
                    <x-mantine-semi-circle-progress
                        :value="$value"
                        :transition-duration="250"
                        :label="$value . '%'"
                    />

                    <x-mantine-button
                        :on-click="fn() => $this->setRandomValue()"
                        mt="xl"
                        full-width
                    >
                        Set random value
                    </x-mantine-button>
                </div>

                <!-- With custom colors -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-semi-circle-progress
                            :value="60"
                            filled-segment-color="teal"
                            label="Teal"
                        />
                        <x-mantine-semi-circle-progress
                            :value="60"
                            filled-segment-color="grape"
                            label="Grape"
                        />
                        <x-mantine-semi-circle-progress
                            :value="60"
                            filled-segment-color="orange"
                            label="Orange"
                        />
                    </x-mantine-group>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group align="end">
                        <x-mantine-semi-circle-progress
                            :value="60"
                            :size="100"
                            label="Small"
                        />
                        <x-mantine-semi-circle-progress
                            :value="60"
                            :size="150"
                            label="Medium"
                        />
                        <x-mantine-semi-circle-progress
                            :value="60"
                            :size="200"
                            label="Large"
                        />
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
