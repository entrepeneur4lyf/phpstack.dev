<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDonutChart extends Component
{
    public $data = [
        ['name' => 'USA', 'value' => 400, 'color' => 'indigo.6'],
        ['name' => 'India', 'value' => 300, 'color' => 'blue.6'],
        ['name' => 'Japan', 'value' => 100, 'color' => 'teal.6'],
        ['name' => 'Other', 'value' => 200, 'color' => 'gray.6'],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-donut-chart
                        :data="$data"
                    />
                </div>

                <!-- With labels -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :with-labels="true"
                        :with-labels-line="true"
                    />
                </div>

                <!-- Custom size and thickness -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :size="160"
                        :thickness="20"
                    />
                </div>

                <!-- With padding angle -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :padding-angle="10"
                    />
                </div>

                <!-- With tooltip data source -->
                <div class="mt-8">
                    <div class="flex gap-12">
                        <div>
                            <x-mantine-text size="xs" ta="center" mb="sm">
                                Data only for hovered segment
                            </x-mantine-text>
                            <x-mantine-donut-chart
                                :data="$data"
                                tooltip-data-source="segment"
                                mx="auto"
                            />
                        </div>

                        <div>
                            <x-mantine-text size="xs" ta="center" mb="sm">
                                Data for all segments
                            </x-mantine-text>
                            <x-mantine-donut-chart
                                :data="$data"
                                mx="auto"
                            />
                        </div>
                    </div>
                </div>

                <!-- Without tooltip -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :with-tooltip="false"
                    />
                </div>

                <!-- With chart label -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        chart-label="Users by country"
                    />
                </div>

                <!-- Half circle -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :start-angle="180"
                        :end-angle="0"
                    />
                </div>

                <!-- With segments stroke -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        :stroke-width="1"
                    />
                </div>

                <!-- With custom stroke color -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        stroke-color="red.5"
                    />
                </div>

                <!-- With color scheme dependent stroke -->
                <div class="mt-8">
                    <x-mantine-donut-chart
                        :data="$data"
                        stroke-color="var(--card-bg)"
                        class="root"
                    />
                </div>
            </div>
        blade;
    }
}
