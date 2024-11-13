<?php

namespace MantineLivewire\Components;

/**
 * LineChart Component
 *
 * The LineChart component is used to display data in a line chart format. It provides options
 * for customization, including data series, axis properties, and tooltip settings.
 *
 * @link https://mantine.dev/core/line-chart/
 *
 * @property mixed $data Data to be displayed in the chart
 * @property mixed $dataKey Key for accessing data values
 * @property mixed $series Data series for the chart
 * @property mixed $type Type of line chart (e.g., 'linear', 'monotone')
 * @property mixed $h Height of the chart
 * @property mixed $w Width of the chart
 * @property mixed $curveType Type of curve for the line
 * @property mixed $connectNulls Connect lines through null values
 * @property mixed $withDots Show dots on data points
 * @property mixed $withLegend Show legend
 * @property mixed $legendProps Props for the legend
 * @property mixed $withTooltip Show tooltip on hover
 * @property mixed $tooltipProps Props for the tooltip
 * @property mixed $tooltipAnimationDuration Duration of tooltip animation
 * @property mixed $withXAxis Show X axis
 * @property mixed $withYAxis Show Y axis
 * @property mixed $xAxisProps Props for the X axis
 * @property mixed $yAxisProps Props for the Y axis
 * @property mixed $rightYAxisProps Props for the right Y axis
 * @property mixed $withRightYAxis Show right Y axis
 * @property mixed $gridAxis Show grid lines
 * @property mixed $tickLine Show tick lines
 * @property mixed $strokeDasharray Stroke dash array for the line
 * @property mixed $unit Unit for the data values
 * @property mixed $valueFormatter Function to format values
 * @property mixed $dotProps Props for the dots
 * @property mixed $activeDotProps Props for the active dot
 * @property mixed $strokeWidth Width of the line
 * @property mixed $orientation Orientation of the chart
 * @property mixed $gridColor Color of the grid lines
 * @property mixed $textColor Color of the text
 * @property mixed $referenceLines Reference lines in the chart
 * @property mixed $xAxisLabel Label for the X axis
 * @property mixed $yAxisLabel Label for the Y axis
 * @property mixed $rightYAxisLabel Label for the right Y axis
 * @property mixed $withPointLabels Show labels on points
 * @property mixed $lineChartProps Additional props for the line chart
 * @property mixed $gradientStops Gradient stops for the line
 * @property mixed $classNames Custom class names for the chart
 * @property mixed $styles Custom styles for the chart
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-line-chart
 *     :data="data"
 *     data-key="value"
 * />
 * ```
 *
 * @example With Custom Axis Labels
 * ```blade
 * <x-mantine-line-chart
 *     :data="data"
 *     x-axis-label="Months"
 *     y-axis-label="Sales"
 * />
 * ```
 */
class LineChart extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Data for the chart
     * @param mixed $dataKey Key for accessing data values
     * @param mixed $series Data series
     * @param mixed $type Type of line chart
     * @param mixed $h Height of the chart
     * @param mixed $w Width of the chart
     * @param mixed $curveType Type of curve
     * @param mixed $connectNulls Connect nulls
     * @param mixed $withDots Show dots
     * @param mixed $withLegend Show legend
     * @param mixed $legendProps Props for the legend
     * @param mixed $withTooltip Show tooltip
     * @param mixed $tooltipProps Props for the tooltip
     * @param mixed $tooltipAnimationDuration Duration of tooltip animation
     * @param mixed $withXAxis Show X axis
     * @param mixed $withYAxis Show Y axis
     * @param mixed $xAxisProps Props for the X axis
     * @param mixed $yAxisProps Props for the Y axis
     * @param mixed $rightYAxisProps Props for the right Y axis
     * @param mixed $withRightYAxis Show right Y axis
     * @param mixed $gridAxis Show grid lines
     * @param mixed $tickLine Show tick lines
     * @param mixed $strokeDasharray Stroke dash array
     * @param mixed $unit Unit for data values
     * @param mixed $valueFormatter Function to format values
     * @param mixed $dotProps Props for the dots
     * @param mixed $activeDotProps Props for the active dot
     * @param mixed $strokeWidth Width of the line
     * @param mixed $orientation Orientation of the chart
     * @param mixed $gridColor Color of the grid lines
     * @param mixed $textColor Color of the text
     * @param mixed $referenceLines Reference lines
     * @param mixed $xAxisLabel Label for the X axis
     * @param mixed $yAxisLabel Label for the Y axis
     * @param mixed $rightYAxisLabel Label for the right Y axis
     * @param mixed $withPointLabels Show labels on points
     * @param mixed $lineChartProps Additional props for the line chart
     * @param mixed $gradientStops Gradient stops for the line
     * @param mixed $classNames Custom class names
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
        public mixed $orientation = null,
        public mixed $gridColor = null,
        public mixed $textColor = null,
        public mixed $referenceLines = null,
        public mixed $xAxisLabel = null,
        public mixed $yAxisLabel = null,
        public mixed $rightYAxisLabel = null,
        public mixed $withPointLabels = null,
        public mixed $lineChartProps = null,
        public mixed $gradientStops = null,
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
            'orientation' => $orientation,
            'gridColor' => $gridColor,
            'textColor' => $textColor,
            'referenceLines' => $referenceLines,
            'xAxisLabel' => $xAxisLabel,
            'yAxisLabel' => $yAxisLabel,
            'rightYAxisLabel' => $rightYAxisLabel,
            'withPointLabels' => $withPointLabels,
            'lineChartProps' => $lineChartProps,
            'gradientStops' => $gradientStops,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
