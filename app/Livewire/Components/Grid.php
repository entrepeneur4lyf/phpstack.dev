<?php

namespace App\Livewire\Components;

class Grid extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $gutter = null,
        public ?int $columns = null,
        public ?bool $grow = null,
        public ?string $justify = null,
        public ?string $align = null,
    ) {
        parent::__construct();

        $this->props = [
            'gutter' => $gutter,
            'columns' => $columns,
            'grow' => $grow,
            'justify' => $justify,
            'align' => $align,
        ];
    }
}
