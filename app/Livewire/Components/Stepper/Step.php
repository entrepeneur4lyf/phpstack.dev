<?php

namespace MantineLivewire\Components\Stepper;

use MantineLivewire\Components\MantineComponent;

class Step extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $label = null,
        public mixed $description = null,
        public mixed $icon = null,
        public mixed $completedIcon = null,
        public mixed $loading = null,
        public mixed $allowStepSelect = null,
        public mixed $allowStepClick = null,
        public mixed $color = null,
        public mixed $iconSize = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'icon' => $icon,
            'completedIcon' => $completedIcon,
            'loading' => $loading,
            'allowStepSelect' => $allowStepSelect,
            'allowStepClick' => $allowStepClick,
            'color' => $color,
            'iconSize' => $iconSize,
            'aria-label' => $ariaLabel,
        ];
    }
}

class Completed extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
