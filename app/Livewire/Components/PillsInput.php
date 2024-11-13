<?php

namespace App\Livewire\Components;

/**
 * PillsInput component for creating an input field that can contain pill elements.
 *
 * The PillsInput component provides a container for pill elements with input field functionality,
 * commonly used for tags, filters, or multi-value selections.
 *
 * @see https://mantine.dev/core/pills-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-pills-input label="Select tags">
 *     <x-mantine-pill>React</x-mantine-pill>
 *     <x-mantine-pill>Vue</x-mantine-pill>
 *     <x-mantine-pill>Angular</x-mantine-pill>
 * </x-mantine-pills-input>
 * ```
 *
 * @example With description and error
 * ```blade
 * <x-mantine-pills-input
 *     label="Technologies"
 *     description="Select your preferred frameworks"
 *     error="Please select at least one framework"
 * >
 *     <x-mantine-pill :with-remove-button="true">Laravel</x-mantine-pill>
 * </x-mantine-pills-input>
 * ```
 *
 * @example Custom styling
 * ```blade
 * <x-mantine-pills-input
 *     :variant="filled"
 *     :size="lg"
 *     :radius="xl"
 *     placeholder="Add more..."
 * >
 *     <x-mantine-pill>Custom styled pill</x-mantine-pill>
 * </x-mantine-pills-input>
 * ```
 */
class PillsInput extends MantineComponent
{
    /**
     * Create a new PillsInput component instance.
     *
     * @param string|null $label Input label
     * @param string|null $description Help text below the input
     * @param mixed $error Error message or boolean indicating error state
     * @param string|null $variant Input variant ('default', 'filled', 'unstyled')
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $withAsterisk Show required asterisk
     * @param mixed $onClick Click event handler
     * @param mixed $onFocus Focus event handler
     * @param mixed $onBlur Blur event handler
     * @param string|null $placeholder Placeholder text
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $wrapperProps Props to pass to the wrapper element
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $withAsterisk = null,
        public mixed $onClick = null,
        public mixed $onFocus = null,
        public mixed $onBlur = null,
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
            'onClick' => $onClick,
            'onFocus' => $onFocus,
            'onBlur' => $onBlur,
            'placeholder' => $placeholder,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
