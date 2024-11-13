<?php

namespace App\Livewire\Components;

/**
 * Code Component
 *
 * The Code component is used to display inline or block code snippets. It provides
 * proper styling and formatting for code content with optional syntax highlighting.
 *
 * @link https://mantine.dev/core/code/
 *
 * @property mixed $block Display as a block element with padding
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $variant Visual variant ('filled', 'light', 'outline', 'transparent')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $classNames Custom class names for code elements
 * @property mixed $styles Custom styles for code elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-code>npm install @mantine/core</x-mantine-code>
 * ```
 *
 * @example Block Code
 * ```blade
 * <x-mantine-code :block="true" color="blue">
 *     function hello() {
 *         console.log('Hello world!');
 *     }
 * </x-mantine-code>
 * ```
 *
 * @example With Custom Variant
 * ```blade
 * <x-mantine-code variant="filled" color="teal" radius="md">
 *     const value = 'Hello world';
 * </x-mantine-code>
 * ```
 */
class Code extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $block Display as block
     * @param mixed $color Code color
     * @param mixed $variant Visual style
     * @param mixed $radius Border radius
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $block = null,
        public mixed $color = null,
        public mixed $variant = null,
        public mixed $radius = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'block' => $block,
            'color' => $color,
            'variant' => $variant,
            'radius' => $radius,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
