<?php

namespace App\Livewire\Components\Combobox;

use App\Livewire\Components\MantineComponent;

class DropdownTarget extends MantineComponent
{
    public function __construct(
        public mixed $refProp = null,
    ) {
        parent::__construct();

        $this->props = [
            'refProp' => $refProp,
        ];
    }
}
