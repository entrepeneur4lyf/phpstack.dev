<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example BarChart Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade BarChart component.
 * It showcases different chart types, data visualizations, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic bar chart
 * - Stacked bar chart
 * - Mixed stacked bar chart
 * - Percentage-based bar chart
 * - Waterfall chart
 * - Legend customization
 * - Value formatting
 * - Reference lines
 * - Axis labels
 * - Bar value labels
 * - Vertical orientation
 *
 * @see \MantineBlade\Components\BarChart
 * @link https://mantine.dev/charts/bar-chart/
 */
class ExampleBarChart extends Component
{
    /**
     * Sample data for multi-series charts
     *
     * Contains monthly sales data for different product categories,
     * demonstrating how to structure data for various chart types.
     *
     * @var array
     */
    public $data = [
        ['month' => 'January', 'Smartphones' => 1200, 'Laptops' => 900, 'Tablets' => 400],
        ['month' => 'February', 'Smartphones' => 1900, 'Laptops' => 1200, 'Tablets' => 200],
        ['month' => 'March', 'Smartphones' => 400, 'Laptops' => 1000, 'Tablets' => 800],
        ['month' => 'April', 'Smartphones' => 1000, 'Laptops' => 800, 'Tablets' => 1200],
        ['month' => 'May', 'Smartphones' => 800, 'Laptops' => 750, 'Tablets' => 400],
        ['month' => 'June', 'Smartphones' => 900, 'Laptops' => 1200, 'Tablets' => 200],
    ];

    /**
     * Sample data for waterfall chart
     *
     * Contains data points that show cumulative changes,
     * perfect for demonstrating waterfall chart capabilities.
     *
     * @var array
     */
    public $waterfallData = [
        ['item' => 'Tax Rate', 'value' => 70],
        ['item' => 'Perm. diff.', 'value' => -20, 'color' => 'red'],
        ['item' => 'Loss carryf.', 'value' => 10],
        ['item' => 'Reven. adj.', 'value' => 4],
        ['item' => 'ETR', 'value' => 21, 'standalone' => true],
    ];

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic bar chart with multiple series
     * 2. Stacked bar chart showing cumulative values
     * 3. Mixed stacked bar chart with different stack groups
     * 4. Percentage-based bar chart
     * 5. Waterfall chart for showing progressive changes
     * 6. Chart with legend in different positions
     * 7. Custom value formatting
     * 8. Bar value labels
     * 9. Axis labels for better context
     * 10. Reference lines for thresholds
     * 11. Vertical orientation option
     *
     * Each example showcases different features and customization
     * options available with the BarChart component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                        tick-line="y"
                    />
                </div>

                <!-- Stacked bar chart -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        type="stacked"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- Mixed stacked bar chart -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6', 'stackId' => 'a'],
                            ['name' => 'Laptops', 'color' => 'blue.6', 'stackId' => 'b'],
                            ['name' => 'Tablets', 'color' => 'teal.6', 'stackId' => 'b'],
                        ]"
                    />
                </div>

                <!-- Percent bar chart -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        type="percent"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- Waterfall bar chart -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$waterfallData"
                        data-key="item"
                        type="waterfall"
                        :series="[['name' => 'Effective tax rate in %', 'color' => 'blue']]"
                        :with-legend="true"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :with-legend="true"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With custom legend position -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom', 'height' => 50]"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With custom series labels -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        type="stacked"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom']"
                        :series="[
                            ['name' => 'Smartphones', 'label' => 'Phone sales', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'label' => 'Laptop sales', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'label' => 'Tablet sales', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With axis labels -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        x-axis-label="Date"
                        y-axis-label="Amount"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :value-formatter="function ($value) {
                            return number_format($value);
                        }"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With bar value labels -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :with-bar-value-label="true"
                        :value-formatter="function ($value) {
                            return number_format($value);
                        }"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With units -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        unit="$"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With reference lines -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        :reference-lines="[
                            [
                                'y' => 1130,
                                'color' => 'red.5',
                                'label' => 'Profit reached',
                                'labelPosition' => 'insideTopRight',
                            ],
                        ]"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>

                <!-- With vertical orientation -->
                <div class="mt-8">
                    <x-mantine-bar-chart
                        :h="300"
                        :data="$data"
                        data-key="month"
                        type="stacked"
                        orientation="vertical"
                        :y-axis-props="['width' => 80]"
                        :series="[
                            ['name' => 'Smartphones', 'color' => 'violet.6'],
                            ['name' => 'Laptops', 'color' => 'blue.6'],
                            ['name' => 'Tablets', 'color' => 'teal.6'],
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
