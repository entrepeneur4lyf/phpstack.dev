<?php

namespace MantineLivewire\Components;

/**
 * VisuallyHidden component - hides content visually while keeping it accessible to screen readers.
 *
 * This component makes content invisible to sighted users while maintaining accessibility
 * for screen readers. It's useful for providing additional context to assistive technologies
 * without affecting the visual layout.
 *
 * @see https://mantine.dev/core/visually-hidden/
 *
 * @example Basic usage for screen reader text
 * ```blade
 * <x-mantine-visually-hidden>
 *     This text is only visible to screen readers
 * </x-mantine-visually-hidden>
 * ```
 *
 * @example With form labels
 * ```blade
 * <div class="icon-button">
 *     <button>
 *         <x-icon name="search" />
 *         <x-mantine-visually-hidden>
 *             Search website
 *         </x-mantine-visually-hidden>
 *     </button>
 * </div>
 * ```
 *
 * @example With custom styling
 * ```blade
 * <x-mantine-visually-hidden
 *     :styles="[
 *         'root' => [
 *             'position' => 'absolute'
 *         ]
 *     ]"
 * >
 *     Skip to main content
 * </x-mantine-visually-hidden>
 * ```
 */
class VisuallyHidden extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $classNames Custom class names for the component
     * @param mixed $styles Custom styles for the component
     */
    public function __construct(
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
