<?php

namespace App\Livewire\Components;

/**
 * Alert Component
 *
 * The Alert component is used to display important messages to the user. It supports
 * different variants and can include a title, icon, and close button for dismissible alerts.
 *
 * @link https://mantine.dev/core/alert/
 *
 * @property mixed $title Title of the alert
 * @property mixed $icon Icon displayed next to the title
 * @property mixed $variant Visual variant ('light', 'filled', 'outline', 'transparent', 'white', 'default')
 * @property mixed $color Color from theme.colors or any valid CSS color
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $withCloseButton Determines if close button should be displayed
 * @property mixed $closeButtonLabel Aria-label for close button
 * @property mixed $onClose Function called when close button is clicked
 * @property mixed $classNames Custom class names for alert elements
 * @property mixed $styles Custom styles for alert elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-alert
 *     title="Alert title"
 *     variant="filled"
 *     color="blue"
 * >
 *     Something important has happened
 * </x-mantine-alert>
 * ```
 *
 * @example With Icon and Close Button
 * ```blade
 * <x-mantine-alert
 *     title="Check your email"
 *     :icon="'<i class=\"fas fa-envelope\"></i>'"
 *     :with-close-button="true"
 *     variant="outline"
 *     color="teal"
 * >
 *     We've sent you a confirmation email
 * </x-mantine-alert>
 * ```
 *
 * @example Error Alert
 * ```blade
 * <x-mantine-alert
 *     title="Submission failed"
 *     :icon="'<i class=\"fas fa-exclamation-circle\"></i>'"
 *     variant="filled"
 *     color="red"
 *     radius="md"
 * >
 *     There was an error processing your request
 * </x-mantine-alert>
 * ```
 */
class Alert extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $title Alert title
     * @param mixed $icon Icon element
     * @param mixed $variant Visual style variant
     * @param mixed $color Alert color
     * @param mixed $radius Border radius
     * @param mixed $withCloseButton Show close button
     * @param mixed $closeButtonLabel Close button accessibility label
     * @param mixed $onClose Close button click handler
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $title = null,
        public mixed $icon = null,
        public mixed $variant = null,
        public mixed $color = null,
        public mixed $radius = null,
        public mixed $withCloseButton = null,
        public mixed $closeButtonLabel = null,
        public mixed $onClose = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'title' => $title,
            'icon' => $icon,
            'variant' => $variant,
            'color' => $color,
            'radius' => $radius,
            'withCloseButton' => $withCloseButton,
            'closeButtonLabel' => $closeButtonLabel,
            'onClose' => $onClose,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
