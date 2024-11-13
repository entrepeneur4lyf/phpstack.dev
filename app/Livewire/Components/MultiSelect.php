<?php

namespace App\Livewire\Components;

/**
 * MultiSelect component for selecting multiple values from a list of options.
 *
 * The MultiSelect component allows users to select multiple items from a dropdown list.
 * It supports searching, custom filtering, and various customization options.
 *
 * @see https://mantine.dev/core/multi-select/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-multi-select
 *     :data="['React', 'Angular', 'Vue', 'Svelte']"
 *     :value="$selectedFrameworks"
 *     label="Select frameworks"
 *     placeholder="Pick your favorites"
 * />
 * ```
 *
 * @example With search and limit
 * ```blade
 * <x-mantine-multi-select
 *     :data="$countries"
 *     :searchable="true"
 *     :limit="5"
 *     :max-values="3"
 *     label="Select countries"
 *     :nothing-found-message="'No matching countries'"
 * />
 * ```
 *
 * @example With custom styling
 * ```blade
 * <x-mantine-multi-select
 *     :data="$options"
 *     :size="'lg'"
 *     :radius="'xl'"
 *     :with-asterisk="true"
 *     :clearable="true"
 *     :disabled="false"
 * />
 * ```
 */
class MultiSelect extends MantineComponent
{
    /**
     * Create a new MultiSelect component instance.
     *
     * @param mixed $data Array of items to select from
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param string|null $label Input label
     * @param string|null $description Input description
     * @param mixed $error Error message
     * @param string|null $variant Input variant ('default', 'filled', etc)
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $withAsterisk Show required asterisk
     * @param mixed $leftSection Content before input
     * @param mixed $rightSection Content after input
     * @param mixed $leftSectionWidth Left section width
     * @param mixed $rightSectionWidth Right section width
     * @param string|null $leftSectionPointerEvents Left section pointer events
     * @param string|null $rightSectionPointerEvents Right section pointer events
     * @param bool|null $clearable Allow clearing value
     * @param bool|null $searchable Enable search
     * @param mixed $searchValue Controlled search value
     * @param mixed $onSearchChange Search value change callback
     * @param string|null $nothingFoundMessage Message shown when no options match search
     * @param string|null $checkIconPosition Position of check icon ('left' or 'right')
     * @param bool|null $withCheckIcon Show check icon next to selected item
     * @param int|null $maxValues Maximum number of values
     * @param bool|null $hidePickedOptions Hide options that were already selected
     * @param mixed $filter Custom filter function
     * @param int|null $limit Maximum number of options displayed
     * @param mixed $renderOption Custom option render function
     * @param mixed $maxDropdownHeight Maximum dropdown height
     * @param bool|null $withScrollArea Enable scroll area in dropdown
     * @param bool|null $dropdownOpened Control dropdown opened state
     * @param mixed $comboboxProps Props passed to Combobox component
     * @param bool|null $readOnly Make input read only
     * @param bool|null $disabled Disable input
     * @param string|null $placeholder Input placeholder
     * @param string|null $ariaLabel Aria label
     * @param mixed $wrapperProps Props added to wrapper element
     * @param mixed $clearButtonProps Props added to clear button
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
        public ?bool $searchable = null,
        public mixed $searchValue = null,
        public mixed $onSearchChange = null,
        public ?string $nothingFoundMessage = null,
        public ?string $checkIconPosition = null,
        public ?bool $withCheckIcon = null,
        public ?int $maxValues = null,
        public ?bool $hidePickedOptions = null,
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
            'searchable' => $searchable,
            'searchValue' => $searchValue,
            'onSearchChange' => $onSearchChange,
            'nothingFoundMessage' => $nothingFoundMessage,
            'checkIconPosition' => $checkIconPosition,
            'withCheckIcon' => $withCheckIcon,
            'maxValues' => $maxValues,
            'hidePickedOptions' => $hidePickedOptions,
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
