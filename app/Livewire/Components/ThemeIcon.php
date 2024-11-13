<?php

namespace MantineLivewire\Components;

/**
 * ThemeIcon component for displaying icons with consistent styling.
 *
 * The ThemeIcon component creates a colored circular container for icons, ensuring
 * consistent styling and presentation across your application. It supports various
 * sizes, colors, and gradient options.
 *
 * @see https://mantine.dev/core/theme-icon/
 *
 * @example Basic usage with different variants
 * ```blade
 * <x-mantine-theme-icon size="lg" color="blue">
 *     <!-- Icon content -->
 * </x-mantine-theme-icon>
 * <x-mantine-theme-icon variant="light" color="green" radius="md">
 *     <!-- Icon content -->
 * </x-mantine-theme-icon>
 * ```
 *
 * @example With gradient
 * ```blade
 * <x-mantine-theme-icon
 *     variant="gradient"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan', 'deg' => 45]"
 *     size="xl"
 * >
 *     <!-- Icon content -->
 * </x-mantine-theme-icon>
 * ```
 *
 * @example Custom styling
 * ```blade
 * <x-mantine-theme-icon
 *     size="2.5rem"
 *     radius="lg"
 *     :autoContrast="true"
 *     color="violet"
 * >
 *     <!-- Icon content -->
 * </x-mantine-theme-icon>
 * ```
 */
class ThemeIcon extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $size Icon size ('xs', 'sm', 'md', 'lg', 'xl' or number)
     * @param mixed $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $variant Icon variant ('filled', 'light', 'outline', 'transparent', 'white', 'gradient')
     * @param mixed $gradient Gradient configuration for gradient variant
     * @param mixed $color Icon color (any valid Mantine color)
     * @param mixed $autoContrast Enable automatic contrast adjustment
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $variant = null,
        public mixed $gradient = null,
        public mixed $color = null,
        public mixed $autoContrast = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'radius' => $radius,
            'variant' => $variant,
            'gradient' => $gradient,
            'color' => $color,
            'autoContrast' => $autoContrast,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
