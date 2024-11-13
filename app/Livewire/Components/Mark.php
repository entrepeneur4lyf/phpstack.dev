<?php

namespace MantineLivewire\Components;

/**
 * Mark Component
 *
 * The Mark component is used to highlight parts of text. It renders text within 
 * a colored highlight background.
 *
 * @link https://mantine.dev/core/mark/
 *
 * @property mixed $color Background color from theme or any valid CSS color value
 * @property mixed $classNames Custom class names for mark elements
 * @property mixed $styles Custom styles for mark elements
 *
 * @example Basic Usage
 * ```blade
 * <p>
 *     This is <x-mantine-mark>highlighted</x-mantine-mark> text
 * </p>
 * ```
 *
 * @example Custom Color
 * ```blade
 * <p>
 *     This is <x-mantine-mark color="red.3">red highlighted</x-mantine-mark> text
 * </p>
 * ```
 */
class Mark extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $color = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
