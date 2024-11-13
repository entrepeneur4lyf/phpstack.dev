<?php

namespace App\Livewire\Components\Radio;

use App\Livewire\Components\MantineComponent;

class Card extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $radius = null,
        public ?bool $checked = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $name = null,
        public ?string $ariaLabel = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'radius' => $radius,
            'checked' => $checked,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'name' => $name,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
