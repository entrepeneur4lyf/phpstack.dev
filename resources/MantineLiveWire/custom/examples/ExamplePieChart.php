<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePieChart extends Component
{
    public $data = [
        ['name' => 'USA', 'value' => 400, 'color' => 'indigo.6'],
        ['name' => 'India', 'value' => 300, 'color' => 'blue.6'],
        ['name' => 'Japan', 'value' => 300, 'color' => 'teal.6'],
        ['name' => 'Other', 'value' => 200, 'color' => 'gray.6'],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-pie-chart
                        :data="$data"
                    />
                </div>

                <!-- With labels -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        :with-labels="true"
                        :with-labels-line="true"
                        labels-position="outside"
                        labels-type="value"
                    />
                </div>

                <!-- Custom size -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        :size="160"
                    />
                </div>

                <!-- With tooltip -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        :with-tooltip="true"
                    />
                </div>

                <!-- With tooltip data source -->
                <div class="mt-8">
                    <div class="flex gap-12">
                        <div>
                            <x-mantine-text size="xs" ta="center" mb="sm">
                                Data only for hovered segment
                            </x-mantine-text>
                            <x-mantine-pie-chart
                                :data="$data"
                                :with-tooltip="true"
                                tooltip-data-source="segment"
                                mx="auto"
                            />
                        </div>

                        <div>
                            <x-mantine-text size="xs" ta="center" mb="sm">
                                Data for all segments
                            </x-mantine-text>
                            <x-mantine-pie-chart
                                :data="$data"
                                :with-tooltip="true"
                                mx="auto"
                            />
                        </div>
                    </div>
                </div>

                <!-- Half circle -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        :start-angle="180"
                        :end-angle="0"
                    />
                </div>

                <!-- With segments stroke -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        :stroke-width="1"
                    />
                </div>

                <!-- With custom stroke color -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        stroke-color="red.5"
                    />
                </div>

                <!-- With color scheme dependent stroke -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="$data"
                        stroke-color="var(--card-bg)"
                        class="root"
                    />
                </div>

                <!-- With custom colors -->
                <div class="mt-8">
                    <x-mantine-pie-chart
                        :data="[
                            ['name' => 'USA', 'value' => 400, 'color' => 'blue'],
                            ['name' => 'Other', 'value' => 200, 'color' => 'gray.6'],
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
