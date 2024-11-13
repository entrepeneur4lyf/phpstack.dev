<?php

namespace MantineLivewire\Components;

/**
 * ScatterChart component for visualizing relationships between two variables.
 *
 * The ScatterChart component creates a scatter plot visualization that displays
 * points on a two-dimensional plane, useful for showing correlations, patterns,
 * or distributions in data sets.
 *
 * @see https://mantine.dev/charts/scatter/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-scatter-chart
 *     :data="[
 *         ['x' => 10, 'y' => 20, 'group' => 'A'],
 *         ['x' => 15, 'y' => 30, 'group' => 'B'],
 *         ['x' => 25, 'y' => 40, 'group' => 'A']
 *     ]"
 *     :h="300"
 *     :w="400"
 * />
 * ```
 *
 * @example With custom styling and tooltips
 * ```blade
 * <x-mantine-scatter-chart
 *     :data="$dataPoints"
 *     :with-tooltip="true"
 *     :tooltip-props="['format' => '%.2f']"
 *     grid-color="gray.4"
 *     text-color="dark.6"
 * />
 * ```
 *
 * @example Advanced configuration
 * ```blade
 * <x-mantine-scatter-chart
 *     :data="$measurements"
 *     :x-axis-label="'Time (s)'"
 *     :y-axis-label="'Value'"
 *     :with-legend="true"
 *     :reference-lines="[
 *         ['y' => 50, 'color' => 'red', 'label' => 'Threshold']
 *     ]"
 *     :point-labels="true"
 * />
 * ```
 */
class ScatterChart extends MantineComponent
{
    /**
     * Create a new ScatterChart component instance.
     *
     * @param array|null $data Array of data points to plot
     * @param string|null $dataKey Key to identify data series
     * @param int|null $h Height of the chart in pixels
     * @param int|null $w Width of the chart in pixels
     * @param bool|null $withLegend Whether to show the legend
     * @param array|null $legendProps Custom properties for the legend
     * @param bool|null $withTooltip Whether to show tooltips
     * @param array|null $tooltipProps Custom properties for tooltips
     * @param int|null $tooltipAnimationDuration Duration of tooltip animations
     * @param array|null $xAxisProps Properties for the X axis
     * @param array|null $yAxisProps Properties for the Y axis
     * @param string|null $gridAxis Which axes to show grid lines for
     * @param bool|null $tickLine Whether to show tick lines
     * @param string|null $strokeDasharray Pattern for dashed lines
     * @param string|null $unit Unit for values
     * @param mixed $valueFormatter Function to format values
     * @param bool|null $pointLabels Whether to show labels on points
     * @param string|null $gridColor Color of grid lines
     * @param string|null $textColor Color of text elements
     * @param array|null $referenceLines Array of reference lines to display
     * @param string|null $xAxisLabel Label for X axis
     * @param string|null $yAxisLabel Label for Y axis
     * @param array|null $labels Custom labels for data points
     * @param array|null $scatterProps Custom properties for scatter points
     * @param array|null $classNames Custom class names
     * @param array|null $styles Custom styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $dataKey = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $withLegend = null,
        public mixed $legendProps = null,
        public mixed $withTooltip = null,
        public mixed $tooltipProps = null,
        public mixed $tooltipAnimationDuration = null,
        public mixed $xAxisProps = null,
        public mixed $yAxisProps = null,
        public mixed $gridAxis = null,
        public mixed $tickLine = null,
        public mixed $strokeDasharray = null,
        public mixed $unit = null,
        public mixed $valueFormatter = null,
        public mixed $pointLabels = null,
        public mixed $gridColor = null,
        public mixed $textColor = null,
        public mixed $referenceLines = null,
        public mixed $xAxisLabel = null,
        public mixed $yAxisLabel = null,
        public mixed $labels = null,
        public mixed $scatterProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'dataKey' => $dataKey,
            'h' => $h,
            'w' => $w,
            'withLegend' => $withLegend,
            'legendProps' => $legendProps,
            'withTooltip' => $withTooltip,
            'tooltipProps' => $tooltipProps,
            'tooltipAnimationDuration' => $tooltipAnimationDuration,
            'xAxisProps' => $xAxisProps,
            'yAxisProps' => $yAxisProps,
            'gridAxis' => $gridAxis,
            'tickLine' => $tickLine,
            'strokeDasharray' => $strokeDasharray,
            'unit' => $unit,
            'valueFormatter' => $valueFormatter,
            'pointLabels' => $pointLabels,
            'gridColor' => $gridColor,
            'textColor' => $textColor,
            'referenceLines' => $referenceLines,
            'xAxisLabel' => $xAxisLabel,
            'yAxisLabel' => $yAxisLabel,
            'labels' => $labels,
            'scatterProps' => $scatterProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
