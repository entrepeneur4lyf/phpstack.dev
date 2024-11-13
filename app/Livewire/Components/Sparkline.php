<?php

namespace MantineLivewire\Components;

/**
 * Sparkline component for displaying small inline charts.
 *
 * The Sparkline component creates compact, data-dense charts typically used inline with text
 * or in small spaces. It's perfect for showing trends, patterns, or variations in data
 * without requiring a full-sized chart.
 *
 * @see https://mantine.dev/core/sparkline/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-sparkline
 *     :data="[1, 2, 8, 6, 7, 3]"
 *     h={30}
 *     w={100}
 *     color="blue"
 * />
 * ```
 *
 * @example Custom styling with fill
 * ```blade
 * <x-mantine-sparkline
 *     :data="[3, 7, 5, 9, 4, 6]"
 *     :fill-opacity="0.6"
 *     :stroke-width="2"
 *     color="teal"
 * />
 * ```
 *
 * @example With trend colors
 * ```blade
 * <x-mantine-sparkline
 *     :data="[5, 4, 3, 2, 1]"
 *     :trend-colors="[
 *         'positive' => 'teal',
 *         'negative' => 'red'
 *     ]"
 * />
 * ```
 */
class Sparkline extends MantineComponent
{
    /**
     * Create a new Sparkline component instance.
     *
     * @param array|null $data Array of numbers to display on sparkline
     * @param int|null $w Width of sparkline
     * @param int|null $h Height of sparkline
     * @param string|null $curveType Type of curve - 'linear' or 'smooth'
     * @param string|null $color Line color from theme or any valid CSS color
     * @param float|null $fillOpacity Opacity of area fill (0-1)
     * @param int|null $strokeWidth Width of sparkline curve
     * @param array|null $trendColors Colors object for positive and negative trends
     * @param array|null $classNames Object of class names for subcomponents
     * @param array|null $styles Object of styles for subcomponents
     */
    public function __construct(
        public mixed $data = null,
        public mixed $w = null,
        public mixed $h = null,
        public mixed $curveType = null,
        public mixed $color = null,
        public mixed $fillOpacity = null,
        public mixed $strokeWidth = null,
        public mixed $trendColors = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'w' => $w,
            'h' => $h,
            'curveType' => $curveType,
            'color' => $color,
            'fillOpacity' => $fillOpacity,
            'strokeWidth' => $strokeWidth,
            'trendColors' => $trendColors,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
