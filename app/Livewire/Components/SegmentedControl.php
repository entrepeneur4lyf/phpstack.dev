<?php

namespace MantineLivewire\Components;

/**
 * SegmentedControl component for creating a group of segmented buttons.
 *
 * The SegmentedControl component provides a horizontal or vertical group of buttons
 * that allows users to select a single option from multiple choices. It's commonly
 * used as an alternative to radio buttons or single-select dropdowns.
 *
 * @see https://mantine.dev/core/segmented-control/
 *
 * @example Basic usage with array data
 * ```blade
 * <x-mantine-segmented-control
 *     :data="['React', 'Angular', 'Vue', 'Svelte']"
 * />
 * ```
 *
 * @example With complex data objects
 * ```blade
 * <x-mantine-segmented-control
 *     :data="[
 *         ['value' => 'react', 'label' => 'React'],
 *         ['value' => 'vue', 'label' => 'Vue'],
 *         ['value' => 'angular', 'label' => 'Angular']
 *     ]"
 *     :default-value="'react'"
 * />
 * ```
 *
 * @example Vertical orientation with custom styling
 * ```blade
 * <x-mantine-segmented-control
 *     orientation="vertical"
 *     :full-width="true"
 *     :with-items-borders="true"
 *     size="md"
 *     radius="xl"
 *     color="blue"
 *     :data="['Option 1', 'Option 2', 'Option 3']"
 * />
 * ```
 */
class SegmentedControl extends MantineComponent
{
    /**
     * Create a new SegmentedControl component instance.
     *
     * @param mixed $data Array of options. Can be array of strings or objects with value and label keys
     * @param string|null $orientation Layout orientation: 'horizontal' or 'vertical'
     * @param bool|null $fullWidth Whether the control should take full width of its container
     * @param bool|null $withItemsBorders Whether to show borders between items
     * @param string|null $size Component size: 'xs', 'sm', 'md', 'lg', 'xl'
     * @param string|null $radius Border radius: 'xs', 'sm', 'md', 'lg', 'xl'
     * @param string|null $color Theme color for active item
     * @param int|null $transitionDuration Duration of transition animations in ms
     * @param string|null $transitionTimingFunction CSS timing function for transitions
     * @param bool|null $readOnly Whether the control is read-only
     * @param bool|null $disabled Whether the control is disabled
     * @param mixed $value Controlled component value
     * @param mixed $defaultValue Default value for uncontrolled component
     */
    public function __construct(
        public mixed $data = null,
        public ?string $orientation = null,
        public ?bool $fullWidth = null,
        public ?bool $withItemsBorders = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?string $color = null,
        public ?int $transitionDuration = null,
        public ?string $transitionTimingFunction = null,
        public ?bool $readOnly = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'orientation' => $orientation,
            'fullWidth' => $fullWidth,
            'withItemsBorders' => $withItemsBorders,
            'size' => $size,
            'radius' => $radius,
            'color' => $color,
            'transitionDuration' => $transitionDuration,
            'transitionTimingFunction' => $transitionTimingFunction,
            'readOnly' => $readOnly,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
        ];
    }
}
