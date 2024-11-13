<?php

namespace App\Livewire\Components\AppShell;

use App\Livewire\Components\MantineComponent;

class Main extends MantineComponent
{
    public function __construct(
        public ?string $pt = null,
        public ?string $pb = null,
        public ?string $pl = null,
        public ?string $pr = null,
    ) {
        parent::__construct();

        $this->props = [
            'pt' => $pt,
            'pb' => $pb,
            'pl' => $pl,
            'pr' => $pr,
        ];
    }
}
