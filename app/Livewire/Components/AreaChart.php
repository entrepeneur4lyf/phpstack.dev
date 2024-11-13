<?php

namespace App\Livewire\Components;

/**
 * AreaChart Component
 *
 * The AreaChart component creates area charts using Recharts. It's useful for visualizing
 * quantitative data over time or comparing multiple series of data with filled areas.
 *
 * @link https://mantine.dev/charts/area-chart/
 *
 * @property mixed $data Array of data points for the chart
 * @property mixed $dataKey Key in data object to be used as x-axis values
 * @property mixed $series Array of series configurations for the chart
 * @property mixed $type Type of the area chart ('default', 'stacked')
 * @property mixed $h Height of the chart
 * @property mixed $w Width of the chart
 * @property mixed $curveType Type of curve ('linear', 'natural', 'monotone', etc.)
 * @property mixed $connectNulls Connect null data points
 * @property mixed $withDots Show dots on data points
 * @property mixed $withGradient Add gradient to areas
 * @property mixed $withLegend Show chart legend
 * @property mixed $legendProps Props for legend component
 * @property mixed $withTooltip Show tooltip on hover
 * @property mixed $tooltipProps Props for tooltip component
 * @property mixed $tooltipAnimationDuration Tooltip animation duration in ms
 * @property mixed $withXAxis Show x-axis
 * @property mixed $withYAxis Show y-axis
 * @property mixed $xAxisProps Props for x-axis
 * @property mixed $yAxisProps Props for y-axis
 * @property mixed $rightYAxisProps Props for right y-axis
 * @property mixed $withRightYAxis Show right y-axis
 * @property mixed $gridAxis Show grid for axes ('x', 'y', 'xy', null)
 * @property mixed $tickLine Show tick lines
 * @property mixed $strokeDasharray Stroke dash pattern for grid lines
 * @property mixed $unit Unit to display with values
 * @property mixed $valueFormatter Function to format values
 * @property mixed $dotProps Props for dots
 * @property mixed $activeDotProps Props for active dots
 * @property mixed $strokeWidth Width of area stroke
 * @property mixed $fillOpacity Opacity of area fill
 * @property mixed $areaChartProps Props passed to Recharts AreaChart
 * @property mixed $orientation Chart orientation ('horizontal', 'vertical')
 * @property mixed $splitColors Colors for positive and negative areas
 * @property mixed $gridColor Color of grid lines
 * @property mixed $textColor Color of text elements
 * @property mixed $referenceLines Array of reference line configurations
 * @property mixed $xAxisLabel Label for x-axis
 * @property mixed $yAxisLabel Label for y-axis
 * @property mixed $rightYAxisLabel Label for right y-axis
 * @property mixed $withPointLabels Show labels on data points
 * @property mixed $classNames Custom class names
 * @property mixed $styles Custom styles
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-area-chart
 *     :data="[
 *         ['date' => '2022-01', 'value' => 100],
 *         ['date' => '2022-02', 'value' => 200],
 *         ['date' => '2022-03', 'value' => 150]
 *     ]"
 *     data-key="date"
 *     :series="[['name' => 'Value', 'color' => 'blue']]"
 *     h="300"
 *     :with-tooltip="true"
 * />
 * ```
 *
 * @example Stacked Areas
 * ```blade
 * <x-mantine-area-chart
 *     :data="$monthlyData"
 *     data-key="month"
 *     :series="[
 *         ['name' => 'Revenue', 'color' => 'teal'],
 *         ['name' => 'Profit', 'color' => 'grape']
 *     ]"
 *     type="stacked"
 *     :with-legend="true"
 *     :with-gradient="true"
 * />
 * ```
 *
 * @example With Customizations
 * ```blade
 * <x-mantine-area-chart
 *     :data="$data"
 *     data-key="timestamp"
 *     :series="$series"
 *     curve-type="natural"
 *     :with-dots="true"
 *     :dot-props="['size' => 6]"
 *     :with-tooltip="true"
 *     :tooltip-props="['animationDuration' => 200]"
 *     unit="%"
 *     :value-formatter="fn($value) => number_format($value, 1) . '%'"
 * />
 * ```
 */
