<?php

namespace App\Livewire\Components;

/**
 * Dialog Component
 *
 * The Dialog component is used to display modal dialogs. It can contain any content and provides
 * options for customization, including size, position, and close behavior.
 *
 * @link https://mantine.dev/core/dialog/
 *
 * @property mixed $opened Controls the visibility of the dialog
 * @property mixed $position Position of the dialog ('top', 'center', 'bottom', etc.)
 * @property mixed $size Size of the dialog ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $withCloseButton Show close button
 * @property mixed $onClose Function called when the dialog is closed
 * @property mixed $withBorder Show border around the dialog
 * @property mixed $classNames Custom class names for dialog elements
 * @property mixed $styles Custom styles for dialog elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-dialog :opened="true" on-close="handleClose">
 *     <x-mantine-title>Dialog Title</x-mantine-title>
 *     <x-mantine-text>Dialog content goes here.</x-mantine-text>
 * </x-mantine-dialog>
 * ```
 *
 * @example With Close Button
 * ```blade
 * <x-mantine-dialog :opened="true" with-close-button="true" on-close="handleClose">
 *     <x-mantine-title>Dialog Title</x-mantine-title>
 *     <x-mantine-text>Dialog content goes here.</x-mantine-text>
 * </x-mantine-dialog>
 * ```
 */
class Dialog extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $opened Controls visibility
     * @param mixed $position Position of the dialog
     * @param mixed $size Size of the dialog
     * @param mixed $radius Border radius
     * @param mixed $withCloseButton Show close button
     * @param mixed $onClose Close handler
     * @param mixed $withBorder Show border
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $opened = null,
        public mixed $position = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $withCloseButton = null,
        public mixed $onClose = null,
        public mixed $withBorder = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'position' => $position,
            'size' => $size,
            'radius' => $radius,
            'withCloseButton' => $withCloseButton,
            'onClose' => $onClose,
            'withBorder' => $withBorder,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
