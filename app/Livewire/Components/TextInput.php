<?php

namespace MantineLivewire\Components;

/**
 * TextInput component for single-line text input fields.
 *
 * The TextInput component provides a customizable single-line text input field with
 * support for labels, descriptions, validation states, and left/right sections for
 * icons or additional content.
 *
 * @see https://mantine.dev/core/text-input/
 *
 * @example Basic usage with label and placeholder
 * ```blade
 * <x-mantine-text-input
 *     label="Email"
 *     placeholder="your@email.com"
 *     :withAsterisk="true"
 * />
 * ```
 *
 * @example With validation and description
 * ```blade
 * <x-mantine-text-input
 *     label="Username"
 *     description="Choose a unique username"
 *     error="Username is already taken"
 *     size="md"
 *     radius="md"
 * />
 * ```
 *
 * @example With left and right sections
 * ```blade
 * <x-mantine-text-input
 *     label="Search"
 *     placeholder="Search..."
 *     leftSection="🔍"
 *     rightSection="⌘K"
 *     variant="filled"
 * />
 * ```
 */
class TextInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $label Input label
     * @param string|null $description Helper text below input
     * @param mixed $error Error message or boolean indicating error state
     * @param string|null $variant Input variant ('default', 'filled', 'unstyled')
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $withAsterisk Show required asterisk
     * @param mixed $leftSection Content for the left section
     * @param mixed $rightSection Content for the right section
     * @param mixed $leftSectionWidth Width of left section
     * @param mixed $rightSectionWidth Width of right section
     * @param string|null $leftSectionPointerEvents Pointer events for left section
     * @param string|null $rightSectionPointerEvents Pointer events for right section
     * @param bool|null $disabled Disable input
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default value for uncontrolled input
     * @param string|null $placeholder Placeholder text
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $wrapperProps Props to pass to wrapper element
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $withAsterisk = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $leftSectionWidth = null,
        public mixed $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $placeholder = null,
        public ?string $ariaLabel = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'withAsterisk' => $withAsterisk,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'placeholder' => $placeholder,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
