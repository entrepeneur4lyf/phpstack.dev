<?php

namespace App\Livewire\Components\Chip;

use App\Livewire\Components\MantineComponent;

class Group extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $multiple = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
    ) {
        parent::__construct();

        $this->props = [
            'multiple' => $multiple,
            'value' => $value,
            'defaultValue' => $defaultValue,
        ];
    }
}
