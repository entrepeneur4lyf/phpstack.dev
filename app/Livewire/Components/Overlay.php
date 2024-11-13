<?php

namespace MantineLivewire\Components;

/**
 * Overlay component for creating a layer over other content.
 *
 * The Overlay component adds a customizable layer on top of other elements,
 * useful for modal backgrounds, loading states, or dimming content.
 *
 * @see https://mantine.dev/core/overlay/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-overlay
 *     :background-opacity="0.6"
 *     :blur="2"
 * />
 * ```
 *
 * @example With gradient
 * ```blade
 * <x-mantine-overlay
 *     :gradient="'linear-gradient(145deg, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0) 100%)'"
 *     :center="true"
 * />
 * ```
 *
 * @example Fixed position with custom z-index
 * ```blade
 * <x-mantine-overlay
 *     :fixed="true"
 *     :z-index="200"
 *     color="gray"
 * />
 * ```
 */
class Overlay extends MantineComponent
{
    /**
     * Create a new Overlay component instance.
     *
     * @param mixed $color Background color
     * @param mixed $backgroundOpacity Opacity value between 0 and 1
     * @param mixed $gradient CSS gradient value
     * @param mixed $blur Blur amount in px
     * @param mixed $center Whether to center overlay content
     * @param mixed $fixed Whether to use fixed positioning
     * @param mixed $zIndex CSS z-index property
     * @param mixed $component HTML element or component to render as
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $color = null,
        public mixed $backgroundOpacity = null,
        public mixed $gradient = null,
        public mixed $blur = null,
        public mixed $center = null,
        public mixed $fixed = null,
        public mixed $zIndex = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'backgroundOpacity' => $backgroundOpacity,
            'gradient' => $gradient,
            'blur' => $blur,
            'center' => $center,
            'fixed' => $fixed,
            'zIndex' => $zIndex,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
