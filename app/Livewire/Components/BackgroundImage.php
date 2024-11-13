<?php

namespace MantineLivewire\Components;

/**
 * BackgroundImage Component
 *
 * The BackgroundImage component allows you to set an image as a background for its child content.
 * It provides an easy way to create visually appealing layouts with background images.
 *
 * @link https://mantine.dev/core/background-image/
 *
 * @property mixed $src Image source URL
 * @property mixed $radius Border radius from theme.radius or number to set value in px
 * @property mixed $component Underlying element to render ('div', 'section', etc.)
 * @property mixed $classNames Custom class names for background image elements
 * @property mixed $styles Custom styles for background image elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-background-image src="path/to/image.jpg">
 *     <div class="p-4 text-white">
 *         Content over background image
 *     </div>
 * </x-mantine-background-image>
 * ```
 *
 * @example With Radius
 * ```blade
 * <x-mantine-background-image
 *     src="path/to/image.jpg"
 *     radius="md"
 * >
 *     <div class="p-4 text-white">
 *         Rounded background image
 *     </div>
 * </x-mantine-background-image>
 * ```
 *
 * @example As Different Component
 * ```blade
 * <x-mantine-background-image
 *     src="path/to/image.jpg"
 *     component="section"
 * >
 *     <div class="p-4 text-white">
 *         Section with background image
 *     </div>
 * </x-mantine-background-image>
 * ```
 */
class BackgroundImage extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $src Image source URL
     * @param mixed $radius Border radius
     * @param mixed $component Underlying element type
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $src = null,
        public mixed $radius = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'src' => $src,
            'radius' => $radius,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
