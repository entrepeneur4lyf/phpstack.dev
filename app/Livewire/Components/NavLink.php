<?php

namespace MantineLivewire\Components;

/**
 * NavLink component for creating navigation links with various styling options.
 *
 * The NavLink component is designed for navigation menus and sidebars, providing
 * a consistent look and feel with support for icons, descriptions, and nested navigation.
 *
 * @see https://mantine.dev/core/nav-link/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-nav-link
 *     label="Dashboard"
 *     :left-section="'🏠'"
 *     href="/dashboard"
 *     :active="request()->is('dashboard')"
 * />
 * ```
 *
 * @example With description and sections
 * ```blade
 * <x-mantine-nav-link
 *     label="Settings"
 *     description="Manage your preferences"
 *     :left-section="'⚙️'"
 *     :right-section="'→'"
 *     :variant="'filled'"
 *     :color="'blue'"
 * />
 * ```
 *
 * @example Nested navigation
 * ```blade
 * <x-mantine-nav-link
 *     label="User Management"
 *     :default-opened="true"
 *     :children-offset="12"
 * >
 *     <x-mantine-nav-link label="Users" href="/users" />
 *     <x-mantine-nav-link label="Roles" href="/roles" />
 * </x-mantine-nav-link>
 * ```
 */
class NavLink extends MantineComponent
{
    /**
     * Create a new NavLink component instance.
     *
     * @param mixed $label Text content of the link
     * @param mixed $description Additional description below the label
     * @param mixed $leftSection Content displayed on the left side
     * @param mixed $rightSection Content displayed on the right side
     * @param mixed $active Determines if the link is currently active
     * @param mixed $variant Visual variant of the link ('subtle', 'light', 'filled')
     * @param mixed $color Color from theme or CSS color value
     * @param mixed $autoContrast Automatically set color contrast
     * @param mixed $disabled Disables the link
     * @param mixed $childrenOffset Left padding for nested items in px
     * @param mixed $defaultOpened Initial opened state for links with children
     * @param mixed $opened Controlled opened state
     * @param mixed $onChange Called when opened state changes
     * @param mixed $onClick Called when the link is clicked
     * @param mixed $component Override component element type
     * @param mixed $href URL the link points to
     * @param mixed $target Link target attribute
     * @param mixed $rel Link rel attribute
     */
    public function __construct(
        public mixed $label = null,
        public mixed $description = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $active = null,
        public mixed $variant = null,
        public mixed $color = null,
        public mixed $autoContrast = null,
        public mixed $disabled = null,
        public mixed $childrenOffset = null,
        public mixed $defaultOpened = null,
        public mixed $opened = null,
        public mixed $onChange = null,
        public mixed $onClick = null,
        public mixed $component = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'active' => $active,
            'variant' => $variant,
            'color' => $color,
            'autoContrast' => $autoContrast,
            'disabled' => $disabled,
            'childrenOffset' => $childrenOffset,
            'defaultOpened' => $defaultOpened,
            'opened' => $opened,
            'onChange' => $onChange,
            'onClick' => $onClick,
            'component' => $component,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
        ];
    }
}
