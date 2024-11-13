<?php

namespace MantineLivewire\Components;

/**
 * Input Component
 *
 * The Input component is used to create input fields for forms. It supports various
 * configurations for size, variant, and additional features like left and right sections.
 *
 * @link https://mantine.dev/core/input/
 *
 * @property string|null $variant Visual variant ('default', 'filled', 'unstyled')
 * @property string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property string|null $radius Border radius from theme.radius or number for value in px
 * @property bool|null $disabled Disable the input
 * @property bool|null $error Show error state
 * @property mixed $component Underlying element to render
 * @property mixed $leftSection Content rendered on the left side of input
 * @property mixed $rightSection Content rendered on the right side of input
 * @property string|null $leftSectionWidth Width of the left section
 * @property string|null $rightSectionWidth Width of the right section
 * @property string|null $leftSectionPointerEvents Pointer events for left section
 * @property string|null $rightSectionPointerEvents Pointer events for right section
 * @property bool|null $pointer Show pointer events
 * @property mixed $wrapperProps Props for the wrapper element
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-input
 *     label="Your name"
 *     placeholder="Enter your name"
 * />
 * ```
 *
 * @example With Left and Right Sections
 * ```blade
 * <x-mantine-input
 *     label="Search"
 *     placeholder="Search..."
 *     left-section="<x-mantine-icon-search />"
 *     right-section="<x-mantine-button>Go</x-mantine-button>"
 * />
 * ```
 *
 * @example With Error State
 * ```blade
 * <x-mantine-input
 *     label="Email"
 *     placeholder="Enter your email"
 *     error="Invalid email address"
 * />
 * ```
 */
class Input extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $variant Visual style variant
     * @param string|null $size Input size
     * @param string|null $radius Border radius
     * @param bool|null $disabled Disabled state
     * @param bool|null $error Error state
     * @param mixed $component Underlying element
     * @param mixed $leftSection Left section content
     * @param mixed $rightSection Right section content
     * @param string|null $leftSectionWidth Width of left section
     * @param string|null $rightSectionWidth Width of right section
     * @param string|null $leftSectionPointerEvents Pointer events for left section
     * @param string|null $rightSectionPointerEvents Pointer events for right section
     * @param bool|null $pointer Show pointer events
     * @param mixed $wrapperProps Wrapper props
     */
    public function __construct(
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
        public ?bool $error = null,
        public mixed $component = null,
        public mixed $leftSection = null,
        public mixed $rightSection = null,
        public ?string $leftSectionWidth = null,
        public ?string $rightSectionWidth = null,
        public ?string $leftSectionPointerEvents = null,
        public ?string $rightSectionPointerEvents = null,
        public ?bool $pointer = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'disabled' => $disabled,
            'error' => $error,
            'component' => $component,
            'leftSection' => $leftSection,
            'rightSection' => $rightSection,
            'leftSectionWidth' => $leftSectionWidth,
            'rightSectionWidth' => $rightSectionWidth,
            'leftSectionPointerEvents' => $leftSectionPointerEvents,
            'rightSectionPointerEvents' => $rightSectionPointerEvents,
            'pointer' => $pointer,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
