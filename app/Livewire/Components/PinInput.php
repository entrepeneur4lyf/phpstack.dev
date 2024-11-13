<?php

namespace MantineLivewire\Components;

/**
 * PinInput component for entering pin codes or one-time passwords.
 *
 * The PinInput component provides a specialized input field for entering numeric or text-based
 * codes, commonly used for verification codes, PIN numbers, or one-time passwords (OTP).
 *
 * @see https://mantine.dev/core/pin-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-pin-input
 *     :length="6"
 *     placeholder="○"
 * />
 * ```
 *
 * @example With mask and custom size
 * ```blade
 * <x-mantine-pin-input
 *     :length="4"
 *     :mask="true"
 *     :size="lg"
 *     placeholder="•"
 * />
 * ```
 *
 * @example One-time code input
 * ```blade
 * <x-mantine-pin-input
 *     :length="6"
 *     :one-time-code="true"
 *     input-mode="numeric"
 *     placeholder="-"
 * />
 * ```
 */
class PinInput extends MantineComponent
{
    /**
     * Create a new PinInput component instance.
     *
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param int|null $length Number of input cells
     * @param bool|null $mask Whether to mask input characters
     * @param string|null $placeholder Placeholder character for empty cells
     * @param bool|null $disabled Whether the input is disabled
     * @param mixed $error Error state or message
     * @param mixed $type Input type ('default', 'error', 'success')
     * @param string|null $inputType HTML input type ('text', 'password', 'tel', etc)
     * @param string|null $inputMode HTML inputmode attribute ('numeric', 'text', etc)
     * @param bool|null $oneTimeCode Whether to enable one-time code autofill
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default uncontrolled input value
     * @param string|null $ariaLabel Accessibility label
     */
    public function __construct(
        public ?string $size = null,
        public ?int $length = null,
        public ?bool $mask = null,
        public ?string $placeholder = null,
        public ?bool $disabled = null,
        public mixed $error = null,
        public mixed $type = null,
        public ?string $inputType = null,
        public ?string $inputMode = null,
        public ?bool $oneTimeCode = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'length' => $length,
            'mask' => $mask,
            'placeholder' => $placeholder,
            'disabled' => $disabled,
            'error' => $error,
            'type' => $type,
            'inputType' => $inputType,
            'inputMode' => $inputMode,
            'oneTimeCode' => $oneTimeCode,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'aria-label' => $ariaLabel,
        ];
    }
}
