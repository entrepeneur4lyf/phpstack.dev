<?php

namespace App\Livewire\Components;

/**
 * PieChart component for displaying data in a circular statistical graphic.
 *
 * The PieChart component creates interactive pie charts to visualize proportional data,
 * with support for tooltips, labels, and customizable styling options.
 *
 * @see https://mantine.dev/charts/pie/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-pie-chart
 *     :data="[
 *         ['name' => 'USA', 'value' => 600, 'color' => '#47d6ab'],
 *         ['name' => 'Canada', 'value' => 300, 'color' => '#4fcdf7'],
 *         ['name' => 'Mexico', 'value' => 200, 'color' => '#5c5fff'],
 *     ]"
 *     :size="300"
 * />
 * ```
 *
 * @example With tooltips and labels
 * ```blade
 * <x-mantine-pie-chart
 *     :data="$chartData"
 *     :with-tooltip="true"
 *     :with-labels="true"
 *     :labels-type="outside"
 *     :size="400"
 * />
 * ```
 *
 * @example Custom angles and styling
 * ```blade
 * <x-mantine-pie-chart
 *     :data="$data"
 *     :start-angle="180"
 *     :end-angle="360"
 *     :stroke-width="2"
 *     :stroke-color="white"
 * />
 * ```
 */
class PieChart extends MantineComponent
{
    /**
     * Create a new PieChart component instance.
     *
     * @param array|null $data Array of objects with name, value, and color properties
     * @param int|null $size Chart size in pixels
     * @param bool|null $withTooltip Whether to show tooltips on hover
     * @param string|null $tooltipDataSource Data source for tooltip content ('value' or 'percentage')
     * @param bool|null $withLabels Whether to display labels
     * @param bool|null $withLabelsLine Whether to show lines connecting labels to segments
     * @param string|null $labelsPosition Labels position ('inside' or 'outside')
     * @param string|null $labelsType Type of labels to display ('value' or 'percentage')
     * @param int|null $startAngle Starting angle in degrees (0-360)
     * @param int|null $endAngle Ending angle in degrees (0-360)
     * @param int|null $strokeWidth Width of segment borders
     * @param string|null $strokeColor Color of segment borders
     * @param int|null $h Chart height in pixels
     * @param int|null $w Chart width in pixels
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $size = null,
        public mixed $withTooltip = null,
        public mixed $tooltipDataSource = null,
        public mixed $withLabels = null,
        public mixed $withLabelsLine = null,
        public mixed $labelsPosition = null,
        public mixed $labelsType = null,
        public mixed $startAngle = null,
        public mixed $endAngle = null,
        public mixed $strokeWidth = null,
        public mixed $strokeColor = null,
        public mixed $h = null,
        public mixed $w = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'size' => $size,
            'withTooltip' => $withTooltip,
            'tooltipDataSource' => $tooltipDataSource,
            'withLabels' => $withLabels,
            'withLabelsLine' => $withLabelsLine,
            'labelsPosition' => $labelsPosition,
            'labelsType' => $labelsType,
            'startAngle' => $startAngle,
            'endAngle' => $endAngle,
            'strokeWidth' => $strokeWidth,
            'strokeColor' => $strokeColor,
            'h' => $h,
            'w' => $w,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
