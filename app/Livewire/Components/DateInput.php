<?php

namespace App\Livewire\Components;

/**
 * DateInput Component
 *
 * The DateInput component provides a date selection interface. It supports various date formats,
 * validation, and can be used in forms and custom interfaces.
 *
 * @link https://mantine.dev/core/date-input/
 *
 * @property mixed $value Current date value
 * @property mixed $defaultValue Default date value for uncontrolled state
 * @property mixed $onChange Function called when date changes
 * @property mixed $valueFormat Format of the date value
 * @property mixed $dateParser Function to parse date input
 * @property mixed $clearable Allow clearing the input
 * @property mixed $minDate Minimum selectable date
 * @property mixed $maxDate Maximum selectable date
 * @property mixed $disabled Disable input
 * @property mixed $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $label Input label
 * @property mixed $description Additional text below input
 * @property mixed $error Error message or boolean indicating error state
 * @property mixed $variant Visual variant ('default', 'filled', 'unstyled')
 * @property mixed $withAsterisk Show required asterisk
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $placeholder Input placeholder
 * @property mixed $required Mark input as required
 * @property mixed $readOnly Make input read-only
 * @property mixed $name Input name
 * @property mixed $form Form id if input is outside of form element
 * @property mixed $id Input id
 * @property mixed $ref Reference to the input element
 * @property mixed $classNames Custom class names for input elements
 * @property mixed $styles Custom styles for input elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-date-input
 *     label="Select a date"
 *     placeholder="Pick a date"
 * />
 * ```
 *
 * @example With Min and Max Dates
 * ```blade
 * <x-mantine-date-input
 *     label="Select a date"
 *     min-date="2023-01-01"
 *     max-date="2023-12-31"
 * />
 * ```
 *
 * @example With Error State
 * ```blade
 * <x-mantine-date-input
 *     label="Select a date"
 *     error="Invalid date selected"
 * />
 * ```
 */
class DateInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param mixed $onChange Change handler
     * @param mixed $valueFormat Date format
     * @param mixed $dateParser Date parser function
     * @param mixed $clearable Clearable state
     * @param mixed $minDate Minimum date
     * @param mixed $maxDate Maximum date
     * @param mixed $disabled Disabled state
     * @param mixed $size Input size
     * @param mixed $label Input label
     * @param mixed $description Help text
     * @param mixed $error Error state/message
     * @param mixed $variant Visual style
     * @param mixed $withAsterisk Required marker
     * @param mixed $radius Border radius
     * @param mixed $placeholder Placeholder text
     * @param mixed $required Required state
     * @param mixed $readOnly Read-only state
     * @param mixed $name Input name
     * @param mixed $form Form id
     * @param mixed $id Input id
     * @param mixed $ref Reference
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $valueFormat = null,
        public mixed $dateParser = null,
        public mixed $clearable = null,
        public mixed $minDate = null,
        public mixed $maxDate = null,
        public mixed $disabled = null,
        public mixed $size = null,
        public mixed $label = null,
        public mixed $description = null,
        public mixed $error = null,
        public mixed $variant = null,
        public mixed $withAsterisk = null,
        public mixed $radius = null,
        public mixed $placeholder = null,
        public mixed $required = null,
        public mixed $readOnly = null,
        public mixed $name = null,
        public mixed $form = null,
        public mixed $id = null,
        public mixed $ref = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'valueFormat' => $valueFormat,
            'dateParser' => $dateParser,
            'clearable' => $clearable,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'disabled' => $disabled,
            'size' => $size,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'variant' => $variant,
            'withAsterisk' => $withAsterisk,
            'radius' => $radius,
            'placeholder' => $placeholder,
            'required' => $required,
            'readOnly' => $readOnly,
            'name' => $name,
            'form' => $form,
            'id' => $id,
            'ref' => $ref,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
