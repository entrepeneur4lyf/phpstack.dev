<?php

namespace App\Livewire\Components\Input;

use App\Livewire\Components\MantineComponent;

class Wrapper extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?bool $required = null,
        public ?bool $withAsterisk = null,
        public ?string $labelElement = 'label',
        public ?string $size = null,
        public mixed $inputWrapperOrder = null,
        public mixed $inputContainer = null,
        public ?bool $withErrorStyles = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'required' => $required,
            'withAsterisk' => $withAsterisk,
            'labelElement' => $labelElement,
            'size' => $size,
            'inputWrapperOrder' => $inputWrapperOrder,
            'inputContainer' => $inputContainer,
            'withErrorStyles' => $withErrorStyles,
        ];
    }
}
