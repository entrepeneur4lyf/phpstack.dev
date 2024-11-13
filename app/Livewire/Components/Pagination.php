<?php

namespace App\Livewire\Components;

/**
 * Pagination component for navigating through multiple pages of content.
 *
 * The Pagination component provides a user interface for navigating through paginated content,
 * with customizable controls, styling, and behavior options.
 *
 * @see https://mantine.dev/core/pagination/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-pagination
 *     :total="10"
 *     :value="1"
 * />
 * ```
 *
 * @example Customized navigation
 * ```blade
 * <x-mantine-pagination
 *     :total="20"
 *     :siblings="2"
 *     :boundaries="1"
 *     :with-edges="true"
 *     color="blue"
 * />
 * ```
 *
 * @example With custom styling and disabled state
 * ```blade
 * <x-mantine-pagination
 *     :total="5"
 *     :radius="xl"
 *     :size="lg"
 *     :disabled="false"
 *     :with-controls="true"
 * />
 * ```
 */
class Pagination extends MantineComponent
{
    /**
     * Create a new Pagination component instance.
     *
     * @param mixed $total Total number of pages
     * @param mixed $value Current page number (controlled)
     * @param mixed $defaultValue Default page number (uncontrolled)
     * @param mixed $onChange Callback fired when page changes
     * @param mixed $siblings Number of siblings to show around current page
     * @param mixed $boundaries Number of pages to show at the start/end
     * @param mixed $color Controls active item color
     * @param mixed $size Controls items size
     * @param mixed $radius Controls items border-radius
     * @param mixed $withEdges Shows/hides first/last page buttons
     * @param mixed $withControls Shows/hides prev/next buttons
     * @param mixed $disabled Disables all pagination items
     * @param mixed $autoContrast Adjusts color contrast automatically
     * @param mixed $getItemProps Function to add props to pagination items
     * @param mixed $getControlProps Function to add props to controls
     * @param mixed $nextIcon Custom next page button icon
     * @param mixed $previousIcon Custom previous page button icon
     * @param mixed $firstIcon Custom first page button icon
     * @param mixed $lastIcon Custom last page button icon
     * @param mixed $dotsIcon Custom icon for dots between pages
     */
    public function __construct(
        public mixed $total = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $siblings = null,
        public mixed $boundaries = null,
        public mixed $color = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $withEdges = null,
        public mixed $withControls = null,
        public mixed $disabled = null,
        public mixed $autoContrast = null,
        public mixed $getItemProps = null,
        public mixed $getControlProps = null,
        public mixed $nextIcon = null,
        public mixed $previousIcon = null,
        public mixed $firstIcon = null,
        public mixed $lastIcon = null,
        public mixed $dotsIcon = null,
    ) {
        parent::__construct();

        $this->props = [
            'total' => $total,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'siblings' => $siblings,
            'boundaries' => $boundaries,
            'color' => $color,
            'size' => $size,
            'radius' => $radius,
            'withEdges' => $withEdges,
            'withControls' => $withControls,
            'disabled' => $disabled,
            'autoContrast' => $autoContrast,
            'getItemProps' => $getItemProps,
            'getControlProps' => $getControlProps,
            'nextIcon' => $nextIcon,
            'previousIcon' => $previousIcon,
            'firstIcon' => $firstIcon,
            'lastIcon' => $lastIcon,
            'dotsIcon' => $dotsIcon,
        ];
    }
}
