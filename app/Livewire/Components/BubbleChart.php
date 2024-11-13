<?php

namespace App\Livewire\Components;

/**
 * BubbleChart Component
 *
 * The BubbleChart component creates bubble charts using Recharts. It's useful for visualizing
 * three-dimensional data where the size of each bubble represents a third dimension.
 *
 * @link https://mantine.dev/charts/bubble-chart/
 *
 * @property mixed $data Array of data points for the chart
 * @property mixed $dataKey Configuration for x, y, and z dimensions ({ x: string; y: string; z: string })
 * @property mixed $range Range for bubble sizes [min, max]
 * @property mixed $label Label displayed above the chart
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $h Height of the chart
 * @property mixed $w Width of the chart
 * @property mixed $withTooltip Show tooltip on hover
 * @property mixed $tooltipProps Props for tooltip component
 * @property mixed $valueFormatter Function to format values
 * @property mixed $gridColor Color of grid lines
 * @property mixed $textColor Color of text elements
 * @property mixed $classNames Custom class names for chart elements
 * @property mixed $styles Custom styles for chart elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-bubble-chart
 *     :data="$data"
 *     :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
 *     :range="[16, 225]"
 *     label="Sales/hour"
 *     color="blue"
 * />
 * ```
 *
 * @example With Custom Formatting
 * ```blade
 * <x-mantine-bubble-chart
 *     :data="$data"
 *     :data-key="['x' => 'hour', 'y' => 'index', 'z' => 'value']"
 *     :range="[16, 225]"
 *     :value-formatter="fn($value) => '$' . number_format($value)"
 * />
 * ```
 */
class BubbleChart extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Chart data
     * @param mixed $dataKey Dimension keys
     * @param mixed $range Bubble size range
     * @param mixed $label Chart label
     * @param mixed $color Bubble color
     * @param mixed $h Chart height
     * @param mixed $w Chart width
     * @param mixed $withTooltip Show tooltip
     * @param mixed $tooltipProps Tooltip config
     * @param mixed $valueFormatter Value format function
     * @param mixed $gridColor Grid color
     * @param mixed $textColor Text color
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $dataKey = null,
        public mixed $range = null,
        public mixed $label = null,
        public mixed $color = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $withTooltip = null,
        public mixed $tooltipProps = null,
        public mixed $valueFormatter = null,
        public mixed $gridColor = null,
        public mixed $textColor = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'dataKey' => $dataKey,
            'range' => $range,
            'label' => $label,
            'color' => $color,
            'h' => $h,
            'w' => $w,
            'withTooltip' => $withTooltip,
            'tooltipProps' => $tooltipProps,
            'valueFormatter' => $valueFormatter,
            'gridColor' => $gridColor,
            'textColor' => $textColor,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
