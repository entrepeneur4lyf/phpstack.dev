<?php

namespace App\Livewire\Components;

/**
 * Tooltip component for displaying additional information on hover.
 *
 * The Tooltip component shows informative text when users hover over, focus on, or tap an element.
 * It's useful for providing additional context or explanations without cluttering the interface.
 *
 * @see https://mantine.dev/core/tooltip/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-tooltip label="Tooltip content">
 *     <button>Hover me</button>
 * </x-mantine-tooltip>
 * ```
 *
 * @example Customized tooltip
 * ```blade
 * <x-mantine-tooltip
 *     label="Custom tooltip"
 *     color="blue"
 *     position="bottom"
 *     :withArrow="true"
 *     :multiline="true"
 *     width="200"
 * >
 *     <button>Hover for styled tooltip</button>
 * </x-mantine-tooltip>
 * ```
 *
 * @example With custom delays
 * ```blade
 * <x-mantine-tooltip
 *     label="Delayed tooltip"
 *     :openDelay="500"
 *     :closeDelay="200"
 * >
 *     <button>Hover with delay</button>
 * </x-mantine-tooltip>
 * ```
 */
class Tooltip extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $label Content of the tooltip
     * @param mixed $color Tooltip background color
     * @param mixed $position Tooltip position relative to target element
     * @param mixed $offset Tooltip offset from target element in px
     * @param mixed $withArrow Determines if arrow should be shown
     * @param mixed $arrowSize Arrow size in px
     * @param mixed $arrowRadius Arrow border radius in px
     * @param mixed $arrowPosition Arrow position relative to tooltip
     * @param mixed $arrowOffset Arrow offset in px
     * @param mixed $opened Controls tooltip opened state
     * @param mixed $events List of events that trigger tooltip
     * @param mixed $multiline Allows content to wrap into multiple lines
     * @param mixed $width Sets tooltip width
     * @param mixed $inline Sets display to inline-block
     * @param mixed $transitionProps Transition properties for animations
     * @param mixed $openDelay Delay before showing tooltip in ms
     * @param mixed $closeDelay Delay before hiding tooltip in ms
     * @param mixed $refProp Prop that should be passed to the reference element
     * @param mixed $classNames Custom class names for tooltip elements
     * @param mixed $styles Custom styles for tooltip elements
     */
    /**
     * Create a new component instance.
     *
     * @param mixed $openDelay Delay before showing tooltips in ms
     * @param mixed $closeDelay Delay before hiding tooltips in ms
     */
    /**
     * Create a new component instance.
     *
     * @param mixed $label Content of the floating tooltip
     * @param mixed $color Tooltip background color
     * @param mixed $offset Tooltip offset from cursor in px
     * @param mixed $position Tooltip position relative to cursor
     * @param mixed $withArrow Determines if arrow should be shown
     * @param mixed $arrowSize Arrow size in px
     * @param mixed $arrowRadius Arrow border radius in px
     * @param mixed $arrowPosition Arrow position relative to tooltip
     * @param mixed $arrowOffset Arrow offset in px
     * @param mixed $transitionProps Transition properties for animations
     * @param mixed $classNames Custom class names for tooltip elements
     * @param mixed $styles Custom styles for tooltip elements
     */
    public function __construct(
        public mixed $label = null,
        public mixed $color = null,
        public mixed $position = null,
        public mixed $offset = null,
        public mixed $withArrow = null,
        public mixed $arrowSize = null,
        public mixed $arrowRadius = null,
        public mixed $arrowPosition = null,
        public mixed $arrowOffset = null,
        public mixed $opened = null,
        public mixed $events = null,
        public mixed $multiline = null,
        public mixed $width = null,
        public mixed $inline = null,
        public mixed $transitionProps = null,
        public mixed $openDelay = null,
        public mixed $closeDelay = null,
        public mixed $refProp = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'color' => $color,
            'position' => $position,
            'offset' => $offset,
            'withArrow' => $withArrow,
            'arrowSize' => $arrowSize,
            'arrowRadius' => $arrowRadius,
            'arrowPosition' => $arrowPosition,
            'arrowOffset' => $arrowOffset,
            'opened' => $opened,
            'events' => $events,
            'multiline' => $multiline,
            'width' => $width,
            'inline' => $inline,
            'transitionProps' => $transitionProps,
            'openDelay' => $openDelay,
            'closeDelay' => $closeDelay,
            'refProp' => $refProp,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * TooltipGroup component for managing multiple tooltips.
 *
 * The TooltipGroup component controls the behavior of multiple tooltips,
 * ensuring consistent open/close delays across a group of tooltips.
 *
 * @example Group of tooltips
 * ```blade
 * <x-mantine-tooltip-group :openDelay="300" :closeDelay="200">
 *     <x-mantine-tooltip label="First tooltip">
 *         <button>Button 1</button>
 *     </x-mantine-tooltip>
 *     <x-mantine-tooltip label="Second tooltip">
 *         <button>Button 2</button>
 *     </x-mantine-tooltip>
 * </x-mantine-tooltip-group>
 * ```
 */
class TooltipGroup extends MantineComponent
{
    public function __construct(
        public mixed $openDelay = null,
        public mixed $closeDelay = null,
    ) {
        parent::__construct();

        $this->props = [
            'openDelay' => $openDelay,
            'closeDelay' => $closeDelay,
        ];
    }
}

/**
 * TooltipFloating component for creating floating tooltips.
 *
 * The TooltipFloating component creates tooltips that follow the mouse cursor
 * within the target element, providing dynamic positioning feedback.
 *
 * @example Basic floating tooltip
 * ```blade
 * <x-mantine-tooltip-floating
 *     label="Floating tooltip"
 *     color="gray"
 * >
 *     <div class="w-32 h-32 bg-gray-100">
 *         Move cursor inside
 *     </div>
 * </x-mantine-tooltip-floating>
 * ```
 *
 * @example Styled floating tooltip
 * ```blade
 * <x-mantine-tooltip-floating
 *     label="Custom floating tooltip"
 *     :offset="10"
 *     :withArrow="true"
 *     position="right"
 * >
 *     <div class="p-4 border">
 *         Hover area
 *     </div>
 * </x-mantine-tooltip-floating>
 * ```
 */
class TooltipFloating extends MantineComponent
{
    public function __construct(
        public mixed $label = null,
        public mixed $color = null,
        public mixed $offset = null,
        public mixed $position = null,
        public mixed $withArrow = null,
        public mixed $arrowSize = null,
        public mixed $arrowRadius = null,
        public mixed $arrowPosition = null,
        public mixed $arrowOffset = null,
        public mixed $transitionProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'color' => $color,
            'offset' => $offset,
            'position' => $position,
            'withArrow' => $withArrow,
            'arrowSize' => $arrowSize,
            'arrowRadius' => $arrowRadius,
            'arrowPosition' => $arrowPosition,
            'arrowOffset' => $arrowOffset,
            'transitionProps' => $transitionProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
