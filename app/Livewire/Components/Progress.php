<?php

namespace MantineLivewire\Components;

/**
 * Progress Component
 *
 * The Progress component is used to display the progress of a task or operation.
 * It can be customized with various properties such as value, color, and size.
 *
 * @link https://mantine.dev/core/progress/
 *
 * @property mixed $value Current progress value (between 0 and 100)
 * @property mixed $color Color of the progress bar
 * @property mixed $radius Border radius of the progress bar
 * @property mixed $size Size of the progress bar
 * @property mixed $striped Determines if the progress bar is striped
 * @property mixed $animated Determines if the progress bar is animated
 * @property mixed $transitionDuration Duration of the transition effect
 * @property mixed $ariaLabel Accessibility label for the progress bar
 * @property mixed $classNames Custom class names for the progress bar
 * @property mixed $styles Custom styles for the progress bar
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-progress value="50" />
 * ```
 */
class Progress extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current progress value (between 0 and 100)
     * @param mixed $color Color of the progress bar
     * @param mixed $radius Border radius of the progress bar
     * @param mixed $size Size of the progress bar
     * @param mixed $striped Determines if the progress bar is striped
     * @param mixed $animated Determines if the progress bar is animated
     * @param mixed $transitionDuration Duration of the transition effect
     * @param mixed $ariaLabel Accessibility label for the progress bar
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $color = null,
        public mixed $radius = null,
        public mixed $size = null,
        public mixed $striped = null,
        public mixed $animated = null,
        public mixed $transitionDuration = null,
        public mixed $ariaLabel = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'color' => $color,
            'radius' => $radius,
            'size' => $size,
            'striped' => $striped,
            'animated' => $animated,
            'transitionDuration' => $transitionDuration,
            'aria-label' => $ariaLabel,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
