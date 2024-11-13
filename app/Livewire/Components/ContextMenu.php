<?php

namespace MantineLivewire\Components;

/**
 * ContextMenu Component
 *
 * A desktop-grade context menu component that enhances UI with right-click functionality.
 * Automatically adapts to dark/light themes and provides a rich set of customization options.
 *
 * @link https://icflorescu.github.io/mantine-contextmenu/
 *
 * @property mixed $items Array of menu items with properties: key, icon, title, onClick, disabled
 * @property mixed $shadow Shadow from theme.shadows or CSS value
 * @property mixed $offset Distance between target and menu in px
 * @property mixed $position Position relative to cursor ('bottom' or 'right')
 * @property mixed $zIndex Z-index CSS property
 * @property mixed $classNames Custom class names for menu elements
 * @property mixed $styles Custom styles for menu elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-context-menu
 *   :items="[
 *     [
 *       'key' => 'copy',
 *       'icon' => '<i class="fas fa-copy"></i>',
 *       'title' => 'Copy to clipboard',
 *       'onClick' => 'copyToClipboard()',
 *     ],
 *     [
 *       'key' => 'download',
 *       'icon' => '<i class="fas fa-download"></i>', 
 *       'title' => 'Download',
 *       'onClick' => 'downloadItem()',
 *     ]
 *   ]"
 * >
 *   <div>Right click me!</div>
 * </x-mantine-context-menu>
 * ```
 */
class ContextMenu extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $items Menu items configuration
     * @param mixed $shadow Shadow value
     * @param mixed $offset Distance from cursor
     * @param mixed $position Menu position
     * @param mixed $zIndex Stack order
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $items = null,
        public mixed $shadow = null,
        public mixed $offset = null,
        public mixed $position = null,
        public mixed $zIndex = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'items' => $items,
            'shadow' => $shadow,
            'offset' => $offset,
            'position' => $position,
            'zIndex' => $zIndex,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * ContextMenuItem Component
 *
 * Represents a single item within the context menu.
 *
 * @property mixed $key Unique identifier for the item
 * @property mixed $icon Optional icon element
 * @property mixed $title Item text content
 * @property mixed $onClick Click handler function
 * @property mixed $disabled Whether the item is disabled
 */
class ContextMenuItem extends MantineComponent
{
    /**
     * Create a new ContextMenuItem instance.
     *
     * @param mixed $key Unique identifier
     * @param mixed $icon Optional icon element
     * @param mixed $title Item text
     * @param mixed $onClick Click handler
     * @param mixed $disabled Disabled state
     */
    public function __construct(
        public mixed $key = null,
        public mixed $icon = null,
        public mixed $title = null,
        public mixed $onClick = null,
        public mixed $disabled = null,
    ) {
        parent::__construct();

        $this->props = [
            'key' => $key,
            'icon' => $icon,
            'title' => $title,
            'onClick' => $onClick,
            'disabled' => $disabled,
        ];
    }
}
