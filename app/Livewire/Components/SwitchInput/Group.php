<?php

namespace MantineLivewire\Components\SwitchInput;

use MantineLivewire\Components\MantineComponent;

class Group extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?bool $withAsterisk = null,
        public ?string $size = null,
        public ?string $color = null,
        public ?string $radius = null,
        public ?string $labelPosition = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'withAsterisk' => $withAsterisk,
            'size' => $size,
            'color' => $color,
            'radius' => $radius,
            'labelPosition' => $labelPosition,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
