<?php

namespace MantineLivewire\Components;

/**
 * Highlight Component
 *
 * The Highlight component is used to highlight specific text or elements within a block of content.
 * It provides options for customization, including color and styles.
 *
 * @link https://mantine.dev/core/highlight/
 *
 * @property mixed $highlight Text to highlight
 * @property mixed $highlightStyles Styles for the highlighted text
 * @property mixed $component Underlying element to render
 * @property mixed $color Color of the highlight
 * @property mixed $fw Font weight
 * @property mixed $c Text color
 * @property mixed $classNames Custom class names for the highlight
 * @property mixed $styles Custom styles for the highlight
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-highlight highlight="important text" />
 * ```
 *
 * @example With Custom Color
 * ```blade
 * <x-mantine-highlight highlight="highlighted text" color="yellow" />
 * ```
 */
class Highlight extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $highlight Text to highlight
     * @param mixed $highlightStyles Styles for highlighted text
     * @param mixed $component Underlying element
     * @param mixed $color Highlight color
     * @param mixed $fw Font weight
     * @param mixed $c Text color
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $highlight = null,
        public mixed $highlightStyles = null,
        public mixed $component = null,
        public mixed $color = null,
        public mixed $fw = null,
        public mixed $c = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'highlight' => $highlight,
            'highlightStyles' => $highlightStyles,
            'component' => $component,
            'color' => $color,
            'fw' => $fw,
            'c' => $c,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
