<?php

namespace MantineLivewire\Components;

/**
 * NavigationProgress component for displaying a progress bar during navigation.
 *
 * The NavigationProgress component shows a progress indicator at the top of the page
 * during navigation or loading states. It's commonly used to provide visual feedback
 * during page transitions or API calls.
 *
 * @see https://mantine.dev/core/nprogress/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-navigation-progress
 *     :initial-progress="0"
 *     :color="'blue'"
 *     :height="4"
 * />
 * ```
 *
 * @example With custom styling
 * ```blade
 * <x-mantine-navigation-progress
 *     :color="'gradient'"
 *     :height="6"
 *     :radius="'xl'"
 *     :transition-duration="400"
 * />
 * ```
 *
 * @example With auto-reset and progress label
 * ```blade
 * <x-mantine-navigation-progress
 *     :auto-reset="true"
 *     :progress-label="true"
 *     :initial-progress="50"
 *     :transition-duration="500"
 * />
 * ```
 */
class NavigationProgress extends MantineComponent
{
    /**
     * Create a new NavigationProgress component instance.
     *
     * @param mixed $initialProgress Initial progress value (0-100)
     * @param mixed $color Progress bar color or gradient
     * @param mixed $height Height of the progress bar in pixels
     * @param mixed $radius Border radius of the progress bar
     * @param mixed $autoReset Automatically reset progress after completion
     * @param mixed $transitionDuration Animation duration in milliseconds
     * @param mixed $progressLabel Show progress percentage label
     * @param mixed $classNames Custom class names for styling
     * @param mixed $styles Custom styles object
     */
    public function __construct(
        public mixed $initialProgress = null,
        public mixed $color = null,
        public mixed $height = null,
        public mixed $radius = null,
        public mixed $autoReset = null,
        public mixed $transitionDuration = null,
        public mixed $progressLabel = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'initialProgress' => $initialProgress,
            'color' => $color,
            'height' => $height,
            'radius' => $radius,
            'autoReset' => $autoReset,
            'transitionDuration' => $transitionDuration,
            'progressLabel' => $progressLabel,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
