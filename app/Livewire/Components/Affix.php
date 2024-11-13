<?php

namespace App\Livewire\Components;

/**
 * Affix Component
 *
 * The Affix component renders its content at a fixed position within the viewport. It's commonly used
 * for elements that should remain visible as the user scrolls, such as "back to top" buttons or
 * floating action buttons.
 *
 * @link https://mantine.dev/core/affix/
 *
 * @property mixed $position Position object with top, left, bottom, right properties ({ top?: number; left?: number; bottom?: number; right?: number })
 * @property mixed $zIndex CSS z-index property
 * @property mixed $classNames Custom class names for Affix elements
 * @property mixed $styles Custom styles for Affix elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-affix :position="['bottom' => 20, 'right' => 20]">
 *     <x-mantine-button>Back to top</x-mantine-button>
 * </x-mantine-affix>
 * ```
 *
 * @example With Custom Styles
 * ```blade
 * <x-mantine-affix
 *     :position="['top' => 20, 'left' => 20]"
 *     :z-index="1000"
 *     :styles="['button' => ['backgroundColor' => '#000']]"
 * >
 *     <x-mantine-button>Floating Action</x-mantine-button>
 * </x-mantine-affix>
 * ```
 *
 * @example With Multiple Positions
 * ```blade
 * <x-mantine-affix
 *     :position="[
 *         'bottom' => ['base' => 20, 'sm' => 40],
 *         'right' => ['base' => 20, 'sm' => 40]
 *     ]"
 * >
 *     <x-mantine-action-icon size="xl" variant="filled">
 *         <i class="fas fa-arrow-up"></i>
 *     </x-mantine-action-icon>
 * </x-mantine-affix>
 * ```
 */
class Affix extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $position Fixed position configuration
     * @param mixed $zIndex Stack order in relation to other elements
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $position = null,
        public mixed $zIndex = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'position' => $position,
            'zIndex' => $zIndex,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
