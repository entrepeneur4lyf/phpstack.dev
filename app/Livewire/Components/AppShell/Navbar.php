<?php

namespace MantineLivewire\Components\AppShell;

use MantineLivewire\Components\MantineComponent;

class Navbar extends MantineComponent
{
    public function __construct(
        public ?bool $withBorder = null,
        public ?int $zIndex = null,
        public ?int $width = null,
        public ?string $breakpoint = null,
    ) {
        parent::__construct();

        $this->props = [
            'withBorder' => $withBorder ?? config('mantine.defaults.appshell.navbar.withBorder', true),
            'zIndex' => $zIndex ?? config('mantine.defaults.appshell.navbar.zIndex', 200),
            'width' => $width ?? config('mantine.defaults.appshell.navbar.width', 300),
            'breakpoint' => $breakpoint ?? config('mantine.defaults.appshell.navbar.breakpoint', 'sm'),
        ];
    }
}
