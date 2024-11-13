<?php

namespace App\Livewire\Components;

class InlineCodeHighlight extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $code = null,
        public mixed $language = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'code' => $code,
            'language' => $language,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
