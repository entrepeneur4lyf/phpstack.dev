<?php

namespace MantineLivewire\Components;

/**
 * SemiCircleProgress component for displaying progress in a semi-circular shape.
 *
 * The SemiCircleProgress component provides a visual representation of progress
 * using a semi-circular shape. It's useful for displaying percentages, completion
 * status, or any other numerical progress indicators in a visually appealing way.
 *
 * @see https://mantine.dev/core/semi-circle-progress/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-semi-circle-progress
 *     :value="75"
 *     :size="200"
 *     :thickness="12"
 * />
 * ```
 *
 * @example With custom colors and label
 * ```blade
 * <x-mantine-semi-circle-progress
 *     :value="60"
 *     label="60%"
 *     size="xl"
 *     filled-segment-color="blue"
 *     empty-segment-color="gray.2"
 * />
 * ```
 *
 * @example Custom orientation and fill direction
 * ```blade
 * <x-mantine-semi-circle-progress
 *     :value="80"
 *     orientation="vertical"
 *     fill-direction="rtl"
 *     label-position="outside"
 *     :transition-duration="1000"
 * />
 * ```
 */
class SemiCircleProgress extends MantineComponent
{
    /**
     * Create a new SemiCircleProgress component instance.
     *
     * @param mixed $value Progress value (0-100)
     * @param mixed $size Size of the component in pixels or predefined size
     * @param mixed $thickness Thickness of the progress circle in pixels
     * @param mixed $label Text or component to render inside the progress circle
     * @param mixed $labelPosition Position of the label: 'inside' or 'outside'
     * @param mixed $fillDirection Direction of fill: 'ltr' or 'rtl'
     * @param mixed $orientation Component orientation: 'horizontal' or 'vertical'
     * @param mixed $filledSegmentColor Color of the filled segment
     * @param mixed $emptySegmentColor Color of the empty segment
     * @param mixed $transitionDuration Duration of progress animation in ms
     * @param mixed $classNames Custom class names for subcomponents
     * @param mixed $styles Custom styles for subcomponents
     */
    public function __construct(
        public mixed $value = null,
        public mixed $size = null,
        public mixed $thickness = null,
        public mixed $label = null,
        public mixed $labelPosition = null,
        public mixed $fillDirection = null,
        public mixed $orientation = null,
        public mixed $filledSegmentColor = null,
        public mixed $emptySegmentColor = null,
        public mixed $transitionDuration = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'size' => $size,
            'thickness' => $thickness,
            'label' => $label,
            'labelPosition' => $labelPosition,
            'fillDirection' => $fillDirection,
            'orientation' => $orientation,
            'filledSegmentColor' => $filledSegmentColor,
            'emptySegmentColor' => $emptySegmentColor,
            'transitionDuration' => $transitionDuration,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
