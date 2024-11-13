<?php

namespace App\Livewire\Components;

class Combobox extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $store = null,
        public mixed $onOptionSubmit = null,
        public ?bool $resetSelectionOnOptionHover = null,
        public ?string $position = null,
        public mixed $middlewares = null,
        public mixed $width = null,
        public ?bool $withArrow = null,
        public mixed $shadow = null,
        public mixed $transitionProps = null,
        public mixed $dropdownPadding = null,
        public ?bool $withinPortal = null,
        public ?bool $hidden = null,
        public mixed $zIndex = null,
        public mixed $eventSource = null,
        public mixed $loop = null,
        public mixed $scrollBehavior = null,
    ) {
        parent::__construct();

        $this->props = [
            'store' => $store,
            'onOptionSubmit' => $onOptionSubmit,
            'resetSelectionOnOptionHover' => $resetSelectionOnOptionHover,
            'position' => $position,
            'middlewares' => $middlewares,
            'width' => $width,
            'withArrow' => $withArrow,
            'shadow' => $shadow,
            'transitionProps' => $transitionProps,
            'dropdownPadding' => $dropdownPadding,
            'withinPortal' => $withinPortal,
            'hidden' => $hidden,
            'zIndex' => $zIndex,
            'eventSource' => $eventSource,
            'loop' => $loop,
            'scrollBehavior' => $scrollBehavior,
        ];
    }
}
