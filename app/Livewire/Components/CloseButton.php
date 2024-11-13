<?php

namespace App\Livewire\Components;

/**
 * CloseButton Component
 *
 * The CloseButton component is a simple button used to close or dismiss elements.
 * It typically appears as an "X" icon and can be used in modals, alerts, or any
 * other component that requires a close action.
 *
 * @link https://mantine.dev/core/close-button/
 *
 * @property mixed $variant Visual variant ('filled', 'light', 'outline', etc.)
 * @property mixed $size Size of the button ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $icon Custom icon to display
 * @property mixed $iconSize Size of the icon in px
 * @property bool|null $disabled Disables button interactions
 * @property mixed $onClick Function called when button is clicked
 * @property string|null $ariaLabel Accessibility label for the button
 * @property mixed $component Underlying element to render ('button', 'a', etc.)
 * @property mixed $href URL if the button should be a link
 * @property mixed $target Link target attribute
 * @property mixed $rel Link rel attribute
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-close-button
 *     :on-click="fn() => closeModal()"
 *     aria-label="Close modal"
 * />
 * ```
 *
 * @example With Custom Icon
 * ```blade
 * <x-mantine-close-button
 *     :icon="'<i class=\"fas fa-times\"></i>'"
 *     variant="light"
 *     size="lg"
 * />
 * ```
 */
class CloseButton extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $variant Visual style variant
     * @param mixed $size Button size
     * @param mixed $radius Border radius
     * @param mixed $icon Custom icon
     * @param mixed $iconSize Icon size
     * @param bool|null $disabled Disabled state
     * @param mixed $onClick Click handler
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $component Underlying element
     * @param mixed $href Link URL
     * @param mixed $target Link target
     * @param mixed $rel Link rel attribute
     */
    public function __construct(
        public ?string $variant = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $icon = null,
        public mixed $iconSize = null,
        public ?bool $disabled = null,
        public mixed $onClick = null,
        public ?string $ariaLabel = null,
        public mixed $component = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
    ) {
        parent::__construct();

        $this->props = [
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'icon' => $icon,
            'iconSize' => $iconSize,
            'disabled' => $disabled,
            'onClick' => $onClick,
            'aria-label' => $ariaLabel,
            'component' => $component,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
        ];
    }
}
