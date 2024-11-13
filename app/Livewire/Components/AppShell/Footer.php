<?php

namespace App\Livewire\Components\AppShell;

use App\Livewire\Components\MantineComponent;

class Footer extends MantineComponent
{
    public function __construct(
        public ?bool $withBorder = null,
        public ?int $zIndex = null,
        public ?int $height = null,
    ) {
        parent::__construct();

        $this->props = [
            'withBorder' => $withBorder ?? config('mantine.defaults.appshell.footer.withBorder', true),
            'zIndex' => $zIndex ?? config('mantine.defaults.appshell.footer.zIndex', 200),
            'height' => $height ?? config('mantine.defaults.appshell.footer.height', 60),
        ];
    }
}
