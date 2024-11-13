<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example BubbleChart Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade BubbleChart component.
 * It showcases different visualization options and customization features through practical examples.
 *
 * Features demonstrated:
 * - Basic bubble chart
 * - Custom colors
 * - Color scheme integration
 * - Tooltip configuration
 * - Value formatting
 * - Grid and text color customization
 * - Theme-dependent styling
 *
 * @see \MantineBlade\Components\BubbleChart
 * @link https://mantine.dev/charts/bubble-chart/
 */
class ExampleBubbleChart extends Component
{
    /**
     * Sample data for bubble chart visualization
     *
     * Contains hourly sales data with value determining bubble size,
     * demonstrating how to structure data for bubble charts.
     *
     * @var array
     */
    public $data = [
        ['hour' => '08:00', 'index' => 1, 'value' => 25],
        ['hour' => '10:00', 'index' => 1, 'value' => 40],
        ['hour' => '12:00', 'index' => 1, 'value' => 150],
        ['hour' => '14:00', 'index' => 1, 'value' => 80],
        ['hour' => '16:00', 'index' => 1, 'value' => 100],
        ['hour' => '18:00', 'index' => 1, 'value' => 200],
        ['hour' => '20:00', 'index' => 1, 'value' => 75],
        ['hour' => '22:00', 'index' => 1, 'value' => 50],
    ];

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic bubble chart with default settings
     * 2. Custom color configuration
     * 3. Color scheme dependent styling
     * 4. Tooltip customization
     * 5. Value formatting
     * 6. Grid and text color customization
     * 7. Theme integration
     *
     * Each example showcases different features and customization
     * options available with the BubbleChart component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        label="Sales/hour"
                        color="lime.6"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                    />
                </div>

                <!-- With custom color -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                        color="blue"
                    />
                </div>

                <!-- With color scheme dependent color -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        label="Sales/hour"
                        color="var(--scatter-color)"
                        class="root"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                    />
                </div>

                <!-- Without tooltip -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                        :with-tooltip="false"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        label="Sales/hour"
                        color="lime.6"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                        :value-formatter="function ($value) {
                            return number_format($value, 2) . ' USD';
                        }"
                    />
                </div>

                <!-- With custom grid and text colors -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        label="Sales/hour"
                        color="lime.6"
                        grid-color="gray.5"
                        text-color="gray.9"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                    />
                </div>

                <!-- With theme-dependent colors -->
                <div class="mt-8">
                    <x-mantine-bubble-chart
                        :h="60"
                        :data="$data"
                        :range="[16, 225]"
                        label="Sales/hour"
                        color="lime.6"
                        class="root"
                        :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
                    />
                </div>
            </div>
        blade;
    }
}
