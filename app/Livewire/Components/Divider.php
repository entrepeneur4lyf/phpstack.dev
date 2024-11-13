<?php

namespace App\Livewire\Components;

/**
 * Divider Component
 *
 * The Divider component is used to separate content within a layout. It can be styled and positioned
 * according to the design requirements.
 *
 * @link https://mantine.dev/core/divider/
 *
 * @property mixed $variant Visual variant ('solid', 'dashed', 'dotted', etc.)
 * @property mixed $size Size of the divider
 * @property mixed $label Text label displayed on the divider
 * @property mixed $labelPosition Position of the label ('left', 'center', 'right')
 * @property mixed $orientation Orientation of the divider ('horizontal', 'vertical')
 * @property mixed $my Margin on the y-axis
 * @property mixed $classNames Custom class names for the divider
 * @property mixed $styles Custom styles for the divider
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-divider />
 * ```
 *
 * @example With Label
 * ```blade
 * <x-mantine-divider label="Section Title" />
 * ```
 *
 * @example Vertical Divider
 * ```blade
 * <x-mantine-divider orientation="vertical" />
 * ```
 */
class Divider extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $variant Visual style variant
     * @param mixed $size Size of the divider
     * @param mixed $label Text label
     * @param mixed $labelPosition Position of the label
     * @param mixed $orientation Orientation of the divider
     * @param mixed $my Margin on the y-axis
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $variant = null,
        public mixed $size = null,
        public mixed $label = null,
        public mixed $labelPosition = null,
        public mixed $orientation = null,
        public mixed $my = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'variant' => $variant,
            'size' => $size,
            'label' => $label,
            'labelPosition' => $labelPosition,
            'orientation' => $orientation,
            'my' => $my,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
