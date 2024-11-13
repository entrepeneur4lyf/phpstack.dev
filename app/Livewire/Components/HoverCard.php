<?php

namespace MantineLivewire\Components;

/**
 * HoverCard Component
 *
 * The HoverCard component is used to display additional information when hovering over an element.
 * It can include an arrow, customizable width, and shadow effects.
 *
 * @link https://mantine.dev/core/hover-card/
 *
 * @property mixed $width Width of the hover card
 * @property mixed $shadow Shadow of the hover card
 * @property mixed $openDelay Delay before opening the hover card
 * @property mixed $closeDelay Delay before closing the hover card
 * @property mixed $withArrow Show arrow on the hover card
 * @property mixed $position Position of the hover card ('top', 'right', 'bottom', 'left')
 * @property mixed $offset Offset from the target element
 * @property mixed $classNames Custom class names for the hover card
 * @property mixed $styles Custom styles for the hover card
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-hover-card width="200px">
 *     <x-mantine-hover-card-target>
 *         <x-mantine-button>Hover me</x-mantine-button>
 *     </x-mantine-hover-card-target>
 *     <x-mantine-hover-card-dropdown>
 *         <x-mantine-text>Additional information here</x-mantine-text>
 *     </x-mantine-hover-card-dropdown>
 * </x-mantine-hover-card>
 * ```
 *
 * @example With Arrow
 * ```blade
 * <x-mantine-hover-card with-arrow="true">
 *     <x-mantine-hover-card-target>
 *         <x-mantine-button>Hover me</x-mantine-button>
 *     </x-mantine-hover-card-target>
 *     <x-mantine-hover-card-dropdown>
 *         <x-mantine-text>Additional information here</x-mantine-text>
 *     </x-mantine-hover-card-dropdown>
 * </x-mantine-hover-card>
 * ```
 */
class HoverCard extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $width Width of the hover card
     * @param mixed $shadow Shadow of the hover card
     * @param mixed $openDelay Delay before opening
     * @param mixed $closeDelay Delay before closing
     * @param mixed $withArrow Show arrow
     * @param mixed $position Position of the hover card
     * @param mixed $offset Offset from target
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $width = null,
        public mixed $shadow = null,
        public mixed $openDelay = null,
        public mixed $closeDelay = null,
        public mixed $withArrow = null,
        public mixed $position = null,
        public mixed $offset = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'width' => $width,
            'shadow' => $shadow,
            'openDelay' => $openDelay,
            'closeDelay' => $closeDelay,
            'withArrow' => $withArrow,
            'position' => $position,
            'offset' => $offset,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * HoverCardTarget Component
 *
 * The HoverCardTarget component is used to define the target element that triggers the hover card.
 */
class HoverCardTarget extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * HoverCardDropdown Component
 *
 * The HoverCardDropdown component is used to define the content of the hover card that appears on hover.
 */
class HoverCardDropdown extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
