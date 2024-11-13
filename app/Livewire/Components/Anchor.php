<?php

namespace App\Livewire\Components;

/**
 * Anchor Component
 *
 * The Anchor component is used to create links with Mantine theme styles. It supports all
 * HTML anchor attributes and includes additional styling options for typography and visual appearance.
 *
 * @link https://mantine.dev/core/anchor/
 *
 * @property mixed $component Underlying element to render ('a', 'button', etc.)
 * @property mixed $href URL the link points to
 * @property mixed $target Link target attribute ('_blank', '_self', etc.)
 * @property mixed $rel Link relationship attribute
 * @property mixed $underline Controls link underline ('always', 'hover', 'never')
 * @property mixed $variant Visual variant ('text', 'gradient', 'filled', etc.)
 * @property mixed $gradient Gradient configuration for gradient variant ({ from: string; to: string; deg: number })
 * @property mixed $size Font size from theme or number for value in px
 * @property mixed $fw Font weight property
 * @property mixed $fz Font size property
 * @property mixed $lh Line height property
 * @property mixed $fs Font style property
 * @property mixed $lts Letter spacing property
 * @property mixed $ta Text align property
 * @property mixed $tt Text transform property
 * @property mixed $td Text decoration property
 * @property mixed $onClick Click event handler
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-anchor href="https://example.com">
 *     Visit our website
 * </x-mantine-anchor>
 * ```
 *
 * @example With Custom Styling
 * ```blade
 * <x-mantine-anchor
 *     href="#"
 *     underline="hover"
 *     size="lg"
 *     fw="bold"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan']"
 *     variant="gradient"
 * >
 *     Gradient link
 * </x-mantine-anchor>
 * ```
 *
 * @example External Link
 * ```blade
 * <x-mantine-anchor
 *     href="https://example.com"
 *     target="_blank"
 *     rel="noopener noreferrer"
 *     :underline="true"
 * >
 *     External link
 * </x-mantine-anchor>
 * ```
 *
 * @example With Typography Styles
 * ```blade
 * <x-mantine-anchor
 *     href="#"
 *     fz="xl"
 *     fw="500"
 *     tt="uppercase"
 *     lts="0.1em"
 * >
 *     Styled link
 * </x-mantine-anchor>
 * ```
 */
class Anchor extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $component Element type to render
     * @param mixed $href Link URL
     * @param mixed $target Link target
     * @param mixed $rel Link relationship
     * @param mixed $underline Underline style
     * @param mixed $variant Visual style variant
     * @param mixed $gradient Gradient configuration
     * @param mixed $size Font size
     * @param mixed $fw Font weight
     * @param mixed $fz Font size
     * @param mixed $lh Line height
     * @param mixed $fs Font style
     * @param mixed $lts Letter spacing
     * @param mixed $ta Text align
     * @param mixed $tt Text transform
     * @param mixed $td Text decoration
     * @param mixed $onClick Click handler
     */
    public function __construct(
        public mixed $component = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
        public mixed $underline = null,
        public mixed $variant = null,
        public mixed $gradient = null,
        public mixed $size = null,
        public mixed $fw = null,
        public mixed $fz = null,
        public mixed $lh = null,
        public mixed $fs = null,
        public mixed $lts = null,
        public mixed $ta = null,
        public mixed $tt = null,
        public mixed $td = null,
        public mixed $onClick = null,
    ) {
        parent::__construct();

        $this->props = [
            'component' => $component,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
            'underline' => $underline,
            'variant' => $variant,
            'gradient' => $gradient,
            'size' => $size,
            'fw' => $fw,
            'fz' => $fz,
            'lh' => $lh,
            'fs' => $fs,
            'lts' => $lts,
            'ta' => $ta,
            'tt' => $tt,
            'td' => $td,
            'onClick' => $onClick,
        ];
    }
}
