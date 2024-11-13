<?php

namespace MantineLivewire\Components\Radio;

use MantineLivewire\Components\MantineComponent;

class Group extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?bool $withAsterisk = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $size = null,
        public ?string $color = null,
        public ?string $variant = null,
        public ?string $labelPosition = null,
        public ?string $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'name' => $name,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'withAsterisk' => $withAsterisk,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'size' => $size,
            'color' => $color,
            'variant' => $variant,
            'labelPosition' => $labelPosition,
            'aria-label' => $ariaLabel,
        ];
    }
}
