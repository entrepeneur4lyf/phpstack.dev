<?php

namespace MantineLivewire\Components;

/**
 * Stack component for vertical layouts with configurable spacing.
 *
 * The Stack component creates a vertical layout of elements with consistent spacing between them.
 * It's useful for creating forms, content sections, or any vertically arranged interface elements.
 *
 * @see https://mantine.dev/core/stack/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-stack gap="md">
 *     <div>First item</div>
 *     <div>Second item</div>
 *     <div>Third item</div>
 * </x-mantine-stack>
 * ```
 *
 * @example With alignment
 * ```blade
 * <x-mantine-stack
 *     align="center"
 *     justify="space-between"
 *     gap="xl"
 * >
 *     {{ $content }}
 * </x-mantine-stack>
 * ```
 *
 * @example With background and height
 * ```blade
 * <x-mantine-stack
 *     h="300px"
 *     bg="gray.1"
 *     gap="sm"
 * >
 *     {{ $stackContent }}
 * </x-mantine-stack>
 * ```
 */
class Stack extends MantineComponent
{
    /**
     * Create a new Stack component instance.
     *
     * @param string|null $align Vertical alignment of content ('stretch', 'center', 'flex-start', 'flex-end')
     * @param string|null $justify Content justification ('center', 'flex-start', 'flex-end', 'space-between', etc)
     * @param string|null $gap Spacing between items ('xs', 'sm', 'md', 'lg', 'xl' or number)
     * @param string|null $h Height of the stack container
     * @param string|null $bg Background color of the stack
     */
    public function __construct(
        public ?string $align = null,
        public ?string $justify = null,
        public ?string $gap = null,
        public ?string $h = null,
        public ?string $bg = null,
    ) {
        parent::__construct();

        $this->props = [
            'align' => $align,
            'justify' => $justify,
            'gap' => $gap,
            'h' => $h,
            'bg' => $bg,
        ];
    }
}
