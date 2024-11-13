<?php

namespace App\Livewire\Components\Combobox;

use App\Livewire\Components\MantineComponent;

class EmptyOption extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
