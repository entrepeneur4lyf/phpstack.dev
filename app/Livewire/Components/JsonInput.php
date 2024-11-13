<?php

namespace App\Livewire\Components;

/**
 * JsonInput Component
 *
 * The JsonInput component is used to create an input field for JSON data. It provides
 * validation and formatting options to ensure the input is valid JSON.
 *
 * @link https://mantine.dev/core/json-input/
 *
 * @property string|null $label Input label
 * @property string|null $description Additional text below input
 * @property string|null $error Error message or boolean indicating error state
 * @property string|null $placeholder Input placeholder
 * @property string|null $validationError Validation error message
 * @property bool|null $formatOnBlur Format the input value on blur
 * @property bool|null $autosize Automatically adjust height
 * @property int|null $minRows Minimum number of rows for autosize
 * @property string|null $variant Visual variant ('default', 'filled', 'unstyled')
 * @property string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property string|null $radius Border radius from theme.radius or number for value in px
 * @property bool|null $disabled Disable the input
 * @property mixed $value Current value
 * @property mixed $defaultValue Default value for uncontrolled state
 * @property bool|null $required Mark input as required
 * @property bool|null $withAsterisk Show required asterisk
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-json-input
 *     label="Enter JSON"
 *     placeholder="{}"
 * />
 * ```
 *
 * @example With Error State
 * ```blade
 * <x-mantine-json-input
 *     label="Enter JSON"
 *     error="Invalid JSON format"
 * />
 * ```
 *
 * @example With Autosize
 * ```blade
 * <x-mantine-json-input
 *     label="Enter JSON"
 *     :autosize="true"
 *     min-rows="3"
 * />
 * ```
 */
class JsonInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $label Input label
     * @param string|null $description Additional text
     * @param string|null $error Error message
     * @param string|null $placeholder Placeholder text
     * @param string|null $validationError Validation error message
     * @param bool|null $formatOnBlur Format on blur
     * @param bool|null $autosize Autosize state
     * @param int|null $minRows Minimum rows for autosize
     * @param string|null $variant Visual style
     * @param string|null $size Input size
     * @param string|null $radius Border radius
     * @param bool|null $disabled Disabled state
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param bool|null $required Required state
     * @param bool|null $withAsterisk Required marker
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public ?string $validationError = null,
        public ?bool $formatOnBlur = null,
        public ?bool $autosize = null,
        public ?int $minRows = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?bool $required = null,
        public ?bool $withAsterisk = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'placeholder' => $placeholder,
            'validationError' => $validationError,
            'formatOnBlur' => $formatOnBlur,
            'autosize' => $autosize,
            'minRows' => $minRows,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'required' => $required,
            'withAsterisk' => $withAsterisk,
        ];
    }
}
