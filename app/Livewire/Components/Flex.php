<?php

namespace MantineLivewire\Components;

/**
 * Flex Component
 *
 * The Flex component is used to create a flexible box layout. It allows for easy alignment,
 * justification, and spacing of child elements.
 *
 * @link https://mantine.dev/core/flex/
 *
 * @property string|null $gap Gap between child elements
 * @property string|null $justify Justification of child elements ('flex-start', 'center', 'flex-end', 'space-between', 'space-around', 'space-evenly')
 * @property string|null $align Alignment of child elements ('flex-start', 'center', 'flex-end', 'baseline', 'stretch')
 * @property string|null $wrap Wrap behavior of child elements ('nowrap', 'wrap', 'wrap-reverse')
 * @property string|null $direction Direction of child elements ('row', 'row-reverse', 'column', 'column-reverse')
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-flex gap="md" justify="center" align="center">
 *     <x-mantine-button>Button 1</x-mantine-button>
 *     <x-mantine-button>Button 2</x-mantine-button>
 * </x-mantine-flex>
 * ```
 *
 * @example With Custom Gap
 * ```blade
 * <x-mantine-flex gap="lg" direction="column">
 *     <x-mantine-text>Text 1</x-mantine-text>
 *     <x-mantine-text>Text 2</x-mantine-text>
 * </x-mantine-flex>
 * ```
 */
class Flex extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $gap Gap between child elements
     * @param string|null $justify Justification of child elements
     * @param string|null $align Alignment of child elements
     * @param string|null $wrap Wrap behavior of child elements
     * @param string|null $direction Direction of child elements
     */
    public function __construct(
        public ?string $gap = null,
        public ?string $justify = null,
        public ?string $align = null,
        public ?string $wrap = null,
        public ?string $direction = null,
    ) {
        parent::__construct();

        $this->props = [
            'gap' => $gap,
            'justify' => $justify,
            'align' => $align,
            'wrap' => $wrap,
            'direction' => $direction,
        ];
    }
}
