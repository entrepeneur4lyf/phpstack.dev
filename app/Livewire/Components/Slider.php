<?php

namespace MantineLivewire\Components;

/**
 * Slider Component
 *
 * The Slider component is used to create a slider input that allows users to select a value
 * from a range. It supports various customization options such as color, size, and marks.
 *
 * @link https://mantine.dev/core/slider/
 *
 * @property mixed $value Current value of the slider
 * @property mixed $defaultValue Default value of the slider
 * @property ?string $color Color of the slider
 * @property ?string $size Size of the slider
 * @property ?string $radius Border radius of the slider
 * @property mixed $marks Marks to display on the slider
 * @property mixed $label Label for the slider
 * @property ?bool $labelAlwaysOn Determines if the label is always visible
 * @property mixed $labelTransitionProps Props for the label transition
 * @property mixed $min Minimum value of the slider
 * @property mixed $max Maximum value of the slider
 * @property mixed $step Step value for the slider
 * @property mixed $minRange Minimum range for the slider
 * @property mixed $thumbSize Size of the slider thumb
 * @property mixed $thumbChildren Children for the slider thumb
 * @property mixed $scale Function to scale the slider value
 * @property ?bool $inverted Determines if the slider is inverted
 * @property ?bool $disabled Determines if the slider is disabled
 * @property ?string $thumbLabel Label for the slider thumb
 * @property mixed $onChangeEnd Callback for when the value changes
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-slider value="50" min="0" max="100" />
 * ```
 */
class Slider extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current value of the slider
     * @param mixed $defaultValue Default value of the slider
     * @param ?string $color Color of the slider
     * @param ?string $size Size of the slider
     * @param ?string $radius Border radius of the slider
     * @param mixed $marks Marks to display on the slider
     * @param mixed $label Label for the slider
     * @param ?bool $labelAlwaysOn Determines if the label is always visible
     * @param mixed $labelTransitionProps Props for the label transition
     * @param mixed $min Minimum value of the slider
     * @param mixed $max Maximum value of the slider
     * @param mixed $step Step value for the slider
     * @param mixed $minRange Minimum range for the slider
     * @param mixed $thumbSize Size of the slider thumb
     * @param mixed $thumbChildren Children for the slider thumb
     * @param mixed $scale Function to scale the slider value
     * @param ?bool $inverted Determines if the slider is inverted
     * @param ?bool $disabled Determines if the slider is disabled
     * @param ?string $thumbLabel Label for the slider thumb
     * @param mixed $onChangeEnd Callback for when the value changes
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $color = null,
        public ?string $size = null,
        public ?string $radius = null,
        public mixed $marks = null,
        public mixed $label = null,
        public ?bool $labelAlwaysOn = null,
        public mixed $labelTransitionProps = null,
        public mixed $min = null,
        public mixed $max = null,
        public mixed $step = null,
        public mixed $minRange = null,
        public mixed $thumbSize = null,
        public mixed $thumbChildren = null,
        public mixed $scale = null,
        public ?bool $inverted = null,
        public ?bool $disabled = null,
        public ?string $thumbLabel = null,
        public mixed $onChangeEnd = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'color' => $color,
            'size' => $size,
            'radius' => $radius,
            'marks' => $marks,
            'label' => $label,
            'labelAlwaysOn' => $labelAlwaysOn,
            'labelTransitionProps' => $labelTransitionProps,
            'min' => $min,
            'max' => $max,
            'step' => $step,
            'minRange' => $minRange,
            'thumbSize' => $thumbSize,
            'thumbChildren' => $thumbChildren,
            'scale' => $scale,
            'inverted' => $inverted,
            'disabled' => $disabled,
            'thumbLabel' => $thumbLabel,
            'onChangeEnd' => $onChangeEnd,
        ];
    }
}
