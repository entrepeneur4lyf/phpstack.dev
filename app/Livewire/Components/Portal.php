<?php

namespace App\Livewire\Components;

/**
 * Portal component for rendering content outside the current DOM hierarchy.
 *
 * The Portal component allows rendering children into a DOM node that exists outside 
 * the DOM hierarchy of the parent component, useful for modals, dropdowns, and tooltips.
 *
 * @see https://mantine.dev/core/portal/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-portal>
 *     <div>This content will be rendered outside the parent DOM tree</div>
 * </x-mantine-portal>
 * ```
 *
 * @example With custom target
 * ```blade
 * <x-mantine-portal target="#modal-root">
 *     <div>This content will be rendered in the specified target element</div>
 * </x-mantine-portal>
 * ```
 *
 * @example Conditional rendering
 * ```blade
 * <x-mantine-portal :within-portal="$shouldRenderInPortal">
 *     <div>Content that may or may not be rendered in a portal</div>
 * </x-mantine-portal>
 * ```
 */
class Portal extends MantineComponent
{
    /**
     * Create a new Portal component instance.
     *
     * @param string|null $target CSS selector or DOM element where content should be rendered
     * @param bool|null $withinPortal Whether content should be rendered within portal
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $target = null,
        public mixed $withinPortal = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'target' => $target,
            'withinPortal' => $withinPortal,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * OptionalPortal component for conditional portal rendering.
 *
 * The OptionalPortal component provides the ability to conditionally render content
 * either within a portal or in the regular DOM hierarchy based on the withinPortal prop.
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-optional-portal :within-portal="true">
 *     <div>This will be rendered in a portal</div>
 * </x-mantine-optional-portal>
 * ```
 *
 * @example Conditional portal rendering
 * ```blade
 * <x-mantine-optional-portal :within-portal="$condition">
 *     <div>Content that may or may not be in a portal based on condition</div>
 * </x-mantine-optional-portal>
 * ```
 */
class OptionalPortal extends MantineComponent
{
    /**
     * Create a new OptionalPortal component instance.
     *
     * @param bool|null $withinPortal Whether content should be rendered within portal
     * @param string|null $target CSS selector or DOM element where content should be rendered
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $withinPortal = null,
        public mixed $target = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'withinPortal' => $withinPortal,
            'target' => $target,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
