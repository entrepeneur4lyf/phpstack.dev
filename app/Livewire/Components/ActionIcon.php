<?php

namespace MantineLivewire\Components;

/**
 * ActionIcon Component
 *
 * ActionIcon is a component that displays a clickable icon. It's commonly used for buttons 
 * that only contain an icon without text, such as close buttons, toggle buttons, or toolbar actions.
 *
 * @link https://mantine.dev/core/action-icon/
 *
 * @property string|null $variant Visual variant of the button ('filled', 'light', 'outline', 'transparent', 'white', 'default', 'subtle', 'gradient')
 * @property mixed $color Color from theme.colors or any valid CSS color value
 * @property mixed $gradient Gradient configuration for gradient variant ({ from: string; to: string; deg: number })
 * @property mixed $size Icon size ('xs', 'sm', 'md', 'lg', 'xl' or number)
 * @property string|null $radius Border radius from theme.radius or number to set value in px
 * @property bool|null $disabled Disables button interactions
 * @property bool|null $loading Shows loading state with a Loader component
 * @property mixed $loaderProps Props spread to Loader component in loading state
 * @property bool|null $autoContrast Automatically sets text color based on background
 * @property mixed $component Underlying element to render ('button', 'a', etc.)
 * @property string|null $ariaLabel Accessibility label for the button
 * @property mixed $onClick Click event handler
 * @property mixed $href URL if the button should be a link
 * @property mixed $target Link target attribute
 * @property mixed $rel Link rel attribute
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-action-icon
 *     variant="filled"
 *     color="blue"
 *     size="lg"
 *     radius="xl"
 * >
 *     <i class="fas fa-heart"></i>
 * </x-mantine-action-icon>
 * ```
 *
 * @example With Loading State
 * ```blade
 * <x-mantine-action-icon
 *     :loading="true"
 *     variant="light"
 *     color="teal"
 *     :loader-props="['size' => 'xs']"
 * >
 *     <i class="fas fa-save"></i>
 * </x-mantine-action-icon>
 * ```
 *
 * @example As Link
 * ```blade
 * <x-mantine-action-icon
 *     component="a"
 *     href="https://example.com"
 *     target="_blank"
 *     variant="subtle"
 *     color="gray"
 * >
 *     <i class="fas fa-external-link"></i>
 * </x-mantine-action-icon>
 * ```
 *
 * @example With Gradient
 * ```blade
 * <x-mantine-action-icon
 *     variant="gradient"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan']"
 *     size="xl"
 * >
 *     <i class="fas fa-star"></i>
 * </x-mantine-action-icon>
 * ```
 */
class ActionIcon extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $variant Visual style variant
     * @param mixed $color Button color
     * @param mixed $gradient Gradient configuration
     * @param mixed $size Button size
     * @param string|null $radius Border radius
     * @param bool|null $disabled Whether button is disabled
     * @param bool|null $loading Whether button is in loading state
     * @param mixed $loaderProps Props for loader component
     * @param bool|null $autoContrast Auto text color contrast
     * @param mixed $component Underlying element type
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $onClick Click handler
     * @param mixed $href Link URL
     * @param mixed $target Link target
     * @param mixed $rel Link rel attribute
     */
    public function __construct(
        public ?string $variant = null,
        public mixed $color = null,
        public mixed $gradient = null,
        public mixed $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public ?bool $loading = null,
        public mixed $loaderProps = null,
        public ?bool $autoContrast = null,
        public mixed $component = null,
        public ?string $ariaLabel = null,
        public mixed $onClick = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
    ) {
        parent::__construct();

        $this->props = [
            'variant' => $variant,
            'color' => $color,
            'gradient' => $gradient,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'loading' => $loading,
            'loaderProps' => $loaderProps,
            'autoContrast' => $autoContrast,
            'component' => $component,
            'aria-label' => $ariaLabel,
            'onClick' => $onClick,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
        ];
    }
}
