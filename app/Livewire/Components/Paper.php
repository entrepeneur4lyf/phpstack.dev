<?php

namespace MantineLivewire\Components;

/**
 * Paper component for creating surface containers.
 *
 * The Paper component is a surface container that provides a flexible foundation for building
 * content sections with optional shadows, borders, and radius styles.
 *
 * @see https://mantine.dev/core/paper/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-paper
 *     :shadow="md"
 *     :p="md"
 * >
 *     Your content here
 * </x-mantine-paper>
 * ```
 *
 * @example With custom styling
 * ```blade
 * <x-mantine-paper
 *     :with-border="true"
 *     :radius="lg"
 *     :p="xl"
 * >
 *     Content with border and large radius
 * </x-mantine-paper>
 * ```
 *
 * @example As custom element
 * ```blade
 * <x-mantine-paper
 *     component="article"
 *     :shadow="sm"
 *     :p="md"
 * >
 *     Article content
 * </x-mantine-paper>
 * ```
 */
class Paper extends MantineComponent
{
    /**
     * Create a new Paper component instance.
     *
     * @param mixed $shadow Box-shadow from theme or any valid CSS value
     * @param mixed $radius Border-radius from theme or number for px value
     * @param mixed $withBorder Adds 1px border with theme.colors.gray[3] color
     * @param mixed $p Padding from theme or number for px value
     * @param mixed $component HTML element or component to render as
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $shadow = null,
        public mixed $radius = null,
        public mixed $withBorder = null,
        public mixed $p = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'shadow' => $shadow,
            'radius' => $radius,
            'withBorder' => $withBorder,
            'p' => $p,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
