<?php

namespace App\Livewire\Components;

/**
 * Tabs Component
 *
 * The Tabs component is used to create a tabbed interface, allowing users to switch between
 * different views or sections of content. It supports various customization options such as
 * orientation, color, and tab activation.
 *
 * @link https://mantine.dev/core/tabs/
 *
 * @property mixed $value Current active tab value
 * @property mixed $defaultValue Default active tab value
 * @property mixed $onChange Callback function called when the active tab changes
 * @property mixed $orientation Orientation of the tabs ('horizontal' or 'vertical')
 * @property mixed $color Color of the tabs
 * @property mixed $variant Visual variant of the tabs
 * @property mixed $radius Border radius of the tabs
 * @property mixed $placement Placement of the tabs ('top', 'bottom', 'left', 'right')
 * @property mixed $grow Determines if tabs should grow to fill the available space
 * @property mixed $inverted Determines if the tabs are inverted
 * @property mixed $activateTabWithKeyboard Determines if tab activation is allowed with keyboard
 * @property mixed $allowTabDeactivation Determines if tab deactivation is allowed
 * @property mixed $keepMounted Determines if inactive tabs should be kept mounted
 * @property mixed $classNames Custom class names for tabs
 * @property mixed $styles Custom styles for tabs
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-tabs value="tab1">
 *     <x-mantine-tab value="tab1">Tab 1</x-mantine-tab>
 *     <x-mantine-tab value="tab2">Tab 2</x-mantine-tab>
 * </x-mantine-tabs>
 * ```
 */
class Tabs extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current active tab value
     * @param mixed $defaultValue Default active tab value
     * @param mixed $onChange Callback function called when the active tab changes
     * @param mixed $orientation Orientation of the tabs
     * @param mixed $color Color of the tabs
     * @param mixed $variant Visual variant of the tabs
     * @param mixed $radius Border radius of the tabs
     * @param mixed $placement Placement of the tabs
     * @param mixed $grow Determines if tabs should grow to fill the available space
     * @param mixed $inverted Determines if the tabs are inverted
     * @param mixed $activateTabWithKeyboard Determines if tab activation is allowed with keyboard
     * @param mixed $allowTabDeactivation Determines if tab deactivation is allowed
     * @param mixed $keepMounted Determines if inactive tabs should be kept mounted
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $orientation = null,
        public mixed $color = null,
        public mixed $variant = null,
        public mixed $radius = null,
        public mixed $placement = null,
        public mixed $grow = null,
        public mixed $inverted = null,
        public mixed $activateTabWithKeyboard = null,
        public mixed $allowTabDeactivation = null,
        public mixed $keepMounted = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'orientation' => $orientation,
            'color' => $color,
            'variant' => $variant,
            'radius' => $radius,
            'placement' => $placement,
            'grow' => $grow,
            'inverted' => $inverted,
            'activateTabWithKeyboard' => $activateTabWithKeyboard,
            'allowTabDeactivation' => $allowTabDeactivation,
            'keepMounted' => $keepMounted,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
