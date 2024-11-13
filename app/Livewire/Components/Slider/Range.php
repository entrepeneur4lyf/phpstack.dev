<?php

namespace MantineLivewire\Components\Slider;

use MantineLivewire\Components\MantineComponent;

class Range extends MantineComponent
{
    /**
     * Create a new component instance.
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
        public ?string $thumbFromLabel = null,
        public ?string $thumbToLabel = null,
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
            'thumbFromLabel' => $thumbFromLabel,
            'thumbToLabel' => $thumbToLabel,
            'onChangeEnd' => $onChangeEnd,
        ];
    }
}
