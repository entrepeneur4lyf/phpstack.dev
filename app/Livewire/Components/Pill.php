<?php

namespace App\Livewire\Components;

/**
 * Pill component for displaying small pieces of information with optional remove button.
 *
 * The Pill component is used to display compact information that can be removable,
 * similar to tags or badges but with a more pill-like appearance.
 *
 * @see https://mantine.dev/core/pill/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-pill>
 *     Basic pill
 * </x-mantine-pill>
 * ```
 *
 * @example With remove button
 * ```blade
 * <x-mantine-pill
 *     :with-remove-button="true"
 *     :on-remove="$removeHandler"
 * >
 *     Removable pill
 * </x-mantine-pill>
 * ```
 *
 * @example Custom size
 * ```blade
 * <x-mantine-pill :size="xs">
 *     Extra small
 * </x-mantine-pill>
 * <x-mantine-pill :size="lg">
 *     Large pill
 * </x-mantine-pill>
 * ```
 */
class Pill extends MantineComponent
{
    /**
     * Create a new Pill component instance.
     *
     * @param bool|null $withRemoveButton Whether to display a remove button
     * @param mixed $onRemove Callback function triggered when remove button is clicked
     * @param string|null $size Size of the pill ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $removeButtonProps Props to pass to the remove button component
     */
    public function __construct(
        public ?bool $withRemoveButton = null,
        public mixed $onRemove = null,
        public ?string $size = null,
        public mixed $removeButtonProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'withRemoveButton' => $withRemoveButton,
            'onRemove' => $onRemove,
            'size' => $size,
            'removeButtonProps' => $removeButtonProps,
        ];
    }
}
