<?php

namespace App\Livewire\Components;

/**
 * Burger Component
 *
 * The Burger component creates an animated hamburger menu icon that toggles between open
 * and closed states. It's commonly used for mobile navigation menus and other collapsible content.
 *
 * @link https://mantine.dev/core/burger/
 *
 * @property bool|null $opened Current state of the burger (true for opened, false for closed)
 * @property mixed $size Size of burger ('xs', 'sm', 'md', 'lg', 'xl' or number)
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $lineSize Thickness of burger lines in px
 * @property mixed $transitionDuration Animation duration in ms
 * @property mixed $onClick Function called when burger is clicked
 * @property mixed $ariaLabel Accessibility label for the button
 * @property mixed $disabled Disables button interactions
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-burger
 *     :opened="$opened"
 *     :on-click="fn() => $this->toggle()"
 *     aria-label="Toggle navigation"
 * />
 * ```
 *
 * @example With Custom Styling
 * ```blade
 * <x-mantine-burger
 *     size="xl"
 *     color="blue"
 *     :line-size="3"
 *     :transition-duration="500"
 *     aria-label="Open menu"
 * />
 * ```
 */
class Burger extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param bool|null $opened Current state
     * @param mixed $size Burger size
     * @param mixed $color Burger color
     * @param mixed $lineSize Line thickness
     * @param mixed $transitionDuration Animation duration
     * @param mixed $onClick Click handler
     * @param mixed $ariaLabel Accessibility label
     * @param mixed $disabled Disabled state
     */
    public function __construct(
        public ?bool $opened = null,
        public mixed $size = null,
        public mixed $color = null,
        public mixed $lineSize = null,
        public mixed $transitionDuration = null,
        public mixed $onClick = null,
        public mixed $ariaLabel = null,
        public mixed $disabled = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'size' => $size,
            'color' => $color,
            'lineSize' => $lineSize,
            'transitionDuration' => $transitionDuration,
            'onClick' => $onClick,
            'aria-label' => $ariaLabel,
            'disabled' => $disabled,
        ];
    }
}
