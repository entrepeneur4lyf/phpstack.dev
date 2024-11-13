<?php

namespace App\Livewire\Components;

/**
 * NumberInput component for handling numeric input with various formatting options.
 *
 * The NumberInput component provides a controlled input field for numbers with
 * support for validation, formatting, and increment/decrement controls.
 *
 * @see https://mantine.dev/core/number-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-number-input
 *     label="Enter amount"
 *     :min="0"
 *     :max="100"
 *     :default-value="50"
 * />
 * ```
 *
 * @example With currency formatting
 * ```blade
 * <x-mantine-number-input
 *     label="Price"
 *     prefix="$"
 *     :decimal-scale="2"
 *     :allow-decimal="true"
 *     :thousand-separator=","
 * />
 * ```
 *
 * @example Custom controls and sections
 * ```blade
 * <x-mantine-number-input
 *     label="Quantity"
 *     :step="5"
 *     :step-hold-delay="500"
 *     :left-section="'📦'"
 *     :right-section="'units'"
 * />
 * ```
 */
class NumberInput extends MantineComponent
{
    /**
     * Create a new NumberInput component instance.
     *
     * @param string|null $label Label displayed above the input
     * @param string|null $description Additional text displayed below the input
     * @param string|null $error Error message displayed below the input
     * @param string|null $placeholder Placeholder text when input is empty
     * @param mixed $min Minimum allowed value
     * @param mixed $max Maximum allowed value
     * @param string|null $clampBehavior Controls value behavior when it exceeds min/max ('strict' or 'blur')
     * @param string|null $prefix Text added before the input value
     * @param string|null $suffix Text added after the input value
     * @param bool|null $allowNegative Whether negative values are allowed
     * @param bool|null $allowDecimal Whether decimal values are allowed
     * @param int|null $decimalScale Number of digits after decimal point
     * @param bool|null $fixedDecimalScale Whether to always show decimal places
     * @param string|null $decimalSeparator Character to use as decimal separator
     * @param string|null $thousandSeparator Character to use as thousand separator
     * @param string|null $thousandsGroupStyle Number grouping style ('thousand', 'lakh', 'wan')
     * @param mixed $leftSection Content displayed on the left side of the input
     * @param mixed $rightSection Content displayed on the right side of the input
     * @param string|null $leftSectionWidth Width of the left section
     * @param string|null $rightSectionWidth Width of the right section
     * @param string|null $leftSectionPointerEvents Whether left section should capture pointer events
     * @param string|null $rightSectionPointerEvents Whether right section should capture pointer events
     * @param bool|null $hideControls Whether to hide increment/decrement controls
     * @param int|null $stepHoldDelay Delay before stepping starts when button is held
     * @param mixed $stepHoldInterval Interval between steps when button is held
     * @param mixed $step Value increment/decrement step
     * @param string|null $variant Input variant ('default', 'filled', 'unstyled')
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $disabled Whether the input is disabled
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default value when uncontrolled
     * @param bool|null $required Whether the input is required
     * @param bool|null $withAsterisk Whether to show required asterisk
     * @param mixed $handlersRef Reference to input handlers
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public mixed $min = null,
        public mixed $max = null,
        public ?string $clampBehavior = null,
        public ?string $prefix = null,
        public ?string $suffix = null,
        public ?bool $allowNegative = null,
        public ?bool $allowDecimal = null,
        public ?int $decimalScale = null,
        public ?bool $fixedDecimalScale = null,
        public ?string $decimalSeparator = null,
        public ?string $thousandSeparator = null,
        public ?string $thousandsGroupStyle = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public ?string $leftSectionWidth = null,
        public ?string $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
        public ?bool $hideControls = null,
        public ?int $stepHoldDelay = null,
        public mixed $stepHoldInterval = null,
        public mixed $step = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?bool $required = null,
        public ?bool $withAsterisk = null,
        public mixed $handlersRef = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'placeholder' => $placeholder,
            'min' => $min,
            'max' => $max,
            'clampBehavior' => $clampBehavior,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'allowNegative' => $allowNegative,
            'allowDecimal' => $allowDecimal,
            'decimalScale' => $decimalScale,
            'fixedDecimalScale' => $fixedDecimalScale,
            'decimalSeparator' => $decimalSeparator,
            'thousandSeparator' => $thousandSeparator,
            'thousandsGroupStyle' => $thousandsGroupStyle,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'hideControls' => $hideControls,
            'stepHoldDelay' => $stepHoldDelay,
            'stepHoldInterval' => $stepHoldInterval,
            'step' => $step,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'required' => $required,
            'withAsterisk' => $withAsterisk,
            'handlersRef' => $handlersRef,
        ];
    }
}
