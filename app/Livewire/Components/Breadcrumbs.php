<?php

namespace App\Livewire\Components;

/**
 * Breadcrumbs Component
 *
 * The Breadcrumbs component displays a navigation path that helps users understand their
 * current location within the application's hierarchy. It's commonly used for navigation
 * and showing the current page's location in a site's structure.
 *
 * @link https://mantine.dev/core/breadcrumbs/
 *
 * @property mixed $separator Custom separator between items
 * @property mixed $separatorMargin Space between separator and items
 * @property mixed $classNames Custom class names for breadcrumbs elements
 * @property mixed $styles Custom styles for breadcrumbs elements
 * @property mixed $unstyled Remove default styles
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-breadcrumbs>
 *     <x-mantine-anchor href="/home">Home</x-mantine-anchor>
 *     <x-mantine-anchor href="/products">Products</x-mantine-anchor>
 *     <span>Current Page</span>
 * </x-mantine-breadcrumbs>
 * ```
 *
 * @example With Custom Separator
 * ```blade
 * <x-mantine-breadcrumbs separator="→" separator-margin="lg">
 *     <x-mantine-anchor href="/home">Home</x-mantine-anchor>
 *     <x-mantine-anchor href="/products">Products</x-mantine-anchor>
 *     <span>Current Page</span>
 * </x-mantine-breadcrumbs>
 * ```
 */
class Breadcrumbs extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $separator Custom separator
     * @param mixed $separatorMargin Separator margin
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     * @param mixed $unstyled Remove default styles
     */
    public function __construct(
        public mixed $separator = null,
        public mixed $separatorMargin = null,
        public mixed $classNames = null,
        public mixed $styles = null,
        public mixed $unstyled = null,
    ) {
        parent::__construct();

        $this->props = [
            'separator' => $separator,
            'separatorMargin' => $separatorMargin,
            'classNames' => $classNames,
            'styles' => $styles,
            'unstyled' => $unstyled,
        ];
    }
}
