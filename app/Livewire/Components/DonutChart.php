<?php

namespace App\Livewire\Components;

/**
 * DonutChart Component
 *
 * The DonutChart component is used to display data in a donut chart format. It provides
 * options for customization, including size, thickness, and tooltips.
 *
 * @link https://mantine.dev/core/donut-chart/
 *
 * @property mixed $data Data to be displayed in the chart
 * @property mixed $size Size of the chart
 * @property mixed $thickness Thickness of the donut
 * @property mixed $paddingAngle Padding between slices
 * @property mixed $withTooltip Show tooltip on hover
 * @property mixed $tooltipDataSource Data source for tooltip
 * @property mixed $withLabels Show labels on the chart
 * @property mixed $withLabelsLine Show lines connecting labels to slices
 * @property mixed $chartLabel Label for the chart
 * @property mixed $startAngle Starting angle for the chart
 * @property mixed $endAngle Ending angle for the chart
 * @property mixed $strokeWidth Width of the stroke
 * @property mixed $strokeColor Color of the stroke
 * @property mixed $h Height of the chart
 * @property mixed $w Width of the chart
 * @property mixed $classNames Custom class names for the chart
 * @property mixed $styles Custom styles for the chart
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-donut-chart
 *     :data="[
 *         ['value' => 10, 'label' => 'Label 1'],
 *         ['value' => 20, 'label' => 'Label 2'],
 *         ['value' => 30, 'label' => 'Label 3'],
 *     ]"
 * />
 * ```
 *
 * @example With Custom Size and Thickness
 * ```blade
 * <x-mantine-donut-chart
 *     :data="[
 *         ['value' => 10, 'label' => 'Label 1'],
 *         ['value' => 20, 'label' => 'Label 2'],
 *     ]"
 *     size="300"
 *     thickness="40"
 * />
 * ```
 */
class DonutChart extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Data for the chart
     * @param mixed $size Size of the chart
     * @param mixed $thickness Thickness of the donut
     * @param mixed $paddingAngle Padding between slices
     * @param mixed $withTooltip Show tooltip
     * @param mixed $tooltipDataSource Data source for tooltip
     * @param mixed $withLabels Show labels
     * @param mixed $withLabelsLine Show lines for labels
     * @param mixed $chartLabel Label for the chart
     * @param mixed $startAngle Starting angle
     * @param mixed $endAngle Ending angle
     * @param mixed $strokeWidth Width of the stroke
     * @param mixed $strokeColor Color of the stroke
     * @param mixed $h Height of the chart
     * @param mixed $w Width of the chart
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $size = null,
        public mixed $thickness = null,
        public mixed $paddingAngle = null,
        public mixed $withTooltip = null,
        public mixed $tooltipDataSource = null,
        public mixed $withLabels = null,
        public mixed $withLabelsLine = null,
        public mixed $chartLabel = null,
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
            'thickness' => $thickness,
            'paddingAngle' => $paddingAngle,
            'withTooltip' => $withTooltip,
            'tooltipDataSource' => $tooltipDataSource,
            'withLabels' => $withLabels,
            'withLabelsLine' => $withLabelsLine,
            'chartLabel' => $chartLabel,
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
