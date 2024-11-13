<?php

namespace MantineLivewire\Components;

/**
 * SimpleGrid component for creating responsive grid layouts.
 *
 * The SimpleGrid component provides an easy way to create responsive grid layouts
 * with equal-width columns. It automatically adjusts the number of columns based
 * on the viewport size and supports custom spacing between items.
 *
 * @see https://mantine.dev/core/simple-grid/
 *
 * @example Basic usage with fixed columns
 * ```blade
 * <x-mantine-simple-grid :cols="3" spacing="md">
 *     <div>First</div>
 *     <div>Second</div>
 *     <div>Third</div>
 * </x-mantine-simple-grid>
 * ```
 *
 * @example Responsive columns with breakpoints
 * ```blade
 * <x-mantine-simple-grid
 *     :cols="[
 *         'base' => 1,
 *         'sm' => 2,
 *         'md' => 3,
 *         'lg' => 4
 *     ]"
 *     :spacing="['base' => 'sm', 'sm' => 'lg']"
 * >
 *     <!-- Grid items -->
 * </x-mantine-simple-grid>
 * ```
 *
 * @example With container queries and custom spacing
 * ```blade
 * <x-mantine-simple-grid
 *     type="container"
 *     :cols="4"
 *     :spacing="'xl'"
 *     :vertical-spacing="'md'"
 * >
 *     <!-- Grid items -->
 * </x-mantine-simple-grid>
 * ```
 */
class SimpleGrid extends MantineComponent
{
    /**
     * Create a new SimpleGrid component instance.
     *
     * @param int|array|null $cols Number of columns or responsive object with breakpoints
     * @param string|array|null $spacing Spacing between columns, can be responsive
     * @param string|array|null $verticalSpacing Vertical spacing between rows, can be responsive
     * @param string|null $type Set to 'container' to use container queries instead of media queries
     */
    public function __construct(
        public int|array|null $cols = null,
        public string|array|null $spacing = null,
        public string|array|null $verticalSpacing = null,
        public ?string $type = null,  // 'container' for container queries
    ) {
        parent::__construct();

        $this->props = [
            'cols' => $cols,
            'spacing' => $spacing,
            'verticalSpacing' => $verticalSpacing,
            'type' => $type,
        ];
    }
}
