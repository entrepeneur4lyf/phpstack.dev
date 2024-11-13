<?php

namespace MantineLivewire\Components;

/**
 * ColorPicker Component
 *
 * The ColorPicker component allows users to select colors using a color picker interface.
 * It supports various color formats and can include predefined swatches for quick selection.
 *
 * @link https://mantine.dev/core/color-picker/
 *
 * @property mixed $format Color format ('hex', 'rgba', 'rgb', 'hsl', 'hsla')
 * @property mixed $swatches Array of predefined color swatches
 * @property mixed $swatchesPerRow Number of swatches per row
 * @property mixed $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $value Current color value
 * @property mixed $defaultValue Default color value for uncontrolled state
 * @property mixed $withPicker Enable color picker
 * @property mixed $fullWidth Makes the input take full width
 * @property mixed $onlyPicker Show only the color picker without input
 * @property mixed $saturationLabel Label for saturation slider
 * @property mixed $hueLabel Label for hue slider
 * @property mixed $alphaLabel Label for alpha slider
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-color-picker
 *     label="Pick a color"
 *     format="hex"
 * />
 * ```
 *
 * @example With Swatches
 * ```blade
 * <x-mantine-color-picker
 *     :swatches="['#25262b', '#868e96', '#fa5252', '#e64980']"
 *     :swatches-per-row="5"
 *     format="hex"
 * />
 * ```
 */
class ColorPicker extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $format Color format
     * @param mixed $swatches Color swatches
     * @param mixed $swatchesPerRow Swatches per row
     * @param mixed $size Input size
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param mixed $withPicker Enable picker
     * @param mixed $fullWidth Take full width
     * @param mixed $onlyPicker Show only picker
     * @param mixed $saturationLabel Saturation label
     * @param mixed $hueLabel Hue label
     * @param mixed $alphaLabel Alpha label
     */
    public function __construct(
        public ?string $format = null,
        public ?array $swatches = null,
        public ?int $swatchesPerRow = null,
        public ?string $size = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?bool $withPicker = null,
        public ?bool $fullWidth = null,
        public ?bool $onlyPicker = null,
        public ?string $saturationLabel = null,
        public ?string $hueLabel = null,
        public ?string $alphaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'format' => $format,
            'swatches' => $swatches,
            'swatchesPerRow' => $swatchesPerRow,
            'size' => $size,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'withPicker' => $withPicker,
            'fullWidth' => $fullWidth,
            'onlyPicker' => $onlyPicker,
            'saturationLabel' => $saturationLabel,
            'hueLabel' => $hueLabel,
            'alphaLabel' => $alphaLabel,
        ];
    }
}
