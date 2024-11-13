<?php

namespace MantineLivewire\Components;

/**
 * Button Component
 *
 * The Button component is a fundamental interactive element used for triggering actions.
 * It supports various styles, states, and configurations to meet different UI requirements.
 *
 * @link https://mantine.dev/core/button/
 *
 * @property mixed $variant Visual variant ('filled', 'light', 'outline', 'transparent', 'white', 'default', 'subtle', 'gradient')
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $gradient Gradient configuration for gradient variant ({ from: string; to: string; deg: number })
 * @property mixed $size Button size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $fullWidth Makes button take full width of container
 * @property mixed $disabled Disables button interactions
 * @property mixed $loading Shows loading state with a Loader component
 * @property mixed $loaderProps Props spread to Loader component in loading state
 * @property mixed $leftSection Content rendered on the left side of button label
 * @property mixed $rightSection Content rendered on the right side of button label
 * @property mixed $justify Content horizontal alignment ('center', 'left', 'right')
 * @property mixed $component Underlying element to render ('button', 'a', etc.)
 * @property mixed $href URL if the button should be a link
 * @property mixed $target Link target attribute
 * @property mixed $rel Link rel attribute
 * @property mixed $type Button type attribute
 * @property mixed $form Form id if button is outside of form element
 * @property mixed $onClick Click event handler
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-button variant="filled" color="blue">
 *     Click me
 * </x-mantine-button>
 * ```
 *
 * @example With Loading State
 * ```blade
 * <x-mantine-button
 *     :loading="true"
 *     variant="outline"
 *     :loader-props="['size' => 'sm']"
 * >
 *     Processing...
 * </x-mantine-button>
 * ```
 *
 * @example As Link
 * ```blade
 * <x-mantine-button
 *     component="a"
 *     href="https://example.com"
 *     target="_blank"
 *     variant="light"
 * >
 *     Visit site
 * </x-mantine-button>
 * ```
 */
class Button extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $variant Visual style variant
     * @param mixed $color Button color
     * @param mixed $gradient Gradient configuration
     * @param mixed $size Button size
     * @param mixed $radius Border radius
     * @param mixed $fullWidth Take full width
     * @param mixed $disabled Disabled state
     * @param mixed $loading Loading state
     * @param mixed $loaderProps Loader configuration
     * @param mixed $leftSection Left section content
     * @param mixed $rightSection Right section content
     * @param mixed $justify Content alignment
     * @param mixed $component Underlying element
     * @param mixed $href Link URL
     * @param mixed $target Link target
     * @param mixed $rel Link rel attribute
     * @param mixed $type Button type
     * @param mixed $form Form id
     * @param mixed $onClick Click handler
     */
    public function __construct(
        public mixed $variant = null,
        public mixed $color = null,
        public mixed $gradient = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $fullWidth = null,
        public mixed $disabled = null,
        public mixed $loading = null,
        public mixed $loaderProps = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public mixed $justify = null,
        public mixed $component = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
        public mixed $type = null,
        public mixed $form = null,
        public mixed $onClick = null,
    ) {
        parent::__construct();

        $this->props = [
            'variant' => $variant,
            'color' => $color,
            'gradient' => $gradient,
            'size' => $size,
            'radius' => $radius,
            'fullWidth' => $fullWidth,
            'disabled' => $disabled,
            'loading' => $loading,
            'loaderProps' => $loaderProps,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'justify' => $justify,
            'component' => $component,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
            'type' => $type,
            'form' => $form,
            'onClick' => $onClick,
        ];
    }

    /**
     * Get the styles required for this component.
     */
    protected function getStyles(): array
    {
        return [
            '@mantine/core/styles.css',
            '@mantine/core/styles/Button.css',
        ];
    }
}
