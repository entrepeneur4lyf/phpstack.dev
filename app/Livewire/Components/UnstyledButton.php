<?php

namespace App\Livewire\Components;

/**
 * UnstyledButton component - a button without default browser styles.
 *
 * This component provides a button element that removes all browser default styles
 * while maintaining button functionality. It's perfect for creating custom-styled
 * buttons or interactive elements that shouldn't look like traditional buttons.
 *
 * @see https://mantine.dev/core/unstyled-button/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-unstyled-button>
 *     Custom styled button
 * </x-mantine-unstyled-button>
 * ```
 *
 * @example As a link
 * ```blade
 * <x-mantine-unstyled-button
 *     href="https://example.com"
 *     target="_blank"
 * >
 *     External link
 * </x-mantine-unstyled-button>
 * ```
 *
 * @example With custom styling and accessibility
 * ```blade
 * <x-mantine-unstyled-button
 *     :disabled="$isDisabled"
 *     aria-label="Toggle menu"
 *     role="button"
 *     class="custom-button-class"
 * >
 *     <x-icon name="menu" />
 * </x-mantine-unstyled-button>
 * ```
 */
class UnstyledButton extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $component HTML tag or component to render
     * @param mixed $onClick onClick event handler
     * @param mixed $href URL if the button should act as a link
     * @param mixed $target Link target attribute
     * @param mixed $rel Link rel attribute
     * @param mixed $type Button type attribute
     * @param mixed $disabled Whether the button is disabled
     * @param mixed $tabIndex Tab index for keyboard navigation
     * @param mixed $role ARIA role attribute
     * @param mixed $ariaLabel ARIA label for accessibility
     */
    public function __construct(
        public mixed $component = null,
        public mixed $onClick = null,
        public mixed $href = null,
        public mixed $target = null,
        public mixed $rel = null,
        public mixed $type = null,
        public mixed $disabled = null,
        public mixed $tabIndex = null,
        public mixed $role = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'component' => $component,
            'onClick' => $onClick,
            'href' => $href,
            'target' => $target,
            'rel' => $rel,
            'type' => $type,
            'disabled' => $disabled,
            'tabIndex' => $tabIndex,
            'role' => $role,
            'aria-label' => $ariaLabel,
        ];
    }
}
