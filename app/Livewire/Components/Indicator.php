<?php

namespace App\Livewire\Components;

/**
 * Indicator Component
 *
 * The Indicator component is used to display a small badge or indicator that can be positioned
 * relative to another element. It can be used for notifications, status indicators, or any
 * other purpose where a visual cue is needed.
 *
 * @link https://mantine.dev/core/indicator/
 *
 * @property mixed $position Position of the indicator ('top', 'right', 'bottom', 'left')
 * @property mixed $offset Offset from the target element
 * @property mixed $size Size of the indicator
 * @property mixed $radius Border radius of the indicator
 * @property mixed $color Color of the indicator
 * @property mixed $disabled Disable the indicator
 * @property mixed $processing Show processing state
 * @property mixed $withBorder Show border around the indicator
 * @property mixed $inline Display inline
 * @property mixed $label Label for the indicator
 * @property mixed $zIndex Z-index of the indicator
 * @property mixed $classNames Custom class names for the indicator
 * @property mixed $styles Custom styles for the indicator
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-indicator position="top" color="red" />
 * ```
 *
 * @example With Label
 * ```blade
 * <x-mantine-indicator position="top" label="New" />
 * ```
 *
 * @example With Custom Size and Color
 * ```blade
 * <x-mantine-indicator size="small" color="green" />
 * ```
 */
class Indicator extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $position Position of the indicator
     * @param mixed $offset Offset from target
     * @param mixed $size Size of the indicator
     * @param mixed $radius Border radius
     * @param mixed $color Color of the indicator
     * @param mixed $disabled Disabled state
     * @param mixed $processing Processing state
     * @param mixed $withBorder Show border
     * @param mixed $inline Display inline
     * @param mixed $label Label for the indicator
     * @param mixed $zIndex Z-index
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $position = null,
        public mixed $offset = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $color = null,
        public mixed $disabled = null,
        public mixed $processing = null,
        public mixed $withBorder = null,
        public mixed $inline = null,
        public mixed $label = null,
        public mixed $zIndex = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'position' => $position,
            'offset' => $offset,
            'size' => $size,
            'radius' => $radius,
            'color' => $color,
            'disabled' => $disabled,
            'processing' => $processing,
            'withBorder' => $withBorder,
            'inline' => $inline,
            'label' => $label,
            'zIndex' => $zIndex,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
