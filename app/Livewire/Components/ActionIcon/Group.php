<?php

namespace App\Livewire\Components\ActionIcon;

use App\Livewire\Components\MantineComponent;

class Group extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $orientation = null,
        public mixed $borderWidth = null,
    ) {
        parent::__construct();

        $this->props = [
            'orientation' => $orientation,
            'borderWidth' => $borderWidth,
        ];
    }
}
