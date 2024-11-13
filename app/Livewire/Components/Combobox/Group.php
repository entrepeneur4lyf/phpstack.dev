<?php

namespace MantineLivewire\Components\Combobox;

use MantineLivewire\Components\MantineComponent;

class Group extends MantineComponent
{
    public function __construct(
        public ?string $label = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
        ];
    }
}
