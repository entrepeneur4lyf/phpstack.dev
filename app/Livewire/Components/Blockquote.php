<?php

namespace App\Livewire\Components;

/**
 * Blockquote Component
 *
 * The Blockquote component is used to emphasize quotes or important text snippets. It provides
 * various styling options and can include citations and custom icons.
 *
 * @link https://mantine.dev/core/blockquote/
 *
 * @property mixed $cite Citation text displayed below quote
 * @property mixed $icon Icon displayed at the start of the quote
 * @property mixed $iconSize Size of the icon in px
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $classNames Custom class names for blockquote elements
 * @property mixed $styles Custom styles for blockquote elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-blockquote
 *     cite="– Famous Person"
 *     :icon="'<i class=\"fas fa-quote-right\"></i>'"
 * >
 *     This is an important quote that needs emphasis
 * </x-mantine-blockquote>
 * ```
 *
 * @example With Custom Icon
 * ```blade
 * <x-mantine-blockquote
 *     color="blue"
 *     :icon="'<x-mantine-theme-icon variant=\"light\" color=\"blue\"><i class=\"fas fa-info\"></i></x-mantine-theme-icon>'"
 *     :icon-size="48"
 * >
 *     A quote with custom icon and color
 * </x-mantine-blockquote>
 * ```
 */
class Blockquote extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $cite Citation text
     * @param mixed $icon Icon element
     * @param mixed $iconSize Icon size in px
     * @param mixed $color Quote color
     * @param mixed $radius Border radius
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $cite = null,
        public mixed $icon = null,
        public mixed $iconSize = null,
        public mixed $color = null,
        public mixed $radius = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'cite' => $cite,
            'icon' => $icon,
            'iconSize' => $iconSize,
            'color' => $color,
            'radius' => $radius,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
