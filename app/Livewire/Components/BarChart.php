<?php

namespace App\Livewire\Components;

/**
 * BarChart Component
 *
 * The BarChart component creates bar charts using Recharts. It's useful for comparing quantities
 * across categories or showing data changes over time.
 *
 * @link https://mantine.dev/charts/bar-chart/
 *
 * @property mixed $data Array of data points for the chart
 * @property mixed $dataKey Key in data object to be used as x-axis values
 * @property mixed $series Array of series configurations for the chart
 * @property mixed $type Type of bar chart ('default', 'stacked', 'percent', 'waterfall')
 * @property mixed $h Height of the chart
 * @property mixed $w Width of the chart
 * @property mixed $withLegend Show chart legend
 * @property mixed $legendProps Props for legend component
 * @property mixed $withTooltip Show tooltip on hover
 * @property mixed $tooltipProps Props for tooltip component
 * @property mixed $tooltipAnimationDuration Tooltip animation duration in ms
 * @property mixed $withXAxis Show x-axis
 * @property mixed $withYAxis Show y-axis
 * @property mixed $xAxisProps Props for x-axis
 * @property mixed $yAxisProps Props for y-axis
 * @property mixed $gridAxis Show grid for axes ('x', 'y', 'xy', null)
 * @property mixed $tickLine Show tick lines
 * @property mixed $strokeDasharray Stroke dash pattern for grid lines
 * @property mixed $unit Unit to display with values
 * @property mixed $valueFormatter Function to format values
 * @property mixed $barProps Props for bars
 * @property mixed $minBarSize Minimum bar size
 * @property mixed $orientation Chart orientation ('horizontal', 'vertical')
 * @property mixed $gridColor Color of grid lines
 * @property mixed $textColor Color of text elements
 * @property mixed $referenceLines Array of reference line configurations
 * @property mixed $xAxisLabel Label for x-axis
 * @property mixed $yAxisLabel Label for y-axis
 * @property mixed $withBarValueLabel Show values on bars
 * @property mixed $barChartProps Props passed to Recharts BarChart
 * @property mixed $classNames Custom class names
 * @property mixed $styles Custom styles
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-bar-chart
 *     :data="$salesData"
 *     data-key="month"
 *     :series="[
 *         ['name' => 'Revenue', 'color' => 'blue']
 *     ]"
 *     :h="300"
 * />
 * ```
 *
 * @example Stacked Bars
 * ```blade
 * <x-mantine-bar-chart
 *     :data="$data"
 *     data-key="category"
 *     type="stacked"
 *     :series="[
 *         ['name' => 'Q1', 'color' => 'blue'],
 *         ['name' => 'Q2', 'color' => 'green']
 *     ]"
 *     :with-legend="true"
 * />
 * ```
 */
class BarChart extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $data = null,
        public mixed $dataKey = null,
        public mixed $series = null,
        public mixed $type = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $withLegend = null,
        public mixed $legendProps = null,
        public mixed $withTooltip = null,
        public mixed $tooltipProps = null,
        public mixed $tooltipAnimationDuration = null,
        public mixed $withXAxis = null,
        public mixed $withYAxis = null,
        public mixed $xAxisProps = null,
        public mixed $yAxisProps = null,
        public mixed $gridAxis = null,
        public mixed $tickLine = null,
        public mixed $strokeDasharray = null,
        public mixed $unit = null,
        public mixed $valueFormatter = null,
        public mixed $barProps = null,
        public mixed $minBarSize = null,
        public mixed $orientation = null,
        public mixed $gridColor = null,
        public mixed $textColor = null,
        public mixed $referenceLines = null,
        public mixed $xAxisLabel = null,
        public mixed $yAxisLabel = null,
        public mixed $withBarValueLabel = null,
        public mixed $barChartProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'dataKey' => $dataKey,
            'series' => $series,
            'type' => $type,
            'h' => $h,
            'w' => $w,
            'withLegend' => $withLegend,
            'legendProps' => $legendProps,
            'withTooltip' => $withTooltip,
            'tooltipProps' => $tooltipProps,
            'tooltipAnimationDuration' => $tooltipAnimationDuration,
            'withXAxis' => $withXAxis,
            'withYAxis' => $withYAxis,
            'xAxisProps' => $xAxisProps,
            'yAxisProps' => $yAxisProps,
            'gridAxis' => $gridAxis,
            'tickLine' => $tickLine,
            'strokeDasharray' => $strokeDasharray,
            'unit' => $unit,
            'valueFormatter' => $valueFormatter,
            'barProps' => $barProps,
            'minBarSize' => $minBarSize,
            'orientation' => $orientation,
            'gridColor' => $gridColor,
            'textColor' => $textColor,
            'referenceLines' => $referenceLines,
            'xAxisLabel' => $xAxisLabel,
            'yAxisLabel' => $yAxisLabel,
            'withBarValueLabel' => $withBarValueLabel,
            'barChartProps' => $barChartProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
