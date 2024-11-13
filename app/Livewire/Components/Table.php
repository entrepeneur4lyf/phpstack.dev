<?php

namespace MantineLivewire\Components;

/**
 * Table component for displaying data in a structured grid format.
 *
 * The Table component provides a way to display data in rows and columns with various styling options
 * and features like striped rows, hover effects, and sticky headers.
 *
 * @see https://mantine.dev/core/table/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-table :data="[
 *     ['name' => 'John', 'age' => 25],
 *     ['name' => 'Jane', 'age' => 30],
 * ]">
 *     <x-mantine-table-thead>
 *         <x-mantine-table-tr>
 *             <x-mantine-table-th>Name</x-mantine-table-th>
 *             <x-mantine-table-th>Age</x-mantine-table-th>
 *         </x-mantine-table-tr>
 *     </x-mantine-table-thead>
 * </x-mantine-table>
 * ```
 *
 * @example Styled table with features
 * ```blade
 * <x-mantine-table
 *     striped
 *     highlight-on-hover
 *     with-table-border
 *     with-column-borders
 * >
 *     <!-- Table content -->
 * </x-mantine-table>
 * ```
 *
 * @example Scrollable table with sticky header
 * ```blade
 * <x-mantine-table-scroll-container min-width="800">
 *     <x-mantine-table sticky-header sticky-header-offset="60">
 *         <!-- Table content -->
 *     </x-mantine-table>
 * </x-mantine-table-scroll-container>
 * ```
 */
class Table extends MantineComponent
{
    /**
     * Create a new Table component instance.
     *
     * @param mixed $data Table data array
     * @param mixed $captionSide Position of table caption ('top' or 'bottom')
     * @param mixed $horizontalSpacing Horizontal cell spacing ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $verticalSpacing Vertical cell spacing ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $fontSize Text size within table ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $striped Whether to add zebra-striping to rows
     * @param mixed $highlightOnHover Whether to highlight rows on hover
     * @param mixed $withTableBorder Whether to add border around table
     * @param mixed $withColumnBorders Whether to add borders between columns
     * @param mixed $withRowBorders Whether to add borders between rows
     * @param mixed $stickyHeader Whether to make header stick to top while scrolling
     * @param mixed $stickyHeaderOffset Offset from top for sticky header
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $data = null,
        public mixed $captionSide = null,
        public mixed $horizontalSpacing = null,
        public mixed $verticalSpacing = null,
        public mixed $fontSize = null,
        public mixed $striped = null,
        public mixed $highlightOnHover = null,
        public mixed $withTableBorder = null,
        public mixed $withColumnBorders = null,
        public mixed $withRowBorders = null,
        public mixed $stickyHeader = null,
        public mixed $stickyHeaderOffset = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'data' => $data,
            'captionSide' => $captionSide,
            'horizontalSpacing' => $horizontalSpacing,
            'verticalSpacing' => $verticalSpacing,
            'fontSize' => $fontSize,
            'striped' => $striped,
            'highlightOnHover' => $highlightOnHover,
            'withTableBorder' => $withTableBorder,
            'withColumnBorders' => $withColumnBorders,
            'withRowBorders' => $withRowBorders,
            'stickyHeader' => $stickyHeader,
            'stickyHeaderOffset' => $stickyHeaderOffset,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * Container component for tables that enables horizontal scrolling.
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-table-scroll-container min-width="800">
 *     <x-mantine-table>
 *         <!-- Table content -->
 *     </x-mantine-table>
 * </x-mantine-table-scroll-container>
 * ```
 */
class TableScrollContainer extends MantineComponent
{
    public function __construct(
        public mixed $minWidth = null,
        public mixed $type = null,
    ) {
        parent::__construct();

        $this->props = [
            'minWidth' => $minWidth,
            'type' => $type,
        ];
    }
}

/**
 * Table caption component.
 */
class TableCaption extends MantineComponent {}

/**
 * Table header container component.
 */
class TableThead extends MantineComponent {}

/**
 * Table body container component.
 */
class TableTbody extends MantineComponent {}

/**
 * Table footer container component.
 */
class TableTfoot extends MantineComponent {}

/**
 * Table row component.
 */
class TableTr extends MantineComponent {}

/**
 * Table header cell component.
 */
class TableTh extends MantineComponent {}

/**
 * Table data cell component.
 */
class TableTd extends MantineComponent {}
