<?php

namespace MantineLivewire\Components;

/**
 * Switch component for toggling between two states.
 *
 * The Switch component provides a toggleable input that allows users to choose between two states.
 * It's commonly used for enabling/disabling features, toggling settings, or any binary choice.
 * Note: Named SwitchInput due to 'Switch' being a reserved word in PHP.
 *
 * @see https://mantine.dev/core/switch/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-switch-input
 *     label="Enable notifications"
 *     description="Receive email notifications"
 * />
 * ```
 *
 * @example With custom labels and styling
 * ```blade
 * <x-mantine-switch-input
 *     :checked="$enabled"
 *     label="Dark mode"
 *     on-label="ON"
 *     off-label="OFF"
 *     size="lg"
 *     color="blue"
 * />
 * ```
 *
 * @example With error state and description
 * ```blade
 * <x-mantine-switch-input
 *     label="Terms and conditions"
 *     description="Please accept our terms"
 *     error="You must accept the terms"
 *     :checked="$accepted"
 * />
 * ```
 */
class SwitchInput extends MantineComponent
{
    /**
     * Create a new Switch component instance.
     *
     * @param mixed $checked Current switch state
     * @param mixed $defaultChecked Initial switch state
     * @param string|null $label Main label
     * @param string|null $description Additional description text
     * @param mixed $error Error message or boolean
     * @param string|null $labelPosition Label position ('left' or 'right')
     * @param string|null $color Switch color from theme
     * @param string|null $size Switch size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius of thumb ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $disabled Whether the switch is disabled
     * @param string|null $onLabel Label shown when switch is checked
     * @param string|null $offLabel Label shown when switch is not checked
     * @param mixed $thumbIcon Icon rendered inside thumb
     * @param mixed $wrapperProps Props spread to wrapper element
     * @param mixed $value Value for form submission
     * @param string|null $ariaLabel ARIA label
     */
    public function __construct(
        public mixed $checked = null,
        public mixed $defaultChecked = null,
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?string $labelPosition = null,
        public ?string $color = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public ?string $onLabel = null,
        public ?string $offLabel = null,
        public mixed $thumbIcon = null,
        public mixed $wrapperProps = null,
        public mixed $value = null,
        public ?string $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'checked' => $checked,
            'defaultChecked' => $defaultChecked,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'labelPosition' => $labelPosition,
            'color' => $color,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'onLabel' => $onLabel,
            'offLabel' => $offLabel,
            'thumbIcon' => $thumbIcon,
            'wrapperProps' => $wrapperProps,
            'value' => $value,
            'aria-label' => $ariaLabel,
        ];
    }
}
