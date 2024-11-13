<?php

namespace MantineLivewire\Components;

/**
 * TypographyStylesProvider component for applying consistent text styling.
 *
 * This component provides a way to apply Mantine's typography styles to any content.
 * It's particularly useful when you need to style raw HTML content or markdown
 * with Mantine's typography rules.
 *
 * @see https://mantine.dev/core/typography-styles-provider/
 *
 * @example Basic usage with HTML content
 * ```blade
 * <x-mantine-typography-styles-provider>
 *     <div>
 *         <h1>Title</h1>
 *         <p>This text will use Mantine's typography styles</p>
 *     </div>
 * </x-mantine-typography-styles-provider>
 * ```
 *
 * @example With custom styles
 * ```blade
 * <x-mantine-typography-styles-provider
 *     :styles="[
 *         'root' => [
 *             'fontSize' => '16px',
 *             'lineHeight' => 1.7
 *         ]
 *     ]"
 * >
 *     <article>
 *         {!! $markdownContent !!}
 *     </article>
 * </x-mantine-typography-styles-provider>
 * ```
 *
 * @example Styling markdown content
 * ```blade
 * <x-mantine-typography-styles-provider
 *     :classNames="['root' => 'markdown-content']"
 * >
 *     {!! Str::markdown($content) !!}
 * </x-mantine-typography-styles-provider>
 * ```
 */
class TypographyStylesProvider extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $classNames Custom class names for typography elements
     * @param mixed $styles Custom styles for typography elements
     */
    public function __construct(
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
