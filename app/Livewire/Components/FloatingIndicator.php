<?php

namespace App\Livewire\Components;

/**
 * FloatingIndicator Component
 *
 * The FloatingIndicator component is used to display an indicator that floats above other content.
 * It can be positioned relative to a target element and can include transition effects.
 *
 * @link https://mantine.dev/core/floating-indicator/
 *
 * @property mixed $target Target element for the indicator
 * @property mixed $parent Parent element for positioning
 * @property mixed $transitionDuration Duration of the transition
 * @property mixed $transitionTimingFunction Timing function for the transition
 * @property mixed $classNames Custom class names for the indicator
 * @property mixed $styles Custom styles for the indicator
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-floating-indicator target="#my-element">
 *     <x-mantine-text>Indicator Text</x-mantine-text>
 * </x-mantine-floating-indicator>
 * ```
 *
 * @example With Transition
 * ```blade
 * <x-mantine-floating-indicator
 *     target="#my-element"
 *     transition-duration="300"
 *     transition-timing-function="ease"
 * >
 *     <x-mantine-text>Indicator with Transition</x-mantine-text>
 * </x-mantine-floating-indicator>
 * ```
 */
class FloatingIndicator extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $target Target element
     * @param mixed $parent Parent element
     * @param mixed $transitionDuration Duration of transition
     * @param mixed $transitionTimingFunction Timing function for transition
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $target = null,
        public mixed $parent = null,
        public mixed $transitionDuration = null,
        public mixed $transitionTimingFunction = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'target' => $target,
            'parent' => $parent,
            'transitionDuration' => $transitionDuration,
            'transitionTimingFunction' => $transitionTimingFunction,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
