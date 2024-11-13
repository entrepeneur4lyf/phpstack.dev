<?php

namespace App\Livewire\Components;

/**
 * Avatar Component
 *
 * The Avatar component displays a profile picture, user initials, or fallback icon.
 * It's commonly used in user interfaces to represent users visually.
 *
 * @link https://mantine.dev/core/avatar/
 *
 * @property mixed $src Image source URL
 * @property mixed $alt Alternative text for image
 * @property mixed $name Name used to generate initials
 * @property mixed $color Color from theme or custom CSS color
 * @property mixed $variant Visual variant ('filled', 'light', 'outline', 'transparent', 'white', 'gradient')
 * @property mixed $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $size Size of avatar ('xs', 'sm', 'md', 'lg', 'xl' or number)
 * @property mixed $gradient Gradient configuration for gradient variant ({ from: string; to: string; deg: number })
 * @property mixed $allowedInitialsColors Array of colors used to generate initials background
 * @property mixed $component Underlying element to render ('div', 'span', etc.)
 * @property mixed $classNames Custom class names for avatar elements
 * @property mixed $styles Custom styles for avatar elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-avatar
 *     src="path/to/image.jpg"
 *     alt="User avatar"
 *     size="md"
 * />
 * ```
 *
 * @example With Initials
 * ```blade
 * <x-mantine-avatar
 *     name="John Doe"
 *     color="blue"
 *     radius="xl"
 * />
 * ```
 *
 * @example With Gradient
 * ```blade
 * <x-mantine-avatar
 *     variant="gradient"
 *     :gradient="['from' => 'indigo', 'to' => 'cyan']"
 *     size="lg"
 * >
 *     JD
 * </x-mantine-avatar>
 * ```
 */
class Avatar extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $src Image source
     * @param mixed $alt Alt text
     * @param mixed $name User name for initials
     * @param mixed $color Avatar color
     * @param mixed $variant Visual style variant
     * @param mixed $radius Border radius
     * @param mixed $size Avatar size
     * @param mixed $gradient Gradient configuration
     * @param mixed $allowedInitialsColors Allowed colors for initials
     * @param mixed $component Underlying element
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $src = null,
        public mixed $alt = null,
        public mixed $name = null,
        public mixed $color = null,
        public mixed $variant = null,
        public mixed $radius = null,
        public mixed $size = null,
        public mixed $gradient = null,
        public mixed $allowedInitialsColors = null,
        public mixed $component = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'src' => $src,
            'alt' => $alt,
            'name' => $name,
            'color' => $color,
            'variant' => $variant,
            'radius' => $radius,
            'size' => $size,
            'gradient' => $gradient,
            'allowedInitialsColors' => $allowedInitialsColors,
            'component' => $component,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * AvatarGroup Component
 *
 * The AvatarGroup component displays a list of avatars that are stacked together.
 * It's commonly used to show a group of users or participants.
 *
 * @link https://mantine.dev/core/avatar/
 *
 * @property mixed $spacing Space between avatars in px
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-avatar-group :spacing="8">
 *     <x-mantine-avatar src="user1.jpg" />
 *     <x-mantine-avatar src="user2.jpg" />
 *     <x-mantine-avatar>+3</x-mantine-avatar>
 * </x-mantine-avatar-group>
 * ```
 *
 * @example With Different Sizes
 * ```blade
 * <x-mantine-avatar-group :spacing="4">
 *     <x-mantine-avatar size="lg" src="user1.jpg" />
 *     <x-mantine-avatar size="lg" src="user2.jpg" />
 *     <x-mantine-avatar size="lg" variant="filled" color="gray">
 *         +5
 *     </x-mantine-avatar>
 * </x-mantine-avatar-group>
 * ```
 */
class AvatarGroup extends MantineComponent
{
    /**
     * Create a new AvatarGroup instance.
     *
     * @param mixed $spacing Space between avatars
     */
    public function __construct(
        public mixed $spacing = null,
    ) {
        parent::__construct();

        $this->props = [
            'spacing' => $spacing,
        ];
    }
}
