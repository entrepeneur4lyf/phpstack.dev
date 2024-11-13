<?php

namespace App\Livewire\Components\Progress;

use App\Livewire\Components\MantineComponent;

class Root extends MantineComponent
{
    public function __construct(
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $transitionDuration = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'radius' => $radius,
            'transitionDuration' => $transitionDuration,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

class Section extends MantineComponent
{
    public function __construct(
        public mixed $value = null,
        public mixed $color = null,
        public mixed $striped = null,
        public mixed $animated = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'color' => $color,
            'striped' => $striped,
            'animated' => $animated,
            'aria-label' => $ariaLabel,
        ];
    }
}

class Label extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
