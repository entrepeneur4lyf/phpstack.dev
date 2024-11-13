<?php

namespace App\Livewire\Components;

/**
 * Group Component
 *
 * The Group component is used to create a flexbox container for grouping elements together.
 * It allows for easy alignment, justification, and spacing of child elements.
 *
 * @link https://mantine.dev/core/group/
 *
 * @property string|null $gap Gap between child elements
 * @property string|null $justify Justification of child elements ('flex-start', 'center', 'flex-end', 'space-between', 'space-around', 'space-evenly')
 * @property string|null $align Alignment of child elements ('flex-start', 'center', 'flex-end', 'baseline', 'stretch')
 * @property bool|null $wrap Wrap behavior of child elements (true or false)
 * @property bool|null $grow Allow child elements to grow to fill the container
 * @property bool|null $preventGrowOverflow Prevent overflow when growing
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-group gap="md" justify="center" align="center">
 *     <x-mantine-button>Button 1</x-mantine-button>
 *     <x-mantine-button>Button 2</x-mantine-button>
 * </x-mantine-group>
 * ```
 *
 * @example With Custom Gap
 * ```blade
 * <x-mantine-group gap="lg" wrap="true">
 *     <x-mantine-text>Text 1</x-mantine-text>
 *     <x-mantine-text>Text 2</x-mantine-text>
 * </x-mantine-group>
 * ```
 */
class Group extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $gap Gap between child elements
     * @param string|null $justify Justification of child elements
     * @param string|null $align Alignment of child elements
     * @param bool|null $wrap Wrap behavior of child elements
     * @param bool|null $grow Allow child elements to grow
     * @param bool|null $preventGrowOverflow Prevent overflow
     */
    public function __construct(
        public ?string $gap = null,
        public ?string $justify = null,
        public ?string $align = null,
        public ?bool $wrap = null,
        public ?bool $grow = null,
        public ?bool $preventGrowOverflow = null,
    ) {
        parent::__construct();

        $this->props = [
            'gap' => $gap,
            'justify' => $justify,
            'align' => $align,
            'wrap' => $wrap,
            'grow' => $grow,
            'preventGrowOverflow' => $preventGrowOverflow,
        ];
    }
}
