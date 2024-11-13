<?php

namespace App\Livewire\Components\Tabs;

use App\Livewire\Components\MantineComponent;

class TabsList extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $grow = null,
        public mixed $justify = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'grow' => $grow,
            'justify' => $justify,
            'aria-label' => $ariaLabel,
        ];
    }
}

class Tab extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $color = null,
        public mixed $disabled = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'color' => $color,
            'disabled' => $disabled,
            'aria-label' => $ariaLabel,
        ];
    }
}

class Panel extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
        ];
    }
}
