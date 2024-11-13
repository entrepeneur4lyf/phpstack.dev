<?php

namespace MantineLivewire\Components\Combobox;

use MantineLivewire\Components\MantineComponent;

class Dropdown extends MantineComponent
{
    public function __construct(
        public ?bool $hidden = null,
        public mixed $middlewares = null,
        public mixed $transitionProps = null,
        public mixed $shadow = null,
        public mixed $width = null,
        public ?bool $withArrow = null,
        public mixed $dropdownPadding = null,
        public ?bool $withinPortal = null,
        public mixed $zIndex = null,
    ) {
        parent::__construct();

        $this->props = [
            'hidden' => $hidden,
            'middlewares' => $middlewares,
            'transitionProps' => $transitionProps,
            'shadow' => $shadow,
            'width' => $width,
            'withArrow' => $withArrow,
            'dropdownPadding' => $dropdownPadding,
            'withinPortal' => $withinPortal,
            'zIndex' => $zIndex,
        ];
    }
}
