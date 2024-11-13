<?php

namespace App\Livewire\Components;

/**
 * Autocomplete Component
 *
 * The Autocomplete component is a text input that provides suggestions while the user types.
 * It supports custom filtering, option rendering, and various styling options.
 *
 * @link https://mantine.dev/core/autocomplete/
 *
 * @property mixed $data Array of suggestions or function that returns filtered data
 * @property mixed $value Current value
 * @property mixed $defaultValue Default value for uncontrolled component
 * @property string|null $label Input label
 * @property string|null $description Additional description below input
 * @property mixed $error Error message or boolean indicating error state
 * @property string|null $variant Visual variant ('default', 'filled', 'unstyled')
 * @property string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
 * @property bool|null $withAsterisk Show required asterisk
 * @property mixed $leftSection Content rendered on the left side of input
 * @property mixed $rightSection Content rendered on the right side of input
 * @property mixed $leftSectionWidth Width of left section in px
 * @property mixed $rightSectionWidth Width of right section in px
 * @property string|null $leftSectionPointerEvents Pointer events for left section
 * @property string|null $rightSectionPointerEvents Pointer events for right section
 * @property mixed $filter Custom filter function
 * @property int|null $limit Maximum number of suggestions shown
 * @property mixed $maxDropdownHeight Maximum dropdown height in px
 * @property bool|null $withScrollArea Enable scroll area in dropdown
 * @property mixed $renderOption Custom option render function
 * @property bool|null $dropdownOpened Control dropdown opened state
 * @property mixed $comboboxProps Props spread to Combobox component
 * @property bool|null $readOnly Make input read only
 * @property bool|null $disabled Disable input
 * @property string|null $placeholder Input placeholder
 * @property string|null $ariaLabel Aria label
 * @property mixed $wrapperProps Props spread to input wrapper
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-autocomplete
 *     label="Pick a country"
 *     placeholder="Start typing..."
 *     :data="['USA', 'UK', 'Canada', 'Australia']"
 * />
 * ```
 *
 * @example With Custom Filtering
 * ```blade
 * <x-mantine-autocomplete
 *     label="Search users"
 *     :data="$users"
 *     :filter="fn($value, $item) => str_contains(strtolower($item), strtolower($value))"
 *     :limit="5"
 * />
 * ```
 *
 * @example With Custom Option Rendering
 * ```blade
 * <x-mantine-autocomplete
 *     label="Select user"
 *     :data="$users"
 *     :render-option="fn($option) => view('components.user-option', ['user' => $option])"
 *     :with-scroll-area="true"
 *     :max-dropdown-height="200"
 * />
 * ```
 */
class Autocomplete extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $data Suggestions data
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param string|null $label Input label
     * @param string|null $description Help text
     * @param mixed $error Error state/message
     * @param string|null $variant Visual variant
     * @param string|null $size Input size
     * @param string|null $radius Border radius
     * @param bool|null $withAsterisk Required marker
     * @param mixed $leftSection Left section content
     * @param mixed $rightSection Right section content
     * @param mixed $leftSectionWidth Left section width
     * @param mixed $rightSectionWidth Right section width
     * @param string|null $leftSectionPointerEvents Left section events
     * @param string|null $rightSectionPointerEvents Right section events
     * @param mixed $filter Filter function
     * @param int|null $limit Results limit
     * @param mixed $maxDropdownHeight Dropdown height
     * @param bool|null $withScrollArea Enable scrolling
     * @param mixed $renderOption Option renderer
     * @param bool|null $dropdownOpened Control dropdown
     * @param mixed $comboboxProps Combobox props
     * @param bool|null $readOnly Read only state
     * @param bool|null $disabled Disabled state
     * @param string|null $placeholder Placeholder text
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $wrapperProps Wrapper props
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
        public mixed $filter = null,
        public ?int $limit = null,
        public mixed $maxDropdownHeight = null,
        public ?bool $withScrollArea = null,
        public mixed $renderOption = null,
        public ?bool $dropdownOpened = null,
        public mixed $comboboxProps = null,
        public ?bool $readOnly = null,
        public ?bool $disabled = null,
        public ?string $placeholder = null,
        public ?string $ariaLabel = null,
        public mixed $wrapperProps = null,
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
            'filter' => $filter,
            'limit' => $limit,
            'maxDropdownHeight' => $maxDropdownHeight,
            'withScrollArea' => $withScrollArea,
            'renderOption' => $renderOption,
            'dropdownOpened' => $dropdownOpened,
            'comboboxProps' => $comboboxProps,
            'readOnly' => $readOnly,
            'disabled' => $disabled,
            'placeholder' => $placeholder,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
