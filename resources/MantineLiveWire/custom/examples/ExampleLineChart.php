<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleLineChart extends Component
{
    public $data = [
        ['date' => 'Mar 22', 'Apples' => 2890, 'Oranges' => 2338, 'Tomatoes' => 3795],
        ['date' => 'Mar 23', 'Apples' => 2756, 'Oranges' => 2103, 'Tomatoes' => 3590],
        ['date' => 'Mar 24', 'Apples' => 3322, 'Oranges' => 2194, 'Tomatoes' => 3868],
        ['date' => 'Mar 25', 'Apples' => 3470, 'Oranges' => 2108, 'Tomatoes' => 3821],
        ['date' => 'Mar 26', 'Apples' => 3129, 'Oranges' => 2986, 'Tomatoes' => 3932],
    ];

    public $temperatureData = [
        ['date' => 'Jan', 'temperature' => -15],
        ['date' => 'Feb', 'temperature' => -10],
        ['date' => 'Mar', 'temperature' => 5],
        ['date' => 'Apr', 'temperature' => 15],
        ['date' => 'May', 'temperature' => 25],
        ['date' => 'Jun', 'temperature' => 30],
        ['date' => 'Jul', 'temperature' => 35],
        ['date' => 'Aug', 'temperature' => 32],
        ['date' => 'Sep', 'temperature' => 25],
        ['date' => 'Oct', 'temperature' => 15],
        ['date' => 'Dec', 'temperature' => -5],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                        curve-type="linear"
                    />
                </div>

                <!-- Gradient type -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$temperatureData"
                        :series="[['name' => 'temperature', 'label' => 'Avg. Temperature']]"
                        data-key="date"
                        type="gradient"
                        :gradient-stops="[
                            ['offset' => 0, 'color' => 'red.6'],
                            ['offset' => 20, 'color' => 'orange.6'],
                            ['offset' => 40, 'color' => 'yellow.5'],
                            ['offset' => 70, 'color' => 'lime.5'],
                            ['offset' => 80, 'color' => 'cyan.5'],
                            ['offset' => 100, 'color' => 'blue.5'],
                        ]"
                        :stroke-width="5"
                        curve-type="natural"
                        :y-axis-props="['domain' => [-25, 40]]"
                        :value-formatter="function ($value) {
                            return $value . '°C';
                        }"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With custom legend position -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom', 'height' => 50]"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With custom series labels -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom']"
                        :series="[
                            ['name' => 'Apples', 'label' => 'Apples sales', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'label' => 'Oranges sales', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'label' => 'Tomatoes sales', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With point labels -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-point-labels="true"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                        ]"
                    />
                </div>

                <!-- With axis labels -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        x-axis-label="Date"
                        y-axis-label="Amount"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :value-formatter="function ($value) {
                            return number_format($value);
                        }"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With units -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        unit="$"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With reference lines -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :y-axis-props="['domain' => [0, 5000]]"
                        :reference-lines="[
                            ['y' => 3000, 'label' => 'Average sales', 'color' => 'red.6'],
                            ['x' => 'Mar 24', 'label' => 'Report out'],
                        ]"
                        :series="[['name' => 'Apples', 'color' => 'indigo.6']]"
                    />
                </div>

                <!-- With vertical orientation -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        orientation="vertical"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With dashed line -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :dot-props="['r' => 2]"
                        :active-dot-props="['r' => 3, 'strokeWidth' => 1]"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6', 'strokeDasharray' => '5 5'],
                        ]"
                    />
                </div>

                <!-- With custom dots -->
                <div class="mt-8">
                    <x-mantine-line-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :dot-props="['r' => 6, 'strokeWidth' => 2, 'stroke' => '#fff']"
                        :active-dot-props="['r' => 8, 'strokeWidth' => 1, 'fill' => '#fff']"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
