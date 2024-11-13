<?php

namespace MantineLivewire\Components;

/**
 * Password input component with visibility toggle button.
 *
 * The PasswordInput component provides a secure input field for password entry with
 * a built-in visibility toggle button and customizable styling options.
 *
 * @see https://mantine.dev/core/password-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-password-input
 *     label="Your password"
 *     placeholder="Enter your password"
 *     :required="true"
 * />
 * ```
 *
 * @example With description and error state
 * ```blade
 * <x-mantine-password-input
 *     label="Create password"
 *     description="Password must include at least 8 characters"
 *     error="Password is too weak"
 *     :size="md"
 * />
 * ```
 *
 * @example With custom sections
 * ```blade
 * <x-mantine-password-input
 *     label="Password"
 *     leftSection="🔒"
 *     :rightSectionWidth="80"
 *     :radius="xl"
 * />
 * ```
 */
class PasswordInput extends MantineComponent
{
    /**
     * Create a new PasswordInput component instance.
     *
     * @param string|null $label Input label
     * @param string|null $description Additional description below the input
     * @param string|null $error Error message displayed below the input
     * @param string|null $placeholder Input placeholder
     * @param bool|null $visible Controls password visibility
     * @param mixed $visibilityToggleIcon Custom icon for visibility toggle button
     * @param mixed $visibilityToggleButtonProps Props passed to visibility toggle button
     * @param mixed $leftSection Content rendered on the left side of the input
     * @param mixed $rightSection Content rendered on the right side of the input
     * @param string|null $leftSectionWidth Width of the left section in px
     * @param string|null $rightSectionWidth Width of the right section in px
     * @param string|null $leftSectionPointerEvents Controls pointer events on left section
     * @param string|null $rightSectionPointerEvents Controls pointer events on right section
     * @param string|null $variant Input variant: filled, unstyled, default
     * @param string|null $size Input size: xs, sm, md, lg, xl
     * @param string|null $radius Border radius: xs, sm, md, lg, xl
     * @param bool|null $disabled Disables the input
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default value for uncontrolled input
     * @param bool|null $required Whether the input is required
     * @param bool|null $withAsterisk Adds red asterisk after label
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public ?bool $visible = null,
        public mixed $visibilityToggleIcon = null,
        public mixed $visibilityToggleButtonProps = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public ?string $leftSectionWidth = null,
        public ?string $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
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
            'visible' => $visible,
            'visibilityToggleIcon' => $visibilityToggleIcon,
            'visibilityToggleButtonProps' => $visibilityToggleButtonProps,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
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
