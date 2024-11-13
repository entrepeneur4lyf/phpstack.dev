<?php

namespace MantineLivewire\Components;

/**
 * Text component for displaying and styling text content.
 *
 * The Text component is a versatile text container that provides extensive typography
 * and styling options. It can be used to render paragraphs, headings, and inline text
 * with consistent styling across your application.
 *
 * @see https://mantine.dev/core/text/
 *
 * @example Basic usage with different sizes and colors
 * ```blade
 * <x-mantine-text size="xl" fw="bold">Large bold text</x-mantine-text>
 * <x-mantine-text size="sm" c="dimmed">Small dimmed text</x-mantine-text>
 * <x-mantine-text td="underline" c="blue">Underlined blue text</x-mantine-text>
 * ```
 *
 * @example Gradient and truncate
 * ```blade
 * <x-mantine-text
 *     variant="gradient"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan', 'deg' => 45]"
 * >
 *     Gradient text
 * </x-mantine-text>
 * <x-mantine-text :truncate="true">
 *     This very long text will be truncated with an ellipsis
 * </x-mantine-text>
 * ```
 *
 * @example Text alignment and line clamping
 * ```blade
 * <x-mantine-text ta="center">Centered text</x-mantine-text>
 * <x-mantine-text :line-clamp="2">
 *     This text will be clamped after two lines. Any additional content
 *     will be hidden with an ellipsis.
 * </x-mantine-text>
 * ```
 */
class Text extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $size Text size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $fw Font weight (100-900)
     * @param mixed $fs Font style ('italic', 'normal')
     * @param mixed $td Text decoration ('underline', 'line-through', 'none')
     * @param mixed $tt Text transform ('uppercase', 'lowercase', 'capitalize')
     * @param mixed $c Text color (any valid Mantine color)
     * @param mixed $ta Text alignment ('left', 'center', 'right', 'justify')
     * @param mixed $variant Text variant ('text', 'gradient')
     * @param mixed $gradient Gradient configuration for gradient variant
     * @param mixed $truncate Enable text truncation
     * @param mixed $lineClamp Number of lines to show before clamping
     * @param mixed $inherit Inherit styles from parent element
     * @param mixed $span Render as span instead of div
     * @param mixed $component Override root element
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $size = null,
        public mixed $fw = null,
        public mixed $fs = null,
        public mixed $td = null,
        public mixed $tt = null,
        public mixed $c = null,
        public mixed $ta = null,
        public mixed $variant = null,
        public mixed $gradient = null,
        public mixed $truncate = null,
        public mixed $lineClamp = null,
        public mixed $inherit = null,
        public mixed $span = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'fw' => $fw,
            'fs' => $fs,
            'td' => $td,
            'tt' => $tt,
            'c' => $c,
            'ta' => $ta,
            'variant' => $variant,
            'gradient' => $gradient,
            'truncate' => $truncate,
            'lineClamp' => $lineClamp,
            'inherit' => $inherit,
            'span' => $span,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
