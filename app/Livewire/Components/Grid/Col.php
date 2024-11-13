<?php

namespace MantineLivewire\Components\Grid;

use MantineLivewire\Components\MantineComponent;

class Col extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int|string|null $span = null,
        public int|string|null $xs = null,
        public int|string|null $sm = null,
        public int|string|null $md = null,
        public int|string|null $lg = null,
        public int|string|null $xl = null,
        public ?int $offset = null,
        public ?string $order = null,
        public ?bool $grow = null,
    ) {
        parent::__construct();

        $this->props = [
            'span' => $span,
            'xs' => $xs,
            'sm' => $sm,
            'md' => $md,
            'lg' => $lg,
            'xl' => $xl,
            'offset' => $offset,
            'order' => $order,
            'grow' => $grow,
        ];
    }
}
