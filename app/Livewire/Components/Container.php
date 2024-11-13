<?php

namespace MantineLivewire\Components;

/**
 * Container Component
 *
 * The Container component centers content horizontally with a maximum width and padding.
 * It's commonly used as a main content wrapper to ensure consistent layout across different screen sizes.
 *
 * @link https://mantine.dev/core/container/
 *
 * @property mixed $fluid Remove max-width
 * @property mixed $size Container max-width ('xs', 'sm', 'md', 'lg', 'xl') or number for custom width
 * @property mixed $padding Horizontal padding ('xs', 'sm', 'md', 'lg', 'xl') or number for custom padding
 * @property mixed $classNames Custom class names for container elements
 * @property mixed $styles Custom styles for container elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-container size="sm" padding="md">
 *     Content with max width and padding
 * </x-mantine-container>
 * ```
 *
 * @example Fluid Container
 * ```blade
 * <x-mantine-container :fluid="true" padding="xl">
 *     Full width content with padding
 * </x-mantine-container>
 * ```
 *
 * @example With Custom Size
 * ```blade
 * <x-mantine-container :size="1024" padding="lg">
 *     Content with custom max width
 * </x-mantine-container>
 * ```
 */
class Container extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $fluid Remove max width
     * @param mixed $size Container width
     * @param mixed $padding Horizontal padding
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $fluid = null,
        public mixed $size = null,
        public mixed $padding = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'fluid' => $fluid,
            'size' => $size,
            'padding' => $padding,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