class AreaChart extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Chart data
     * @param mixed $dataKey X-axis data key
     * @param mixed $series Series configurations
     * @param mixed $type Chart type
     * @param mixed $h Chart height
     * @param mixed $w Chart width
     * @param mixed $curveType Curve interpolation
     * @param mixed $connectNulls Connect null points
     * @param mixed $withDots Show data points
     * @param mixed $withGradient Use gradient fill
     * @param mixed $withLegend Show legend
     * @param mixed $legendProps Legend configuration
     * @param mixed $withTooltip Show tooltip
     * @param mixed $tooltipProps Tooltip configuration
     * @param mixed $tooltipAnimationDuration Tooltip animation time
     * @param mixed $withXAxis Show x-axis
     * @param mixed $withYAxis Show y-axis
     * @param mixed $xAxisProps X-axis configuration
     * @param mixed $yAxisProps Y-axis configuration
     * @param mixed $rightYAxisProps Right y-axis configuration
     * @param mixed $withRightYAxis Show right y-axis
     * @param mixed $gridAxis Grid configuration
     * @param mixed $tickLine Show tick lines
     * @param mixed $strokeDasharray Grid line pattern
     * @param mixed $unit Value unit
     * @param mixed $valueFormatter Value format function
     * @param mixed $dotProps Dot configuration
     * @param mixed $activeDotProps Active dot configuration
     * @param mixed $strokeWidth Line width
     * @param mixed $fillOpacity Area opacity
     * @param mixed $areaChartProps Additional chart props
     * @param mixed $orientation Chart orientation
     * @param mixed $splitColors Area colors
     * @param mixed $gridColor Grid color
     * @param mixed $textColor Text color
     * @param mixed $referenceLines Reference lines
     * @param mixed $xAxisLabel X-axis label
     * @param mixed $yAxisLabel Y-axis label
     * @param mixed $rightYAxisLabel Right y-axis label
     * @param mixed $withPointLabels Show point labels
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $dataKey = null,
        public mixed $series = null,
        public mixed $type = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $curveType = null,
        public mixed $connectNulls = null,
        public mixed $withDots = null,
        public mixed $withGradient = null,
        public mixed $withLegend = null,
        public mixed $legendProps = null,
        public mixed $withTooltip = null,
        public mixed $tooltipProps = null,
        public mixed $tooltipAnimationDuration = null,
        public mixed $withXAxis = null,
        public mixed $withYAxis = null,
        public mixed $xAxisProps = null,
        public mixed $yAxisProps = null,
        public mixed $rightYAxisProps = null,
        public mixed $withRightYAxis = null,
        public mixed $gridAxis = null,
        public mixed $tickLine = null,
        public mixed $strokeDasharray = null,
        public mixed $unit = null,
        public mixed $valueFormatter = null,
        public mixed $dotProps = null,
        public mixed $activeDotProps = null,
        public mixed $strokeWidth = null,
        public mixed $fillOpacity = null,
        public mixed $areaChartProps = null,
        public mixed $orientation = null,
        public mixed $splitColors = null,
        public mixed $gridColor = null,
        public mixed $textColor = null,
        public mixed $referenceLines = null,
        public mixed $xAxisLabel = null,
        public mixed $yAxisLabel = null,
        public mixed $rightYAxisLabel = null,
        public mixed $withPointLabels = null,
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
            'curveType' => $curveType,
            'connectNulls' => $connectNulls,
            'withDots' => $withDots,
            'withGradient' => $withGradient,
            'withLegend' => $withLegend,
            'legendProps' => $legendProps,
            'withTooltip' => $withTooltip,
            'tooltipProps' => $tooltipProps,
            'tooltipAnimationDuration' => $tooltipAnimationDuration,
            'withXAxis' => $withXAxis,
            'withYAxis' => $withYAxis,
            'xAxisProps' => $xAxisProps,
            'yAxisProps' => $yAxisProps,
            'rightYAxisProps' => $rightYAxisProps,
            'withRightYAxis' => $withRightYAxis,
            'gridAxis' => $gridAxis,
            'tickLine' => $tickLine,
            'strokeDasharray' => $strokeDasharray,
            'unit' => $unit,
            'valueFormatter' => $valueFormatter,
            'dotProps' => $dotProps,
            'activeDotProps' => $activeDotProps,
            'strokeWidth' => $strokeWidth,
            'fillOpacity' => $fillOpacity,
            'areaChartProps' => $areaChartProps,
            'orientation' => $orientation,
            'splitColors' => $splitColors,
            'gridColor' => $gridColor,
            'textColor' => $textColor,
            'referenceLines' => $referenceLines,
            'xAxisLabel' => $xAxisLabel,
            'yAxisLabel' => $yAxisLabel,
            'rightYAxisLabel' => $rightYAxisLabel,
            'withPointLabels' => $withPointLabels,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
