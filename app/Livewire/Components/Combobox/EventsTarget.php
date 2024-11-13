<?php

namespace MantineLivewire\Components\Combobox;

use MantineLivewire\Components\MantineComponent;

class EventsTarget extends MantineComponent
{
    public function __construct(
        public ?bool $withAriaAttributes = null,
        public mixed $refProp = null,
    ) {
        parent::__construct();

        $this->props = [
            'withAriaAttributes' => $withAriaAttributes,
            'refProp' => $refProp,
        ];
    }
}
