<?php

namespace App\Livewire\Components;

/**
 * Box Component
 *
 * The Box component is a fundamental layout component that provides a flexible container
 * with spacing and positioning utilities. It's commonly used as a base building block
 * for custom components and layouts.
 *
 * @link https://mantine.dev/core/box/
 *
 * @property mixed $component Underlying element to render ('div', 'section', 'article', etc.)
 * @property mixed $bg Background color from theme or any valid CSS color
 * @property mixed $m Margin on all sides
 * @property mixed $mx Horizontal margin (left and right)
 * @property mixed $my Vertical margin (top and bottom)
 * @property mixed $mt Margin top
 * @property mixed $mb Margin bottom
 * @property mixed $ml Margin left
 * @property mixed $mr Margin right
 * @property mixed $p Padding on all sides
 * @property mixed $px Horizontal padding (left and right)
 * @property mixed $py Vertical padding (top and bottom)
 * @property mixed $pt Padding top
 * @property mixed $pb Padding bottom
 * @property mixed $pl Padding left
 * @property mixed $pr Padding right
 * @property mixed $classNames Custom class names for box elements
 * @property mixed $styles Custom styles for box elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-box bg="blue.5" p="xl">
 *     Content with blue background and padding
 * </x-mantine-box>
 * ```
 *
 * @example As Different Element
 * ```blade
 * <x-mantine-box
 *     component="section"
 *     p="md"
 *     m="xl"
 *     bg="gray.1"
 * >
 *     Section content with spacing
 * </x-mantine-box>
 * ```
 *
 * @example With Custom Styles
 * ```blade
 * <x-mantine-box
 *     :styles="[
 *         'root' => [
 *             'backgroundColor' => 'var(--mantine-color-blue-light)',
 *             'borderRadius' => 'var(--mantine-radius-md)',
 *         ]
 *     ]"
 * >
 *     Styled content
 * </x-mantine-box>
 * ```
 */
class Box extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $component Underlying element
     * @param mixed $bg Background color
     * @param mixed $m Margin
     * @param mixed $mx Horizontal margin
     * @param mixed $my Vertical margin
     * @param mixed $mt Margin top
     * @param mixed $mb Margin bottom
     * @param mixed $ml Margin left
     * @param mixed $mr Margin right
     * @param mixed $p Padding
     * @param mixed $px Horizontal padding
     * @param mixed $py Vertical padding
     * @param mixed $pt Padding top
     * @param mixed $pb Padding bottom
     * @param mixed $pl Padding left
     * @param mixed $pr Padding right
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $component = null,
        public mixed $bg = null,
        public mixed $m = null,
        public mixed $mx = null,
        public mixed $my = null,
        public mixed $mt = null,
        public mixed $mb = null,
        public mixed $ml = null,
        public mixed $mr = null,
        public mixed $p = null,
        public mixed $px = null,
        public mixed $py = null,
        public mixed $pt = null,
        public mixed $pb = null,
        public mixed $pl = null,
        public mixed $pr = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'component' => $component,
            'bg' => $bg,
            'm' => $m,
            'mx' => $mx,
            'my' => $my,
            'mt' => $mt,
            'mb' => $mb,
            'ml' => $ml,
            'mr' => $mr,
            'p' => $p,
            'px' => $px,
            'py' => $py,
            'pt' => $pt,
            'pb' => $pb,
            'pl' => $pl,
            'pr' => $pr,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
