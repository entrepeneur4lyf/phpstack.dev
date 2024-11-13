<?php

namespace App\Livewire\Components;

/**
 * ScrollArea component for creating custom scrollable containers.
 *
 * The ScrollArea component provides a customizable scrollable container with
 * cross-browser compatible scrollbars that can be styled and configured.
 * It supports both vertical and horizontal scrolling with various scrollbar
 * behaviors and appearances.
 *
 * @see https://mantine.dev/core/scroll-area/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-scroll-area :h="200">
 *     <!-- Long content here -->
 *     <p>Scrollable content...</p>
 * </x-mantine-scroll-area>
 * ```
 *
 * @example Custom scrollbar styling
 * ```blade
 * <x-mantine-scroll-area
 *     type="hover"
 *     :scrollbar-size="12"
 *     :scroll-hide-delay="500"
 *     :offsetScrollbars="true"
 *     :styles="[
 *         'scrollbar' => ['background' => '#f1f1f1'],
 *         'thumb' => ['background' => '#888']
 *     ]"
 * >
 *     <!-- Content -->
 * </x-mantine-scroll-area>
 * ```
 *
 * @example With viewport reference and scroll position tracking
 * ```blade
 * <x-mantine-scroll-area
 *     :viewport-ref="'scrollViewport'"
 *     :on-scroll-position-change="'handleScroll'"
 *     :h="300"
 * >
 *     <!-- Scrollable content -->
 * </x-mantine-scroll-area>
 * ```
 */
class ScrollArea extends MantineComponent
{
    /**
     * Create a new ScrollArea component instance.
     *
     * @param string|null $type Scrollbar behavior type: 'auto', 'always', 'scroll', 'hover', or 'never'
     * @param string|null $scrollbars Which scrollbars to show: 'x', 'y', or 'xy'
     * @param bool|null $offsetScrollbars Whether to offset content to prevent scrollbars from overlapping
     * @param int|null $scrollbarSize Width of scrollbars in pixels
     * @param int|null $scrollHideDelay Delay in ms before scrollbars are hidden (for 'hover' type)
     * @param string|null $viewportRef Reference to the viewport element
     * @param mixed $onScrollPositionChange Callback function for scroll position changes
     * @param mixed $w Width of the scroll area
     * @param mixed $h Height of the scroll area
     * @param array|null $classNames Custom class names for subcomponents
     * @param array|null $styles Custom styles for subcomponents
     */
    public function __construct(
        public mixed $type = null,
        public mixed $scrollbars = null,
        public mixed $offsetScrollbars = null,
        public mixed $scrollbarSize = null,
        public mixed $scrollHideDelay = null,
        public mixed $viewportRef = null,
        public mixed $onScrollPositionChange = null,
        public mixed $w = null,
        public mixed $h = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'type' => $type,
            'scrollbars' => $scrollbars,
            'offsetScrollbars' => $offsetScrollbars,
            'scrollbarSize' => $scrollbarSize,
            'scrollHideDelay' => $scrollHideDelay,
            'viewportRef' => $viewportRef,
            'onScrollPositionChange' => $onScrollPositionChange,
            'w' => $w,
            'h' => $h,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * ScrollAreaAutosize component for creating auto-sized scrollable containers.
 *
 * The ScrollAreaAutosize component extends ScrollArea functionality with automatic
 * sizing capabilities. It adjusts its size based on content while respecting
 * maximum height and width constraints.
 *
 * @example Basic usage with max height
 * ```blade
 * <x-mantine-scroll-area-autosize :max-height="300">
 *     <!-- Content that will determine the height -->
 *     <div>Dynamic content...</div>
 * </x-mantine-scroll-area-autosize>
 * ```
 *
 * @example With width constraints
 * ```blade
 * <x-mantine-scroll-area-autosize
 *     :max-height="400"
 *     :w="500"
 *     :maw="600"
 * >
 *     <!-- Content -->
 * </x-mantine-scroll-area-autosize>
 * ```
 */
class ScrollAreaAutosize extends MantineComponent
{
    /**
     * Create a new ScrollAreaAutosize component instance.
     *
     * @param string|null $type Scrollbar behavior type: 'auto', 'always', 'scroll', 'hover', or 'never'
     * @param string|null $scrollbars Which scrollbars to show: 'x', 'y', or 'xy'
     * @param bool|null $offsetScrollbars Whether to offset content to prevent scrollbars from overlapping
     * @param int|null $scrollbarSize Width of scrollbars in pixels
     * @param int|null $scrollHideDelay Delay in ms before scrollbars are hidden (for 'hover' type)
     * @param string|null $viewportRef Reference to the viewport element
     * @param mixed $onScrollPositionChange Callback function for scroll position changes
     * @param mixed $maxHeight Maximum height of the scroll area
     * @param mixed $mah Alias for maxHeight
     * @param mixed $w Width of the scroll area
     * @param mixed $maw Maximum width of the scroll area
     * @param array|null $classNames Custom class names for subcomponents
     * @param array|null $styles Custom styles for subcomponents
     */
    public function __construct(
        public mixed $type = null,
        public mixed $scrollbars = null,
        public mixed $offsetScrollbars = null,
        public mixed $scrollbarSize = null,
        public mixed $scrollHideDelay = null,
        public mixed $viewportRef = null,
        public mixed $onScrollPositionChange = null,
        public mixed $maxHeight = null,
        public mixed $mah = null,
        public mixed $w = null,
        public mixed $maw = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'type' => $type,
            'scrollbars' => $scrollbars,
            'offsetScrollbars' => $offsetScrollbars,
            'scrollbarSize' => $scrollbarSize,
            'scrollHideDelay' => $scrollHideDelay,
            'viewportRef' => $viewportRef,
            'onScrollPositionChange' => $onScrollPositionChange,
            'maxHeight' => $maxHeight,
            'mah' => $mah,
            'w' => $w,
            'maw' => $maw,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
