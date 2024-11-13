<?php

namespace MantineLivewire\Components\Combobox;

use MantineLivewire\Components\MantineComponent;

class Options extends MantineComponent
{
    public function __construct(
        public mixed $mah = null,
        public mixed $style = null,
    ) {
        parent::__construct();

        $this->props = [
            'mah' => $mah,
            'style' => $style,
        ];
    }
}
