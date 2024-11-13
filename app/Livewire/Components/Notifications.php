<?php

namespace MantineLivewire\Components;

/**
 * Notifications component for displaying notifications in your application.
 *
 * The Notifications component provides a system for showing temporary messages
 * to users, with support for different positions, auto-closing, and styling options.
 *
 * @see https://mantine.dev/core/notifications/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-notifications
 *     :position="'top-right'"
 *     :auto-close="5000"
 *     :limit="5"
 * />
 * ```
 *
 * @example Custom styling
 * ```blade
 * <x-mantine-notifications
 *     :position="'bottom-center'"
 *     :container-width="300"
 *     :notification-max-height="200"
 *     :z-index="1000"
 * />
 * ```
 *
 * @example With transition settings
 * ```blade
 * <x-mantine-notifications
 *     :position="'top-center'"
 *     :transition-duration="400"
 *     :auto-close="false"
 * />
 * ```
 */
class Notifications extends MantineComponent
{
    /**
     * Create a new Notifications component instance.
     *
     * @param mixed $position Position of notifications ('top-left', 'top-right', 'top-center', 'bottom-left', 'bottom-right', 'bottom-center')
     * @param mixed $autoClose False to disable auto close or number in ms
     * @param mixed $limit Maximum number of notifications displayed at a time
     * @param mixed $zIndex z-index CSS property
     * @param mixed $containerWidth Maximum width of notifications container in px
     * @param mixed $notificationMaxHeight Maximum height of single notification in px
     * @param mixed $transitionDuration Notification mount/unmount transition duration in ms
     * @param mixed $classNames Custom CSS classes for notifications container
     * @param mixed $styles Custom styles for notifications container
     */
    public function __construct(
        public mixed $position = null,
        public mixed $autoClose = null,
        public mixed $limit = null,
        public mixed $zIndex = null,
        public mixed $containerWidth = null,
        public mixed $notificationMaxHeight = null,
        public mixed $transitionDuration = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'position' => $position,
            'autoClose' => $autoClose,
            'limit' => $limit,
            'zIndex' => $zIndex,
            'containerWidth' => $containerWidth,
            'notificationMaxHeight' => $notificationMaxHeight,
            'transitionDuration' => $transitionDuration,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
