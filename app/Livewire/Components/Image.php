<?php

namespace App\Livewire\Components;

/**
 * Image Component
 *
 * The Image component is used to display images with various customization options.
 * It supports fallback images, sizing, and styling.
 *
 * @link https://mantine.dev/core/image/
 *
 * @property mixed $src Source of the image
 * @property mixed $alt Alternative text for the image
 * @property mixed $height Height of the image
 * @property mixed $width Width of the image
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $fit Fit of the image ('contain', 'cover', 'fill', etc.)
 * @property mixed $fallbackSrc Fallback image source if the main image fails to load
 * @property mixed $component Underlying element to render
 * @property mixed $classNames Custom class names for the image
 * @property mixed $styles Custom styles for the image
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-image src="path/to/image.jpg" alt="Description of image" />
 * ```
 *
 * @example With Fallback Image
 * ```blade
 * <x-mantine-image
 *     src="path/to/image.jpg"
 *     fallback-src="path/to/fallback.jpg"
 *     alt="Description of image"
 * />
 * ```
 *
 * @example With Custom Size
 * ```blade
 * <x-mantine-image
 *     src="path/to/image.jpg"
 *     width="300"
 *     height="200"
 *     alt="Description of image"
 * />
 * ```
 */
class Image extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $src Source of the image
     * @param mixed $alt Alternative text
     * @param mixed $height Height of the image
     * @param mixed $width Width of the image
     * @param mixed $radius Border radius
     * @param mixed $fit Fit of the image
     * @param mixed $fallbackSrc Fallback image source
     * @param mixed $component Underlying element
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $src = null,
        public mixed $alt = null,
        public mixed $height = null,
        public mixed $width = null,
        public mixed $radius = null,
        public mixed $fit = null,
        public mixed $fallbackSrc = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'src' => $src,
            'alt' => $alt,
            'height' => $height,
            'width' => $width,
            'radius' => $radius,
            'fit' => $fit,
            'fallbackSrc' => $fallbackSrc,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
