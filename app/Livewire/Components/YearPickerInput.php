<?php

namespace MantineLivewire\Components;

/**
 * YearPickerInput component - An input field for selecting years with a dropdown calendar.
 *
 * The YearPickerInput combines an input field with a year picker dropdown, allowing users
 * to either type a year directly or select it from a calendar interface. It supports single
 * year selection, multiple years, or year ranges.
 *
 * @see https://mantine.dev/dates/year-picker-input/
 *
 * @example Basic usage with placeholder
 * ```blade
 * <x-mantine-year-picker-input
 *     label="Select year"
 *     placeholder="Pick a year"
 *     :clearable="true"
 * />
 * ```
 *
 * @example Range selection with custom format
 * ```blade
 * <x-mantine-year-picker-input
 *     type="range"
 *     label="Employment period"
 *     placeholder="Select years"
 *     :value-format="'YYYY'"
 *     :clearable="true"
 *     :with-asterisk="true"
 * />
 * ```
 *
 * @example With validation and custom sections
 * ```blade
 * <x-mantine-year-picker-input
 *     label="Year of graduation"
 *     :required="true"
 *     :error="$errors->first('graduation_year')"
 *     left-section="🎓"
 *     right-section="Required"
 *     size="md"
 *     radius="md"
 * />
 * ```
 *
 * @param mixed $value Current input value
 * @param mixed $defaultValue Default value for uncontrolled component
 * @param mixed $onChange Callback for value change
 * @param mixed $type Input type: 'default', 'range', or 'multiple'
 * @param mixed $dropdownType Dropdown type: 'modal' or 'popover'
 * @param mixed $valueFormat Format for displaying the date value
 * @param mixed $valueFormatter Custom function to format value
 * @param mixed $clearable Whether the input can be cleared
 * @param mixed $disabled Whether the input is disabled
 * @param mixed $size Input size
 * @param mixed $label Input label
 * @param mixed $description Help text below input
 * @param mixed $error Error message or boolean indicating error state
 * @param mixed $variant Input variant
 * @param mixed $withAsterisk Show red asterisk after label
 * @param mixed $radius Border radius
 * @param mixed $placeholder Input placeholder
 * @param mixed $required Whether the input is required
 * @param mixed $readOnly Whether the input is read-only
 * @param mixed $name Input name attribute
 * @param mixed $form Form element the input belongs to
 * @param mixed $id Input id attribute
 * @param mixed $leftSection Content rendered on the left side of the input
 * @param mixed $leftSectionPointerEvents Left section pointer events
 * @param mixed $rightSection Content rendered on the right side of the input
 * @param mixed $rightSectionPointerEvents Right section pointer events
 * @param mixed $ref Input ref
 * @param mixed $classNames Custom class names for input elements
 * @param mixed $styles Custom styles for input elements
 */
class YearPickerInput extends MantineComponent
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
