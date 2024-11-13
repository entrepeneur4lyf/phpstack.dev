<?php

namespace App\Livewire\Components;

class ColorSwatch extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $color = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $withShadow = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'size' => $size,
            'radius' => $radius,
            'withShadow' => $withShadow,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
