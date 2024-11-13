<?php

namespace App\Livewire\Components;

/**
 * ColorInput Component
 *
 * The ColorInput component allows users to input and select colors. It supports various
 * color formats and provides a color picker interface with customizable features.
 *
 * @link https://mantine.dev/core/color-input/
 *
 * @property mixed $value Current color value
 * @property mixed $defaultValue Default color value for uncontrolled state
 * @property mixed $onChange Function called when color changes
 * @property mixed $format Color format ('hex', 'rgba', 'rgb', 'hsl', 'hsla')
 * @property mixed $swatches Array of predefined color swatches
 * @property mixed $swatchesPerRow Number of swatches per row
 * @property mixed $withPicker Enable color picker
 * @property mixed $closeOnColorSwatchClick Close dropdown when swatch is clicked
 * @property mixed $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $label Input label
 * @property mixed $description Additional text below input
 * @property mixed $error Error message or boolean indicating error state
 * @property mixed $withAsterisk Show required asterisk
 * @property mixed $disabled Disable input
 * @property mixed $placeholder Input placeholder
 * @property mixed $variant Visual variant ('default', 'filled', 'unstyled')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $eyeDropperButtonProps Props for eye dropper button
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-color-input
 *     label="Pick a color"
 *     placeholder="Pick color"
 *     format="hex"
 * />
 * ```
 *
 * @example With Swatches
 * ```blade
 * <x-mantine-color-input
 *     :swatches="['#25262b', '#868e96', '#fa5252', '#e64980']"
 *     :swatches-per-row="5"
 *     format="hex"
 * />
 * ```
 */
class ColorInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param mixed $onChange Change handler
     * @param mixed $format Color format
     * @param mixed $swatches Color swatches
     * @param mixed $swatchesPerRow Swatches per row
     * @param mixed $withPicker Enable picker
     * @param mixed $closeOnColorSwatchClick Close on swatch click
     * @param mixed $size Input size
     * @param mixed $label Input label
     * @param mixed $description Help text
     * @param mixed $error Error state/message
     * @param mixed $withAsterisk Required marker
     * @param mixed $disabled Disabled state
     * @param mixed $placeholder Placeholder text
     * @param mixed $variant Visual style
     * @param mixed $radius Border radius
     * @param mixed $eyeDropperButtonProps Eye dropper props
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $format = null,
        public mixed $swatches = null,
        public mixed $swatchesPerRow = null,
        public mixed $withPicker = null,
        public mixed $closeOnColorSwatchClick = null,
        public mixed $size = null,
        public mixed $label = null,
        public mixed $description = null,
        public mixed $error = null,
        public mixed $withAsterisk = null,
        public mixed $disabled = null,
        public mixed $placeholder = null,
        public mixed $variant = null,
        public mixed $radius = null,
        public mixed $eyeDropperButtonProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'format' => $format,
            'swatches' => $swatches,
            'swatchesPerRow' => $swatchesPerRow,
            'withPicker' => $withPicker,
            'closeOnColorSwatchClick' => $closeOnColorSwatchClick,
            'size' => $size,
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'withAsterisk' => $withAsterisk,
            'disabled' => $disabled,
            'placeholder' => $placeholder,
            'variant' => $variant,
            'radius' => $radius,
            'eyeDropperButtonProps' => $eyeDropperButtonProps,
        ];
    }
}
