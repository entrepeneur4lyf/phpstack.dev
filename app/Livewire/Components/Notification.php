<?php

namespace App\Livewire\Components;

/**
 * Notification Component
 *
 * The Notification component is used to display notifications to the user. It can include
 * a title, icon, and various customization options such as color and border.
 *
 * @link https://mantine.dev/core/notification/
 *
 * @property mixed $title Title of the notification
 * @property mixed $loading Indicates if the notification is in a loading state
 * @property mixed $withCloseButton Determines if a close button should be displayed
 * @property mixed $withBorder Determines if the notification should have a border
 * @property mixed $icon Icon displayed in the notification
 * @property mixed $color Color of the notification
 * @property mixed $radius Border radius of the notification
 * @property mixed $onClose Function called when the notification is closed
 * @property mixed $closeButtonProps Props for the close button
 * @property mixed $classNames Custom class names for notification elements
 * @property mixed $styles Custom styles for notification elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-notification title="Notification title" />
 * ```
 */
class Notification extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $title Title of the notification
     * @param mixed $loading Indicates if the notification is in a loading state
     * @param mixed $withCloseButton Determines if a close button should be displayed
     * @param mixed $withBorder Determines if the notification should have a border
     * @param mixed $icon Icon displayed in the notification
     * @param mixed $color Color of the notification
     * @param mixed $radius Border radius of the notification
     * @param mixed $onClose Function called when the notification is closed
     * @param mixed $closeButtonProps Props for the close button
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $title = null,
        public mixed $loading = null,
        public mixed $withCloseButton = null,
        public mixed $withBorder = null,
        public mixed $icon = null,
        public mixed $color = null,
        public mixed $radius = null,
        public mixed $onClose = null,
        public mixed $closeButtonProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'title' => $title,
            'loading' => $loading,
            'withCloseButton' => $withCloseButton,
            'withBorder' => $withBorder,
            'icon' => $icon,
            'color' => $color,
            'radius' => $radius,
            'onClose' => $onClose,
            'closeButtonProps' => $closeButtonProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
