<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCompositeChart extends Component
{
    public $data = [
        ['date' => 'Mar 22', 'Tomatoes' => 2301, 'Apples' => 2890, 'Oranges' => 2338],
        ['date' => 'Mar 23', 'Tomatoes' => 2181, 'Apples' => 2756, 'Oranges' => 2103],
        ['date' => 'Mar 24', 'Tomatoes' => 1821, 'Apples' => 3322, 'Oranges' => 2194],
        ['date' => 'Mar 25', 'Tomatoes' => 2764, 'Apples' => 3470, 'Oranges' => 2108],
        ['date' => 'Mar 26', 'Tomatoes' => 1821, 'Apples' => 3129, 'Oranges' => 2986],
    ];

    public $multiAxisData = [
        ['name' => 'Page A', 'uv' => 590, 'pv' => 800],
        ['name' => 'Page B', 'uv' => 868, 'pv' => 967],
        ['name' => 'Page C', 'uv' => 1397, 'pv' => 1098],
        ['name' => 'Page D', 'uv' => 1480, 'pv' => 1200],
        ['name' => 'Page E', 'uv' => 1520, 'pv' => 1108],
        ['name' => 'Page F', 'uv' => 1400, 'pv' => 680],
        ['name' => 'Page G', 'uv' => 1400, 'pv' => 680],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                        curve-type="linear"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With custom legend position -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom', 'height' => 50]"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With custom series labels -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom']"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'label' => 'Tomatoes sales', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'label' => 'Apples sales', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'label' => 'Oranges sales', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With point labels -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-point-labels="true"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With axis labels -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        x-axis-label="Date"
                        y-axis-label="Amount"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :value-formatter="function ($value) {
                            return number_format($value);
                        }"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With units -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        unit="$"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With reference lines -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :reference-lines="[
                            ['y' => 1200, 'label' => 'Average sales', 'color' => 'red.6'],
                            ['x' => 'Mar 25', 'label' => 'Report out', 'color' => 'blue.7'],
                        ]"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line'],
                        ]"
                    />
                </div>

                <!-- With right Y axis -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$multiAxisData"
                        data-key="name"
                        :with-right-y-axis="true"
                        y-axis-label="uv"
                        right-y-axis-label="pv"
                        :series="[
                            ['name' => 'uv', 'color' => 'pink.6', 'type' => 'line'],
                            ['name' => 'pv', 'color' => 'cyan.6', 'yAxisId' => 'right', 'type' => 'area'],
                        ]"
                    />
                </div>

                <!-- With dashed lines -->
                <div class="mt-8">
                    <x-mantine-composite-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :stroke-width="1"
                        :dot-props="['r' => 2]"
                        :active-dot-props="['r' => 3, 'strokeWidth' => 1]"
                        :max-bar-width="30"
                        :series="[
                            ['name' => 'Tomatoes', 'color' => 'rgba(18, 120, 255, 0.2)', 'type' => 'bar'],
                            ['name' => 'Apples', 'color' => 'red.8', 'type' => 'line', 'strokeDasharray' => '5 5'],
                            ['name' => 'Oranges', 'color' => 'yellow.8', 'type' => 'area', 'strokeDasharray' => '5 5'],
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
