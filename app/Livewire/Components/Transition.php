<?php

namespace MantineLivewire\Components;

/**
 * Transition component for adding animations to elements.
 *
 * The Transition component provides smooth animations when elements enter or exit the DOM.
 * It supports various transition effects and allows fine-tuning of animation parameters.
 *
 * @see https://mantine.dev/core/transition/
 *
 * @example Basic fade transition
 * ```blade
 * <x-mantine-transition
 *     :mounted="$isVisible"
 *     transition="fade"
 *     :duration="400"
 * >
 *     <div>Content to animate</div>
 * </x-mantine-transition>
 * ```
 *
 * @example Custom slide transition
 * ```blade
 * <x-mantine-transition
 *     :mounted="$isVisible"
 *     transition="slide-up"
 *     :duration="300"
 *     timingFunction="ease"
 *     :enterDelay="200"
 * >
 *     <div>Sliding content</div>
 * </x-mantine-transition>
 * ```
 *
 * @example With transition events
 * ```blade
 * <x-mantine-transition
 *     :mounted="$isVisible"
 *     transition="scale"
 *     :onEntered="$onTransitionComplete"
 *     :keepMounted="true"
 * >
 *     <div>Scaled content</div>
 * </x-mantine-transition>
 * ```
 */
class Transition extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $mounted Controls component visibility
     * @param mixed $transition Name of the transition effect
     * @param mixed $duration Animation duration in ms
     * @param mixed $timingFunction CSS timing function for the animation
     * @param mixed $enterDelay Delay before enter animation in ms
     * @param mixed $exitDelay Delay before exit animation in ms
     * @param mixed $keepMounted Keep component mounted when hidden
     * @param mixed $onEnter Callback fired when enter transition starts
     * @param mixed $onExit Callback fired when exit transition starts
     * @param mixed $onEntered Callback fired when enter transition ends
     * @param mixed $onExited Callback fired when exit transition ends
     * @param mixed $classNames Custom class names for transition elements
     * @param mixed $styles Custom styles for transition elements
     */
    public function __construct(
        public mixed $mounted = null,
        public mixed $transition = null,
        public mixed $duration = null,
        public mixed $timingFunction = null,
        public mixed $enterDelay = null,
        public mixed $exitDelay = null,
        public mixed $keepMounted = null,
        public mixed $onEnter = null,
        public mixed $onExit = null,
        public mixed $onEntered = null,
        public mixed $onExited = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'mounted' => $mounted,
            'transition' => $transition,
            'duration' => $duration,
            'timingFunction' => $timingFunction,
            'enterDelay' => $enterDelay,
            'exitDelay' => $exitDelay,
            'keepMounted' => $keepMounted,
            'onEnter' => $onEnter,
            'onExit' => $onExit,
            'onEntered' => $onEntered,
            'onExited' => $onExited,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
