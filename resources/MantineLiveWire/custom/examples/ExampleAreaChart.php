<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example AreaChart Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade AreaChart component.
 * It showcases different chart types, data visualizations, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic area chart
 * - Stacked area chart
 * - Percentage-based area chart
 * - Split area chart for positive/negative values
 * - Legend customization
 * - Point labels
 * - Axis labels
 * - Value formatting
 * - Reference lines
 * - Vertical orientation
 *
 * @see \MantineBlade\Components\AreaChart
 * @link https://mantine.dev/charts/area-chart/
 */
class ExampleAreaChart extends Component
{
    /**
     * Sample data for multi-series charts
     *
     * Contains daily sales data for different products over a period,
     * demonstrating how to structure data for various chart types.
     *
     * @var array
     */
    public $data = [
        ['date' => 'Mar 22', 'Apples' => 2890, 'Oranges' => 2338, 'Tomatoes' => 3795],
        ['date' => 'Mar 23', 'Apples' => 2756, 'Oranges' => 2103, 'Tomatoes' => 3590],
        ['date' => 'Mar 24', 'Apples' => 3322, 'Oranges' => 2194, 'Tomatoes' => 3868],
        ['date' => 'Mar 25', 'Apples' => 3470, 'Oranges' => 2108, 'Tomatoes' => 3821],
        ['date' => 'Mar 26', 'Apples' => 3129, 'Oranges' => 2986, 'Tomatoes' => 3932],
    ];

    /**
     * Sample data for split area chart
     *
     * Contains positive and negative values to demonstrate
     * split area visualization capabilities.
     *
     * @var array
     */
    public $splitData = [
        ['date' => 'Mar 22', 'Apples' => 50],
        ['date' => 'Mar 23', 'Apples' => -20],
        ['date' => 'Mar 24', 'Apples' => 80],
        ['date' => 'Mar 25', 'Apples' => -30],
        ['date' => 'Mar 26', 'Apples' => 60],
    ];

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic area chart with multiple series
     * 2. Stacked area chart showing cumulative values
     * 3. Percentage-based area chart
     * 4. Split area chart for positive/negative values
     * 5. Chart with legend in different positions
     * 6. Custom series labels
     * 7. Point labels for data points
     * 8. Axis labels for better context
     * 9. Value formatting and units
     * 10. Reference lines for thresholds
     * 11. Vertical orientation option
     *
     * Each example showcases different features and customization
     * options available with the AreaChart component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-area-chart
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

                <!-- Stacked area chart -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- Percent area chart -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="percent"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- Split area chart -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$splitData"
                        data-key="date"
                        type="split"
                        :stroke-width="1"
                        :dot-props="['r' => 2, 'strokeWidth' => 1]"
                        :active-dot-props="['r' => 3, 'strokeWidth' => 1]"
                        :series="[['name' => 'Apples', 'color' => 'bright']]"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
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
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
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
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
                        :with-legend="true"
                        :series="[
                            ['name' => 'Apples', 'label' => 'Apples sales', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'label' => 'Oranges sales', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'label' => 'Tomatoes sales', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With point labels -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        :with-point-labels="true"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With axis labels -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
                        x-axis-label="Date"
                        y-axis-label="Amount"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With units -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
                        unit="$"
                        :series="[
                            ['name' => 'Apples', 'color' => 'indigo.6'],
                            ['name' => 'Oranges', 'color' => 'blue.6'],
                            ['name' => 'Tomatoes', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
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

                <!-- With reference lines -->
                <div class="mt-8">
                    <x-mantine-area-chart
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
                    <x-mantine-area-chart
                        :h="300"
                        :data="$data"
                        data-key="date"
                        type="stacked"
                        orientation="vertical"
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
