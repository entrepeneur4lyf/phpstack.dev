<?php

namespace App\Livewire\Components;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;

/**
 * Image Component
 *
 * Enhanced image component with support for animations, lightbox, and gallery features.
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
 * @property string $effect Animation effect ('fade', 'scale', 'slide')
 * @property bool $animate Enable/disable animations
 * @property bool $interactive Enable interactive animations
 * @property float $ratio Aspect ratio (e.g., 1 for square, 16/9 for video)
 * @property array $images Array of image sources for gallery mode
 * @property bool $withThumbnails Show thumbnails in gallery mode
 * @property string $type Component type ('basic', 'lightbox', 'gallery')
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-image src="path/to/image.jpg" alt="Description" />
 * ```
 *
 * @example With Lightbox
 * ```blade
 * <x-mantine-image
 *     src="path/to/image.jpg"
 *     alt="Description"
 *     type="lightbox"
 * />
 * ```
 *
 * @example Gallery with Thumbnails
 * ```blade
 * <x-mantine-image
 *     :images="['image1.jpg', 'image2.jpg']"
 *     type="gallery"
 *     with-thumbnails
 * />
 * ```
 */
class Image extends MantineComponent implements HasMingles
{
    use InteractsWithMingles;

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
        public ?string $effect = 'fade',
        public bool $animate = true,
        public bool $interactive = false,
        public ?float $ratio = null,
        public ?array $images = null,
        public bool $withThumbnails = true,
        public string $type = 'basic'
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
            'effect' => $effect,
            'animate' => $animate,
            'interactive' => $interactive,
            'ratio' => $ratio,
            'images' => $images,
            'withThumbnails' => $withThumbnails
        ];
    }

    /**
     * Get the path to the React component based on type.
     */
    public function component(): string
    {
        return match ($this->type) {
            'lightbox' => 'resources/MantineLiveWire/custom/react/components/Image/Lightbox/ImageLightbox.jsx',
            'gallery' => 'resources/MantineLiveWire/custom/react/components/Image/Gallery/ImageGallery.jsx',
            default => 'resources/MantineLiveWire/custom/react/components/Image/Image.jsx',
        };
    }

    /**
     * Get the data to be passed to the React component.
     */
    public function mingleData(): array
    {
        return $this->props;
    }
}
