<?php

namespace App\Livewire\Components;

/**
 * MonthPickerInput component for selecting months with an input field interface.
 *
 * The MonthPickerInput component combines an input field with a month picker dropdown,
 * allowing users to either type dates or select them from a calendar interface.
 *
 * @see https://mantine.dev/dates/month-picker-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-month-picker-input
 *     label="Select month"
 *     placeholder="Pick a month"
 *     :value="$selectedMonth"
 * />
 * ```
 *
 * @example With custom format and clearable
 * ```blade
 * <x-mantine-month-picker-input
 *     :value-format="'MM/YYYY'"
 *     :clearable="true"
 *     label="Custom format"
 *     :size="'lg'"
 * />
 * ```
 *
 * @example With sections and validation
 * ```blade
 * <x-mantine-month-picker-input
 *     :with-asterisk="true"
 *     :required="true"
 *     label="Required field"
 *     :left-section="'📅'"
 *     :error="$errors->first('month')"
 * />
 * ```
 */
class MonthPickerInput extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $type = null,
        public mixed $dropdownType = null,
        public mixed $valueFormat = null,
        public mixed $valueFormatter = null,
        public mixed $clearable = null,
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
        public mixed $leftSection = null,
        public mixed $leftSectionPointerEvents = null,
        public mixed $rightSection = null,
        public mixed $rightSectionPointerEvents = null,
        public mixed $ref = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'type' => $type,
            'dropdownType' => $dropdownType,
            'valueFormat' => $valueFormat,
            'valueFormatter' => $valueFormatter,
            'clearable' => $clearable,
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
            'leftSection' => $leftSection,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSection' => $rightSection,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'ref' => $ref,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
