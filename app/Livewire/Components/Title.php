<?php

namespace MantineLivewire\Components;

/**
 * Title component for displaying headings with customizable styles.
 *
 * The Title component creates semantic heading elements (h1-h6) with consistent styling
 * and various customization options. It supports different sizes, text wrapping behaviors,
 * and line clamping for flexible heading layouts.
 *
 * @see https://mantine.dev/core/title/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-title :order="1">
 *     Main Heading
 * </x-mantine-title>
 * ```
 *
 * @example Custom size and styling
 * ```blade
 * <x-mantine-title
 *     :order="2"
 *     size="h1"
 *     :textWrap="false"
 * >
 *     Custom Sized Heading
 * </x-mantine-title>
 * ```
 *
 * @example With line clamp
 * ```blade
 * <x-mantine-title
 *     :order="3"
 *     :lineClamp="2"
 * >
 *     This long heading will be clamped to two lines with ellipsis if it exceeds the space
 * </x-mantine-title>
 * ```
 */
class Title extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $order Heading order, number from 1 to 6 for h1-h6 elements
     * @param mixed $size Predefined size or number for heading size
     * @param mixed $textWrap Sets text-wrap CSS property
     * @param mixed $lineClamp Maximum number of lines to display before truncating
     * @param mixed $classNames Custom class names for title elements
     * @param mixed $styles Custom styles for title elements
     */
    public function __construct(
        public mixed $order = null,
        public mixed $size = null,
        public mixed $textWrap = null,
        public mixed $lineClamp = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'order' => $order,
            'size' => $size,
            'textWrap' => $textWrap,
            'lineClamp' => $lineClamp,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
