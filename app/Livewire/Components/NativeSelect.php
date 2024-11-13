<?php

namespace MantineLivewire\Components;

/**
 * NativeSelect component for creating native browser select inputs.
 *
 * The NativeSelect component renders a native HTML select element with Mantine styling.
 * It provides a lightweight alternative to Select component when you need native mobile experience.
 *
 * @see https://mantine.dev/core/native-select/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-native-select
 *     label="Select your country"
 *     :data="['USA', 'Canada', 'Mexico']"
 *     placeholder="Pick one"
 * />
 * ```
 *
 * @example With validation and styling
 * ```blade
 * <x-mantine-native-select
 *     :data="$countries"
 *     label="Country"
 *     :required="true"
 *     :with-asterisk="true"
 *     :error="$errors->first('country')"
 *     :size="'lg'"
 *     :radius="'md'"
 * />
 * ```
 *
 * @example With sections and custom styling
 * ```blade
 * <x-mantine-native-select
 *     :data="$options"
 *     :left-section="'🌍'"
 *     :variant="'filled'"
 *     :disabled="$isDisabled"
 *     description="Select your preferred location"
 * />
 * ```
 */
class NativeSelect extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $placeholder = null,
        public mixed $data = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public ?string $leftSectionWidth = null,
        public ?string $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
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
            'data' => $data,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'required' => $required,
            'withAsterisk' => $withAsterisk,
        ];
    }
}
