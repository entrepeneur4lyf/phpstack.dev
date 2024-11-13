<?php

namespace MantineLivewire\Components;

/**
 * Checkbox Component
 *
 * The Checkbox component allows users to select one or multiple options from a set.
 * It supports various states, styles, and can be used in forms and custom interfaces.
 *
 * @link https://mantine.dev/core/checkbox/
 *
 * @property mixed $checked Current checked state
 * @property mixed $defaultChecked Default value for uncontrolled state
 * @property mixed $indeterminate Displays indeterminate state
 * @property mixed $label Text or component displayed next to checkbox
 * @property mixed $description Additional text displayed below label
 * @property mixed $error Error message or boolean indicating error state
 * @property mixed $disabled Disables checkbox interactions
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $size Checkbox size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $variant Visual variant ('filled', 'outline')
 * @property mixed $labelPosition Position of label ('left', 'right')
 * @property mixed $iconColor Color of check icon
 * @property mixed $wrapperProps Props spread to wrapper element
 * @property mixed $onChange Function called when checkbox value changes
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-checkbox
 *     label="Accept terms and conditions"
 *     :default-checked="true"
 * />
 * ```
 *
 * @example With Description and Error
 * ```blade
 * <x-mantine-checkbox
 *     label="Newsletter"
 *     description="Receive weekly updates"
 *     error="Please accept to continue"
 * />
 * ```
 *
 * @example Indeterminate State
 * ```blade
 * <x-mantine-checkbox
 *     :indeterminate="true"
 *     label="Select all"
 * />
 * ```
 */
class Checkbox extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $checked Current state
     * @param mixed $defaultChecked Default state
     * @param mixed $indeterminate Show indeterminate
     * @param mixed $label Label text
     * @param mixed $description Help text
     * @param mixed $error Error state/message
     * @param mixed $disabled Disabled state
     * @param mixed $radius Border radius
     * @param mixed $size Checkbox size
     * @param mixed $color Checkbox color
     * @param mixed $variant Visual style
     * @param mixed $labelPosition Label position
     * @param mixed $iconColor Icon color
     * @param mixed $wrapperProps Wrapper props
     * @param mixed $onChange Change handler
     */
    public function __construct(
        public mixed $checked = null,
        public mixed $defaultChecked = null,
        public mixed $indeterminate = null,
        public mixed $label = null,
        public mixed $description = null,
        public mixed $error = null,
        public mixed $disabled = null,
        public mixed $radius = null,
        public mixed $size = null,
        public mixed $color = null,
        public mixed $variant = null,
        public mixed $labelPosition = null,
        public mixed $iconColor = null,
        public mixed $wrapperProps = null,
        public mixed $onChange = null,
    ) {
        parent::__construct();

        $this->props = [
            'checked' => $checked,
            'defaultChecked' => $defaultChecked,
            'indeterminate' => $indeterminate,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'disabled' => $disabled,
            'radius' => $radius,
            'size' => $size,
            'color' => $color,
            'variant' => $variant,
            'labelPosition' => $labelPosition,
            'iconColor' => $iconColor,
            'wrapperProps' => $wrapperProps,
            'onChange' => $onChange,
        ];
    }
}
