<?php

namespace App\Livewire\Components;

class FileInput extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public ?bool $multiple = null,
        public ?string $accept = null,
        public ?bool $clearable = null,
        public mixed $valueComponent = null,
        public ?bool $disabled = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public ?string $leftSectionWidth = null,
        public ?string $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'placeholder' => $placeholder,
            'multiple' => $multiple,
            'accept' => $accept,
            'clearable' => $clearable,
            'valueComponent' => $valueComponent,
            'disabled' => $disabled,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'value' => $value,
            'defaultValue' => $defaultValue,
        ];
    }
}
