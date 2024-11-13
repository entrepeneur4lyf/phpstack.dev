<?php

namespace MantineLivewire\Components;

/**
 * RadarChart component for displaying data in a radar/spider chart format.
 *
 * The RadarChart component visualizes multivariate data in a two-dimensional chart
 * with multiple variables represented on axes starting from the same point.
 *
 * @see https://mantine.dev/charts/radar-chart/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-radar-chart
 *     :data="[
 *         ['subject' => 'Math', 'A' => 120, 'B' => 110],
 *         ['subject' => 'English', 'A' => 98, 'B' => 130],
 *         ['subject' => 'Physics', 'A' => 86, 'B' => 130],
 *     ]"
 *     data-key="subject"
 *     :series="[['name' => 'Group A', 'key' => 'A'], ['name' => 'Group B', 'key' => 'B']]"
 * />
 * ```
 *
 * @example With custom dimensions and grid options
 * ```blade
 * <x-mantine-radar-chart
 *     :data="$data"
 *     data-key="category"
 *     :series="$series"
 *     :h="300"
 *     :w="400"
 *     :with-polar-grid="true"
 *     :with-legend="true"
 * />
 * ```
 *
 * @example With customized axes and props
 * ```blade
 * <x-mantine-radar-chart
 *     :data="$data"
 *     data-key="metric"
 *     :series="$series"
 *     :polar-angle-axis-props="['tickFormatter' => 'formatLabel']"
 *     :polar-radius-axis-props="['domain' => [0, 100]]"
 * />
 * ```
 */
class RadarChart extends MantineComponent
{
    /**
     * Create a new RadarChart component instance.
     *
     * @param array|null $data Array of data points to be displayed in the chart
     * @param string|null $dataKey Key in data array that contains category names
     * @param array|null $series Array of series configurations with name and key
     * @param int|null $h Height of the chart in pixels
     * @param int|null $w Width of the chart in pixels
     * @param bool|null $withPolarGrid Whether to display the polar grid
     * @param bool|null $withPolarAngleAxis Whether to display the polar angle axis
     * @param bool|null $withPolarRadiusAxis Whether to display the polar radius axis
     * @param bool|null $withLegend Whether to display the chart legend
     * @param array|null $radarChartProps Additional props for the radar chart
     * @param array|null $polarGridProps Props for customizing the polar grid
     * @param array|null $polarAngleAxisProps Props for customizing the angle axis
     * @param array|null $polarRadiusAxisProps Props for customizing the radius axis
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $dataKey = null,
        public mixed $series = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $withPolarGrid = null,
        public mixed $withPolarAngleAxis = null,
        public mixed $withPolarRadiusAxis = null,
        public mixed $withLegend = null,
        public mixed $radarChartProps = null,
        public mixed $polarGridProps = null,
        public mixed $polarAngleAxisProps = null,
        public mixed $polarRadiusAxisProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'dataKey' => $dataKey,
            'series' => $series,
            'h' => $h,
            'w' => $w,
            'withPolarGrid' => $withPolarGrid,
            'withPolarAngleAxis' => $withPolarAngleAxis,
            'withPolarRadiusAxis' => $withPolarRadiusAxis,
            'withLegend' => $withLegend,
            'radarChartProps' => $radarChartProps,
            'polarGridProps' => $polarGridProps,
            'polarAngleAxisProps' => $polarAngleAxisProps,
            'polarRadiusAxisProps' => $polarRadiusAxisProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
