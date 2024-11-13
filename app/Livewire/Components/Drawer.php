<?php

namespace App\Livewire\Components;

/**
 * Drawer Component
 *
 * The Drawer component is used to display a sliding panel that can contain any content.
 * It is typically used for navigation or additional options without taking up space on the main screen.
 *
 * @link https://mantine.dev/core/drawer/
 *
 * @property mixed $opened Controls the visibility of the drawer
 * @property mixed $onClose Function called when the drawer is closed
 * @property mixed $title Title of the drawer
 * @property mixed $position Position of the drawer ('top', 'right', 'bottom', 'left')
 * @property mixed $size Size of the drawer ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $offset Offset from the edge of the screen
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $overlayProps Props for the overlay
 * @property mixed $withCloseButton Show close button
 * @property mixed $closeButtonProps Props for the close button
 * @property mixed $trapFocus Trap focus within the drawer
 * @property mixed $closeOnEscape Close drawer on escape key press
 * @property mixed $closeOnClickOutside Close drawer on outside click
 * @property mixed $returnFocus Return focus to the element that opened the drawer
 * @property mixed $scrollAreaComponent Component for scroll area
 * @property mixed $transitionProps Props for transition
 * @property mixed $removeScrollProps Remove scroll props
 * @property mixed $classNames Custom class names for the drawer
 * @property mixed $styles Custom styles for the drawer
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-drawer :opened="true" on-close="handleClose">
 *     <x-mantine-title>Drawer Title</x-mantine-title>
 *     <x-mantine-text>Drawer content goes here.</x-mantine-text>
 * </x-mantine-drawer>
 * ```
 *
 * @example With Close Button
 * ```blade
 * <x-mantine-drawer :opened="true" with-close-button="true" on-close="handleClose">
 *     <x-mantine-title>Drawer Title</x-mantine-title>
 *     <x-mantine-text>Drawer content goes here.</x-mantine-text>
 * </x-mantine-drawer>
 * ```
 */
class Drawer extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $opened Controls visibility
     * @param mixed $onClose Close handler
     * @param mixed $title Title of the drawer
     * @param mixed $position Position of the drawer
     * @param mixed $size Size of the drawer
     * @param mixed $offset Offset from the edge
     * @param mixed $radius Border radius
     * @param mixed $overlayProps Overlay props
     * @param mixed $withCloseButton Show close button
     * @param mixed $closeButtonProps Close button props
     * @param mixed $trapFocus Trap focus
     * @param mixed $closeOnEscape Close on escape
     * @param mixed $closeOnClickOutside Close on outside click
     * @param mixed $returnFocus Return focus
     * @param mixed $scrollAreaComponent Scroll area component
     * @param mixed $transitionProps Transition props
     * @param mixed $removeScrollProps Remove scroll props
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $opened = null,
        public mixed $onClose = null,
        public mixed $title = null,
        public mixed $position = null,
        public mixed $size = null,
        public mixed $offset = null,
        public mixed $radius = null,
        public mixed $overlayProps = null,
        public mixed $withCloseButton = null,
        public mixed $closeButtonProps = null,
        public mixed $trapFocus = null,
        public mixed $closeOnEscape = null,
        public mixed $closeOnClickOutside = null,
        public mixed $returnFocus = null,
        public mixed $scrollAreaComponent = null,
        public mixed $transitionProps = null,
        public mixed $removeScrollProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'onClose' => $onClose,
            'title' => $title,
            'position' => $position,
            'size' => $size,
            'offset' => $offset,
            'radius' => $radius,
            'overlayProps' => $overlayProps,
            'withCloseButton' => $withCloseButton,
            'closeButtonProps' => $closeButtonProps,
            'trapFocus' => $trapFocus,
            'closeOnEscape' => $closeOnEscape,
            'closeOnClickOutside' => $closeOnClickOutside,
            'returnFocus' => $returnFocus,
            'scrollAreaComponent' => $scrollAreaComponent,
            'transitionProps' => $transitionProps,
            'removeScrollProps' => $removeScrollProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
