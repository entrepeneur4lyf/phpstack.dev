<?php

namespace App\Livewire\Components\Combobox;

use App\Livewire\Components\MantineComponent;

class Option extends MantineComponent
{
    public function __construct(
        public mixed $value = null,
        public ?bool $active = null,
        public ?bool $disabled = null,
        public mixed $onClick = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'active' => $active,
            'disabled' => $disabled,
            'onClick' => $onClick,
        ];
    }
}
