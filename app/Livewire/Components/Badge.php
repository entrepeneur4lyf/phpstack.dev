<?php

namespace App\Livewire\Components;

/**
 * Badge Component
 *
 * The Badge component is used to highlight status, labels, or categories. It's commonly used
 * to display tags, statuses, or other short pieces of metadata.
 *
 * @link https://mantine.dev/core/badge/
 *
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $variant Visual variant ('filled', 'light', 'outline', 'dot', 'transparent', 'white', 'gradient')
 * @property mixed $size Size of badge ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $gradient Gradient configuration for gradient variant ({ from: string; to: string; deg: number })
 * @property mixed $leftSection Content rendered on the left side of badge
 * @property mixed $rightSection Content rendered on the right side of badge
 * @property mixed $circle Makes badge circular
 * @property mixed $fullWidth Makes badge take full width of container
 * @property mixed $autoContrast Automatically sets text color based on background
 * @property mixed $component Underlying element to render ('div', 'span', etc.)
 * @property mixed $classNames Custom class names for badge elements
 * @property mixed $styles Custom styles for badge elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-badge color="blue">
 *     New feature
 * </x-mantine-badge>
 * ```
 *
 * @example With Different Variants
 * ```blade
 * <x-mantine-badge variant="filled" color="red">
 *     Urgent
 * </x-mantine-badge>
 * 
 * <x-mantine-badge variant="outline" color="green">
 *     Completed
 * </x-mantine-badge>
 * ```
 *
 * @example With Gradient
 * ```blade
 * <x-mantine-badge
 *     variant="gradient"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan']"
 * >
 *     Gradient badge
 * </x-mantine-badge>
 * ```
 */
class Badge extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $color Badge color
     * @param mixed $variant Visual style variant
     * @param mixed $size Badge size
     * @param mixed $radius Border radius
     * @param mixed $gradient Gradient configuration
     * @param mixed $leftSection Left section content
     * @param mixed $rightSection Right section content
     * @param mixed $circle Make badge circular
     * @param mixed $fullWidth Take full width
     * @param mixed $autoContrast Auto text contrast
     * @param mixed $component Underlying element
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $color = null,
        public mixed $variant = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $gradient = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $circle = null,
        public mixed $fullWidth = null,
        public mixed $autoContrast = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'gradient' => $gradient,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'circle' => $circle,
            'fullWidth' => $fullWidth,
            'autoContrast' => $autoContrast,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}