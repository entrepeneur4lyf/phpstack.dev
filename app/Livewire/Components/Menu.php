<?php

namespace MantineLivewire\Components;

/**
 * Menu Component
 *
 * The Menu component displays a dropdown menu with customizable items, labels, and dividers.
 * It provides a flexible way to create navigation menus, context menus, and other dropdown interfaces.
 *
 * @link https://mantine.dev/core/menu/
 *
 * @property mixed $opened Controlled menu opened state
 * @property mixed $onChange Called when menu opened state changes
 * @property mixed $trigger Controls menu opening behavior ('click' or 'hover')
 * @property mixed $openDelay Delay before opening menu in hover mode (ms)
 * @property mixed $closeDelay Delay before closing menu in hover mode (ms)
 * @property mixed $loop Whether focus should loop through items
 * @property mixed $closeOnItemClick Close menu when item is clicked
 * @property mixed $closeOnEscape Close menu when Escape key is pressed
 * @property mixed $position Dropdown position ('top', 'bottom', 'left', 'right')
 * @property mixed $offset Dropdown offset from target in px
 * @property mixed $withArrow Show arrow pointing to target element
 * @property mixed $transitionProps Transition props for dropdown
 * @property mixed $width Width of dropdown menu
 * @property mixed $shadow Shadow from theme or CSS value
 * @property mixed $withinPortal Should menu be rendered inside Portal
 * @property mixed $trapFocus Should focus be trapped within menu
 * @property mixed $menuItemTabIndex tabIndex prop for menu items
 * @property mixed $classNames Custom class names
 * @property mixed $styles Custom styles
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-menu>
 *     <x-mantine-menu-target>
 *         <x-mantine-button>Toggle menu</x-mantine-button>
 *     </x-mantine-menu-target>
 *
 *     <x-mantine-menu-dropdown>
 *         <x-mantine-menu-label>Application</x-mantine-menu-label>
 *         <x-mantine-menu-item>Settings</x-mantine-menu-item>
 *         <x-mantine-menu-item>Messages</x-mantine-menu-item>
 *         <x-mantine-menu-divider />
 *         <x-mantine-menu-item color="red">Logout</x-mantine-menu-item>
 *     </x-mantine-menu-dropdown>
 * </x-mantine-menu>
 * ```
 */
class Menu extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $opened = null,
        public mixed $onChange = null,
        public mixed $trigger = null,
        public mixed $openDelay = null,
        public mixed $closeDelay = null,
        public mixed $loop = null,
        public mixed $closeOnItemClick = null,
        public mixed $closeOnEscape = null,
        public mixed $position = null,
        public mixed $offset = null,
        public mixed $withArrow = null,
        public mixed $transitionProps = null,
        public mixed $width = null,
        public mixed $shadow = null,
        public mixed $withinPortal = null,
        public mixed $trapFocus = null,
        public mixed $menuItemTabIndex = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'onChange' => $onChange,
            'trigger' => $trigger,
            'openDelay' => $openDelay,
            'closeDelay' => $closeDelay,
            'loop' => $loop,
            'closeOnItemClick' => $closeOnItemClick,
            'closeOnEscape' => $closeOnEscape,
            'position' => $position,
            'offset' => $offset,
            'withArrow' => $withArrow,
            'transitionProps' => $transitionProps,
            'width' => $width,
            'shadow' => $shadow,
            'withinPortal' => $withinPortal,
            'trapFocus' => $trapFocus,
            'menuItemTabIndex' => $menuItemTabIndex,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * MenuTarget Component
 *
 * Wrapper for the element that triggers menu opening. Must be a direct child of Menu component.
 */
class MenuTarget extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * MenuDropdown Component
 *
 * Container for menu items. Must be a direct child of Menu component.
 */
class MenuDropdown extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * MenuItem Component
 *
 * Interactive item within MenuDropdown. Supports icons, colors, and custom components.
 *
 * @property mixed $color Item color from theme
 * @property mixed $disabled Disable item interaction
 * @property mixed $leftSection Content displayed at left side
 * @property mixed $rightSection Content displayed at right side
 * @property mixed $component Custom component to render item
 */
class MenuItem extends MantineComponent
{
    public function __construct(
        public mixed $color = null,
        public mixed $disabled = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $component = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'disabled' => $disabled,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'component' => $component,
        ];
    }
}

/**
 * MenuLabel Component
 *
 * Non-interactive label to group menu items.
 */
class MenuLabel extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * MenuDivider Component
 *
 * Visual separator between menu items.
 */
class MenuDivider extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
