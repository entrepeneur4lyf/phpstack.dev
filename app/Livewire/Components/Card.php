<?php

namespace MantineLivewire\Components;

/**
 * Card Component
 *
 * The Card component is a flexible container for displaying content in a clear and organized way.
 * It supports various content sections, interactive states, and can be used as a clickable element.
 *
 * @link https://mantine.dev/core/card/
 *
 * @property mixed $withBorder Adds border styles
 * @property mixed $shadow Box-shadow from theme.shadows or any valid CSS value
 * @property mixed $padding Padding from theme or number for value in px
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $component Underlying element to render ('div', 'a', etc.)
 * @property mixed $href URL if the card should be a link
 * @property mixed $target Link target attribute
 * @property mixed $rel Link rel attribute
 * @property mixed $classNames Custom class names for card elements
 * @property mixed $styles Custom styles for card elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-card shadow="sm" padding="lg" radius="md" :with-border="true">
 *     <x-mantine-text>Card content</x-mantine-text>
 * </x-mantine-card>
 * ```
 *
 * @example As Link
 * ```blade
 * <x-mantine-card
 *     component="a"
 *     href="https://example.com"
 *     target="_blank"
 *     shadow="md"
 * >
 *     Clickable card
 * </x-mantine-card>
 * ```
 */
class Card extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $withBorder Add border
     * @param mixed $shadow Box shadow
     * @param mixed $padding Card padding
     * @param mixed $radius Border radius
     * @param mixed $component Underlying element
     * @param mixed $href Link URL
     * @param mixed $target Link target
     * @param mixed $rel Link rel attribute
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $withBorder = null,
        public mixed $shadow = null,
        public mixed $padding = null,
        public mixed $radius = null,
        public mixed $component = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'withBorder' => $withBorder,
            'shadow' => $shadow,
            'padding' => $padding,
            'radius' => $radius,
            'component' => $component,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * CardSection Component
 *
 * A sub-component of Card that represents a distinct section within the card.
 * It can be used to create visual separation between different content areas.
 *
 * @property mixed $withBorder Adds border to the section
 * @property mixed $inheritPadding Inherits padding from parent Card
 * @property mixed $component Underlying element to render
 */
class CardSection extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $withBorder Add border
     * @param mixed $inheritPadding Inherit padding
     * @param mixed $component Underlying element
     */
    public function __construct(
        public mixed $withBorder = null,
        public mixed $inheritPadding = null,
        public mixed $component = null,
    ) {
        parent::__construct();

        $this->props = [
            'withBorder' => $withBorder,
            'inheritPadding' => $inheritPadding,
            'component' => $component,
        ];
    }
}
