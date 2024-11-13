<?php

namespace MantineLivewire\Components\Combobox;

use MantineLivewire\Components\MantineComponent;

class Search extends MantineComponent
{
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $placeholder = null,
        public ?bool $disabled = null,
        public mixed $onChange = null,
        public mixed $onKeyDown = null,
        public mixed $onFocus = null,
        public mixed $onBlur = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'placeholder' => $placeholder,
            'disabled' => $disabled,
            'onChange' => $onChange,
            'onKeyDown' => $onKeyDown,
            'onFocus' => $onFocus,
            'onBlur' => $onBlur,
        ];
    }
}
