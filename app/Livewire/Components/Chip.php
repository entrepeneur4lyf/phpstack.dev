<?php

namespace MantineLivewire\Components;

/**
 * Chip Component
 *
 * The Chip component is an interactive element used for multiple or single selection.
 * It's commonly used for filtering, tags, or option selection in a more visual way.
 *
 * @link https://mantine.dev/core/chip/
 *
 * @property mixed $checked Current checked state
 * @property mixed $defaultChecked Default value for uncontrolled state
 * @property mixed $onChange Function called when value changes
 * @property mixed $variant Visual variant ('filled', 'outline')
 * @property mixed $size Chip size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $disabled Disables chip interactions
 * @property mixed $icon Custom check icon
 * @property mixed $wrapperProps Props spread to wrapper element
 * @property mixed $classNames Custom class names for chip elements
 * @property mixed $styles Custom styles for chip elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-chip :default-checked="true">
 *     Basic chip
 * </x-mantine-chip>
 * ```
 *
 * @example With Custom Icon
 * ```blade
 * <x-mantine-chip
 *     :icon="'<i class=\"fas fa-check\"></i>'"
 *     variant="outline"
 * >
 *     Custom icon chip
 * </x-mantine-chip>
 * ```
 */
class Chip extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $checked Current state
     * @param mixed $defaultChecked Default state
     * @param mixed $onChange Change handler
     * @param mixed $variant Visual style
     * @param mixed $size Chip size
     * @param mixed $radius Border radius
     * @param mixed $color Chip color
     * @param mixed $disabled Disabled state
     * @param mixed $icon Custom icon
     * @param mixed $wrapperProps Wrapper props
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $checked = null,
        public mixed $defaultChecked = null,
        public mixed $onChange = null,
        public mixed $variant = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $color = null,
        public mixed $disabled = null,
        public mixed $icon = null,
        public mixed $wrapperProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'checked' => $checked,
            'defaultChecked' => $defaultChecked,
            'onChange' => $onChange,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'color' => $color,
            'disabled' => $disabled,
            'icon' => $icon,
            'wrapperProps' => $wrapperProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
