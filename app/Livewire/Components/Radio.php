<?php

namespace App\Livewire\Components;

/**
 * Radio component for single-selection input controls.
 *
 * The Radio component creates a radio button input that allows users to select
 * a single option from a set of choices. It supports customization of appearance,
 * labels, and states.
 *
 * @see https://mantine.dev/core/radio/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-radio
 *     name="favorite"
 *     value="react"
 *     label="React"
 * />
 * ```
 *
 * @example With description and error state
 * ```blade
 * <x-mantine-radio
 *     label="Custom radio"
 *     description="Select this option for something special"
 *     :error="$errorMessage"
 *     :checked="$isSelected"
 * />
 * ```
 *
 * @example Customized appearance
 * ```blade
 * <x-mantine-radio
 *     label="Styled radio"
 *     color="blue"
 *     size="lg"
 *     :icon="$customIcon"
 *     icon-color="cyan"
 * />
 * ```
 */
class Radio extends MantineComponent
{
    /**
     * Create a new Radio component instance.
     *
     * @param string|null $label Text label for the radio button
     * @param string|null $description Additional description text below the label
     * @param mixed $error Error message or state
     * @param string|null $labelPosition Position of the label relative to radio ('left' or 'right')
     * @param string|null $size Size of the radio button ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $color Color of the radio button when checked
     * @param string|null $variant Visual variant of the radio button
     * @param bool|null $checked Whether the radio is checked
     * @param mixed $icon Custom icon component
     * @param string|null $iconColor Color of the custom icon
     * @param bool|null $disabled Whether the radio is disabled
     * @param mixed $value Value associated with the radio button
     * @param mixed $defaultValue Default value for uncontrolled component
     * @param mixed $wrapperProps Props to pass to the wrapper element
     * @param string|null $name Name attribute for form submission
     * @param string|null $ariaLabel Accessibility label
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?string $labelPosition = null,
        public ?string $size = null,
        public ?string $color = null,
        public ?string $variant = null,
        public ?bool $checked = null,
        public mixed $icon = null,
        public ?string $iconColor = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $wrapperProps = null,
        public ?string $name = null,
        public ?string $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'labelPosition' => $labelPosition,
            'size' => $size,
            'color' => $color,
            'variant' => $variant,
            'checked' => $checked,
            'icon' => $icon,
            'iconColor' => $iconColor,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'wrapperProps' => $wrapperProps,
            'name' => $name,
            'aria-label' => $ariaLabel,
        ];
    }
}
