<?php

namespace MantineLivewire\Components;

/**
 * Popover Component
 *
 * The Popover component is used to display content in a popover that can be positioned
 * relative to a target element. It supports various customization options such as width,
 * position, and arrow display.
 *
 * @link https://mantine.dev/core/popover/
 *
 * @property mixed $opened Determines if the popover is opened
 * @property mixed $onChange Function called when the popover is opened or closed
 * @property mixed $width Width of the popover
 * @property mixed $position Position of the popover relative to the target
 * @property mixed $offset Offset of the popover from the target
 * @property mixed $withArrow Determines if an arrow should be displayed
 * @property mixed $arrowSize Size of the arrow
 * @property mixed $arrowRadius Radius of the arrow corners
 * @property mixed $arrowPosition Position of the arrow
 * @property mixed $arrowOffset Offset of the arrow
 * @property mixed $middlewares Middlewares for positioning
 * @property mixed $disabled Disable the popover
 * @property mixed $trapFocus Trap focus within the popover
 * @property mixed $closeOnEscape Close popover on escape key
 * @property mixed $closeOnClickOutside Close popover on outside click
 * @property mixed $clickOutsideEvents Events to trigger closing on outside click
 * @property mixed $shadow Shadow of the popover
 * @property mixed $classNames Custom class names for popover elements
 * @property mixed $styles Custom styles for popover elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-popover :opened="true" width="300px">
 *     <x-mantine-popover-target>
 *         <button>Open Popover</button>
 *     </x-mantine-popover-target>
 *     <x-mantine-popover-dropdown>
 *         Popover content goes here
 *     </x-mantine-popover-dropdown>
 * </x-mantine-popover>
 * ```
 */
class Popover extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $opened Determines if the popover is opened
     * @param mixed $onChange Function called when the popover is opened or closed
     * @param mixed $width Width of the popover
     * @param mixed $position Position of the popover relative to the target
     * @param mixed $offset Offset of the popover from the target
     * @param mixed $withArrow Determines if an arrow should be displayed
     * @param mixed $arrowSize Size of the arrow
     * @param mixed $arrowRadius Radius of the arrow corners
     * @param mixed $arrowPosition Position of the arrow
     * @param mixed $arrowOffset Offset of the arrow
     * @param mixed $middlewares Middlewares for positioning
     * @param mixed $disabled Disable the popover
     * @param mixed $trapFocus Trap focus within the popover
     * @param mixed $closeOnEscape Close popover on escape key
     * @param mixed $closeOnClickOutside Close popover on outside click
     * @param mixed $clickOutsideEvents Events to trigger closing on outside click
     * @param mixed $shadow Shadow of the popover
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $opened = null,
        public mixed $onChange = null,
        public mixed $width = null,
        public mixed $position = null,
        public mixed $offset = null,
        public mixed $withArrow = null,
        public mixed $arrowSize = null,
        public mixed $arrowRadius = null,
        public mixed $arrowPosition = null,
        public mixed $arrowOffset = null,
        public mixed $middlewares = null,
        public mixed $disabled = null,
        public mixed $trapFocus = null,
        public mixed $closeOnEscape = null,
        public mixed $closeOnClickOutside = null,
        public mixed $clickOutsideEvents = null,
        public mixed $shadow = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'onChange' => $onChange,
            'width' => $width,
            'position' => $position,
            'offset' => $offset,
            'withArrow' => $withArrow,
            'arrowSize' => $arrowSize,
            'arrowRadius' => $arrowRadius,
            'arrowPosition' => $arrowPosition,
            'arrowOffset' => $arrowOffset,
            'middlewares' => $middlewares,
            'disabled' => $disabled,
            'trapFocus' => $trapFocus,
            'closeOnEscape' => $closeOnEscape,
            'closeOnClickOutside' => $closeOnClickOutside,
            'clickOutsideEvents' => $clickOutsideEvents,
            'shadow' => $shadow,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * PopoverTarget Component
 *
 * The PopoverTarget component is used to define the target element that triggers the popover.
 */
class PopoverTarget extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * PopoverDropdown Component
 *
 * The PopoverDropdown component is used to display the content of the popover.
 */
class PopoverDropdown extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
