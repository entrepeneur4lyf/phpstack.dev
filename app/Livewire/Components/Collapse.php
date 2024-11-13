<?php

namespace MantineLivewire\Components;

class Collapse extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $in = null,
        public mixed $transitionDuration = null,
        public mixed $transitionTimingFunction = null,
        public mixed $onTransitionEnd = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'in' => $in,
            'transitionDuration' => $transitionDuration,
            'transitionTimingFunction' => $transitionTimingFunction,
            'onTransitionEnd' => $onTransitionEnd,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
