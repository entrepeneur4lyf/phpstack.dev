<?php

namespace MantineLivewire\Components;

/**
 * Select Component
 *
 * The Select component is used to create a dropdown selection input. It allows users to select
 * an option from a list of predefined options. The component supports various customization options
 * such as size, color, and placeholder.
 *
 * @link https://mantine.dev/core/select/
 *
 * @property mixed $data Options for the select input
 * @property mixed $value Current selected value
 * @property mixed $defaultValue Default selected value
 * @property ?string $label Label for the select input
 * @property ?string $description Description for the select input
 * @property mixed $error Error message for the select input
 * @property ?string $variant Visual variant of the select input
 * @property ?string $size Size of the select input
 * @property ?string $radius Border radius of the select input
 * @property ?bool $withAsterisk Determines if an asterisk should be displayed
 * @property mixed $leftSection Left section of the select input
 * @property mixed $rightSection Right section of the select input
 * @property mixed $leftSectionWidth Width of the left section
 * @property mixed $rightSectionWidth Width of the right section
 * @property ?string $leftSectionPointerEvents Pointer events for the left section
 * @property ?string $rightSectionPointerEvents Pointer events for the right section
 * @property ?bool $clearable Determines if the select input is clearable
 * @property ?bool $allowDeselect Determines if deselecting is allowed
 * @property ?bool $searchable Determines if the select input is searchable
 * @property mixed $searchValue Current search value
 * @property mixed $onSearchChange Callback for search value change
 * @property ?string $nothingFoundMessage Message displayed when no options are found
 * @property ?string $checkIconPosition Position of the check icon
 * @property ?bool $withCheckIcon Determines if a check icon should be displayed
 * @property mixed $filter Function to filter options
 * @property ?int $limit Maximum number of options to display
 * @property mixed $renderOption Function to render options
 * @property mixed $maxDropdownHeight Maximum height of the dropdown
 * @property ?bool $withScrollArea Determines if a scroll area should be used
 * @property ?bool $dropdownOpened Determines if the dropdown is opened
 * @property mixed $comboboxProps Props for the combobox
 * @property ?bool $readOnly Determines if the select input is read-only
 * @property ?bool $disabled Determines if the select input is disabled
 * @property ?string $placeholder Placeholder for the select input
 * @property ?string $ariaLabel Accessibility label for the select input
 * @property mixed $wrapperProps Props for the wrapper
 * @property mixed $clearButtonProps Props for the clear button
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-select :data="['Option 1', 'Option 2']" />
 * ```
 */
class Select extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Options for the select input
     * @param mixed $value Current selected value
     * @param mixed $defaultValue Default selected value
     * @param ?string $label Label for the select input
     * @param ?string $description Description for the select input
     * @param mixed $error Error message for the select input
     * @param ?string $variant Visual variant of the select input
     * @param ?string $size Size of the select input
     * @param ?string $radius Border radius of the select input
     * @param ?bool $withAsterisk Determines if an asterisk should be displayed
     * @param mixed $leftSection Left section of the select input
     * @param mixed $rightSection Right section of the select input
     * @param mixed $leftSectionWidth Width of the left section
     * @param mixed $rightSectionWidth Width of the right section
     * @param ?string $leftSectionPointerEvents Pointer events for the left section
     * @param ?string $rightSectionPointerEvents Pointer events for the right section
     * @param ?bool $clearable Determines if the select input is clearable
     * @param ?bool $allowDeselect Determines if deselecting is allowed
     * @param ?bool $searchable Determines if the select input is searchable
     * @param mixed $searchValue Current search value
     * @param mixed $onSearchChange Callback for search value change
     * @param ?string $nothingFoundMessage Message displayed when no options are found
     * @param ?string $checkIconPosition Position of the check icon
     * @param ?bool $withCheckIcon Determines if a check icon should be displayed
     * @param mixed $filter Function to filter options
     * @param ?int $limit Maximum number of options to display
     * @param mixed $renderOption Function to render options
     * @param mixed $maxDropdownHeight Maximum height of the dropdown
     * @param ?bool $withScrollArea Determines if a scroll area should be used
     * @param ?bool $dropdownOpened Determines if the dropdown is opened
     * @param mixed $comboboxProps Props for the combobox
     * @param ?bool $readOnly Determines if the select input is read-only
     * @param ?bool $disabled Determines if the select input is disabled
     * @param ?string $placeholder Placeholder for the select input
     * @param ?string $ariaLabel Accessibility label for the select input
     * @param mixed $wrapperProps Props for the wrapper
     * @param mixed $clearButtonProps Props for the clear button
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
        public ?bool $allowDeselect = null,
        public ?bool $searchable = null,
        public mixed $searchValue = null,
        public mixed $onSearchChange = null,
        public ?string $nothingFoundMessage = null,
        public ?string $checkIconPosition = null,
        public ?bool $withCheckIcon = null,
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
            'allowDeselect' => $allowDeselect,
            'searchable' => $searchable,
            'searchValue' => $searchValue,
            'onSearchChange' => $onSearchChange,
            'nothingFoundMessage' => $nothingFoundMessage,
            'checkIconPosition' => $checkIconPosition,
            'withCheckIcon' => $withCheckIcon,
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
