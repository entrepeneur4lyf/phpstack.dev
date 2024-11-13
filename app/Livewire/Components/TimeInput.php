<?php

namespace MantineLivewire\Components;

/**
 * TimeInput component for time selection and input.
 *
 * The TimeInput component provides a specialized input field for time selection,
 * supporting both 12-hour and 24-hour formats, with optional seconds display.
 * It includes various customization options for styling and validation.
 *
 * @see https://mantine.dev/core/time-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-time-input
 *     label="Select time"
 *     placeholder="Pick time"
 *     :withAsterisk="true"
 * />
 * ```
 *
 * @example With seconds and validation
 * ```blade
 * <x-mantine-time-input
 *     label="Appointment time"
 *     description="Select your preferred time"
 *     :withSeconds="true"
 *     error="Please select a valid time"
 *     size="md"
 * />
 * ```
 *
 * @example Custom styling with sections
 * ```blade
 * <x-mantine-time-input
 *     label="Meeting time"
 *     variant="filled"
 *     radius="md"
 *     leftSection="🕒"
 *     :readOnly="false"
 *     :required="true"
 * />
 * ```
 */
class TimeInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default value for uncontrolled input
     * @param mixed $onChange onChange callback function
     * @param mixed $withSeconds Show seconds input field
     * @param mixed $disabled Disable input
     * @param mixed $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $label Input label
     * @param mixed $description Helper text below input
     * @param mixed $error Error message or boolean indicating error state
     * @param mixed $variant Input variant ('default', 'filled', 'unstyled')
     * @param mixed $withAsterisk Show required asterisk
     * @param mixed $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $placeholder Placeholder text
     * @param mixed $required Mark field as required
     * @param mixed $readOnly Make input read-only
     * @param mixed $name Input name attribute
     * @param mixed $form Form element id
     * @param mixed $id Element id
     * @param mixed $leftSection Content for the left section
     * @param mixed $leftSectionPointerEvents Pointer events for left section
     * @param mixed $rightSection Content for the right section
     * @param mixed $rightSectionPointerEvents Pointer events for right section
     * @param mixed $ref Reference to input element
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $withSeconds = null,
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
            'withSeconds' => $withSeconds,
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
