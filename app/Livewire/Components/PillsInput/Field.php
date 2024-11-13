<?php

namespace MantineLivewire\Components\PillsInput;

use MantineLivewire\Components\MantineComponent;

class Field extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $placeholder = null,
        public mixed $onChange = null,
        public mixed $onKeyDown = null,
        public mixed $onFocus = null,
        public mixed $onBlur = null,
        public ?string $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'placeholder' => $placeholder,
            'onChange' => $onChange,
            'onKeyDown' => $onKeyDown,
            'onFocus' => $onFocus,
            'onBlur' => $onBlur,
            'aria-label' => $ariaLabel,
        ];
    }
}
