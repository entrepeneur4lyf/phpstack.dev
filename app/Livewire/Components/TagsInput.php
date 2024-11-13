<?php

namespace MantineLivewire\Components;

/**
 * TagsInput component for creating and managing multiple tag values.
 *
 * The TagsInput component allows users to input multiple values as tags, with features
 * like autocomplete, custom validation, and various customization options.
 *
 * @see https://mantine.dev/core/tags-input/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-tags-input
 *     label="Enter tags"
 *     placeholder="Type and press enter"
 *     :data="['react', 'angular', 'vue', 'svelte']"
 * />
 * ```
 *
 * @example With validation and max tags
 * ```blade
 * <x-mantine-tags-input
 *     label="Programming languages"
 *     :max-tags="3"
 *     :allow-duplicates="false"
 *     :split-chars="[',', ' ', '|']"
 *     error="Maximum 3 tags allowed"
 * />
 * ```
 *
 * @example With custom styling and sections
 * ```blade
 * <x-mantine-tags-input
 *     label="Categories"
 *     variant="filled"
 *     size="lg"
 *     radius="md"
 *     :clearable="true"
 *     left-section-icon="search"
 * />
 * ```
 */
class TagsInput extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Array of suggestions for autocomplete
     * @param mixed $value Current tags value
     * @param mixed $defaultValue Default tags value
     * @param string|null $label Input label
     * @param string|null $description Help text below input
     * @param mixed $error Error message or boolean
     * @param string|null $variant Input variant ('default', 'filled', etc)
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $withAsterisk Show required asterisk
     * @param mixed $leftSection Content for left section
     * @param mixed $rightSection Content for right section
     * @param mixed $leftSectionWidth Left section width
     * @param mixed $rightSectionWidth Right section width
     * @param string|null $leftSectionPointerEvents Left section pointer events
     * @param string|null $rightSectionPointerEvents Right section pointer events
     * @param bool|null $clearable Show clear button
     * @param mixed $searchValue Current search value
     * @param mixed $onSearchChange Search value change handler
     * @param int|null $maxTags Maximum number of tags allowed
     * @param bool|null $acceptValueOnBlur Add tag on blur
     * @param bool|null $allowDuplicates Allow duplicate tags
     * @param mixed $splitChars Characters that split tags
     * @param mixed $filter Filter function for suggestions
     * @param int|null $limit Maximum number of suggestions
     * @param mixed $renderOption Custom option render function
     * @param mixed $maxDropdownHeight Maximum dropdown height
     * @param bool|null $withScrollArea Enable dropdown scroll area
     * @param bool|null $dropdownOpened Control dropdown opened state
     * @param mixed $comboboxProps Props passed to Combobox component
     * @param bool|null $readOnly Make input read-only
     * @param bool|null $disabled Disable input
     * @param string|null $placeholder Input placeholder
     * @param string|null $ariaLabel Aria label for accessibility
     * @param mixed $wrapperProps Props passed to input wrapper
     * @param mixed $clearButtonProps Props passed to clear button
     */
    public function __construct(
        public mixed $data = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
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
        public ?bool $clearable = null,
        public mixed $searchValue = null,
        public mixed $onSearchChange = null,
        public ?int $maxTags = null,
        public ?bool $acceptValueOnBlur = null,
        public ?bool $allowDuplicates = null,
        public mixed $splitChars = null,
        public mixed $filter = null,
        public ?int $limit = null,
        public mixed $renderOption = null,
        public mixed $maxDropdownHeight = null,
        public ?bool $withScrollArea = null,
        public ?bool $dropdownOpened = null,
        public mixed $comboboxProps = null,
        public ?bool $readOnly = null,
        public ?bool $disabled = null,
        public ?string $placeholder = null,
        public ?string $ariaLabel = null,
        public mixed $wrapperProps = null,
        public mixed $clearButtonProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'value' => $value,
            'defaultValue' => $defaultValue,
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
            'clearable' => $clearable,
            'searchValue' => $searchValue,
            'onSearchChange' => $onSearchChange,
            'maxTags' => $maxTags,
            'acceptValueOnBlur' => $acceptValueOnBlur,
            'allowDuplicates' => $allowDuplicates,
            'splitChars' => $splitChars,
            'filter' => $filter,
            'limit' => $limit,
            'renderOption' => $renderOption,
            'maxDropdownHeight' => $maxDropdownHeight,
            'withScrollArea' => $withScrollArea,
            'dropdownOpened' => $dropdownOpened,
            'comboboxProps' => $comboboxProps,
            'readOnly' => $readOnly,
            'disabled' => $disabled,
            'placeholder' => $placeholder,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
            'clearButtonProps' => $clearButtonProps,
        ];
    }
}
