<?php

namespace MantineLivewire\Components;

/**
 * MantineList Component
 *
 * The MantineList component creates ordered and unordered lists with customizable markers and nested items.
 * It's commonly used for displaying structured content, navigation menus, or feature lists.
 *
 * @link https://mantine.dev/core/list/
 *
 * @property string|null $type List type: 'ordered' or 'unordered' (default: 'unordered')
 * @property bool|null $withPadding Determines whether list items should be offset with padding (default: false)
 * @property string|null $size Controls font-size and line-height: 'xs', 'sm', 'md', 'lg', 'xl' (default: 'md')
 * @property string|number|null $spacing Key of theme.spacing or any valid CSS value to set spacing between items (default: 0)
 * @property bool|null $center Determines whether items must be centered with their icon (default: false)
 * @property mixed $icon Icon that replaces list item dot
 * @property string|null $listStyleType Controls list-style-type CSS property, by default inferred from type
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-list>
 *     <x-mantine-list-item>First item</x-mantine-list-item>
 *     <x-mantine-list-item>Second item</x-mantine-list-item>
 * </x-mantine-list>
 * ```
 *
 * @example With Custom Icon
 * ```blade
 * <x-mantine-list
 *     :icon="'<i class=\"fas fa-check\"></i>'"
 *     size="lg"
 *     spacing="md"
 * >
 *     <x-mantine-list-item>Feature one</x-mantine-list-item>
 *     <x-mantine-list-item>Feature two</x-mantine-list-item>
 * </x-mantine-list>
 * ```
 */
class MantineList extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $type List type ('ordered' or 'unordered')
     * @param bool|null $withPadding Add padding to list items
     * @param string|null $size Font size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|number|null $spacing Space between items (theme.spacing key or CSS value)
     * @param bool|null $center Center items with icon
     * @param mixed $icon Default icon for all items
     * @param string|null $listStyleType CSS list-style-type property
     */
    public function __construct(
        public mixed $type = null,
        public mixed $withPadding = null,
        public mixed $size = null,
        public mixed $spacing = null,
        public mixed $center = null,
        public mixed $icon = null,
        public mixed $listStyleType = null,
    ) {
        parent::__construct();

        $this->props = [
            'type' => $type,
            'withPadding' => $withPadding,
            'size' => $size,
            'spacing' => $spacing,
            'center' => $center,
            'icon' => $icon,
            'listStyleType' => $listStyleType,
        ];
    }
}

/**
 * ListItem Component
 *
 * A sub-component of MantineList that represents a single list item.
 * It can contain text, icons, and other components.
 *
 * @property mixed $icon Icon to replace item bullet
 */
class ListItem extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $icon Override list icon for this item
     */
    public function __construct(
        public mixed $icon = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
        ];
    }
}
