<?php

namespace MantineLivewire\Components;

class FocusTrap extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $active = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'active' => $active,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

class FocusTrapInitialFocus extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
