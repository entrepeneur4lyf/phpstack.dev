<?php

namespace App\Livewire\Components;

/**
 * Loader Component
 *
 * The Loader component displays a loading indicator. It can be customized with different types,
 * colors, and sizes to fit the design requirements of the application.
 *
 * @link https://mantine.dev/core/loader/
 *
 * @property mixed $type The type of loader (e.g., 'bars', 'oval', etc.).
 * @property mixed $color The color of the loader.
 * @property mixed $size The size of the loader.
 * @property mixed $loaders Custom loaders to be used.
 * @property mixed $classNames Additional class names for the loader.
 * @property mixed $styles Additional styles for the loader.
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-loader type="oval" color="blue" size="lg" />
 * ```
 */
class Loader extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $type The type of loader (e.g., 'bars', 'oval', etc.).
     * @param mixed $color The color of the loader.
     * @param mixed $size The size of the loader.
     * @param mixed $loaders Custom loaders to be used.
     * @param mixed $classNames Additional class names for the loader.
     * @param mixed $styles Additional styles for the loader.
     */
    public function __construct(
        public mixed $type = null,
        public mixed $color = null,
        public mixed $size = null,
        public mixed $loaders = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'type' => $type,
            'color' => $color,
            'size' => $size,
            'loaders' => $loaders,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
