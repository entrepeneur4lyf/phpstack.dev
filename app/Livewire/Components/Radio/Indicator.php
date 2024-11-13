<?php

namespace MantineLivewire\Components\Radio;

use MantineLivewire\Components\MantineComponent;

class Indicator extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?bool $checked = null,
        public ?bool $disabled = null,
        public ?string $size = null,
        public ?string $color = null,
        public ?string $variant = null,
        public mixed $icon = null,
        public ?string $iconColor = null,
    ) {
        parent::__construct();

        $this->props = [
            'checked' => $checked,
            'disabled' => $disabled,
            'size' => $size,
            'color' => $color,
            'variant' => $variant,
            'icon' => $icon,
            'iconColor' => $iconColor,
        ];
    }
}
