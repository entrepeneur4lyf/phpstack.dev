<?php

namespace App\Livewire\Components;

/**
 * ChipGroup Component
 *
 * The ChipGroup component manages the state of multiple Chip components, enabling single or multiple
 * selection behavior. It's commonly used for filtering interfaces, tag selection, or option groups.
 *
 * @link https://mantine.dev/core/chip/
 *
 * @property mixed $value Current selected value(s)
 * @property mixed $defaultValue Default value for uncontrolled state
 * @property mixed $onChange Function called when value changes
 * @property mixed $multiple Allow multiple chips to be selected
 * @property mixed $classNames Custom class names for chip group elements
 * @property mixed $styles Custom styles for chip group elements
 * @property mixed $wrapperProps Props spread to wrapper element
 *
 * @example Single Selection
 * ```blade
 * <x-mantine-chip-group wire:model.live="value">
 *     <x-mantine-group justify="center">
 *         <x-mantine-chip value="1">Option 1</x-mantine-chip>
 *         <x-mantine-chip value="2">Option 2</x-mantine-chip>
 *     </x-mantine-group>
 * </x-mantine-chip-group>
 * ```
 *
 * @example Multiple Selection
 * ```blade
 * <x-mantine-chip-group :multiple="true" wire:model.live="values">
 *     <x-mantine-group justify="center">
 *         <x-mantine-chip value="1">Option 1</x-mantine-chip>
 *         <x-mantine-chip value="2">Option 2</x-mantine-chip>
 *     </x-mantine-group>
 * </x-mantine-chip-group>
 * ```
 */
class ChipGroup extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current value(s)
     * @param mixed $defaultValue Default value
     * @param mixed $onChange Change handler
     * @param mixed $multiple Allow multiple
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     * @param mixed $wrapperProps Wrapper props
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $multiple = null,
        public mixed $classNames = null,
        public mixed $styles = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'multiple' => $multiple,
            'classNames' => $classNames,
            'styles' => $styles,
            'wrapperProps' => $wrapperProps,
        ];
    }
} 