<?php

namespace App\Livewire\Components;

/**
 * Spoiler component for hiding long content with a "show more" button.
 *
 * The Spoiler component is used to hide long content that can be revealed by clicking
 * a button. It's useful for collapsing long text sections, descriptions, or any content
 * that might take up too much vertical space initially.
 *
 * @see https://mantine.dev/core/spoiler/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-spoiler
 *     max-height={100}
 *     show-label="Show more"
 *     hide-label="Hide"
 * >
 *     {{ $longText }}
 * </x-mantine-spoiler>
 * ```
 *
 * @example With custom initial state
 * ```blade
 * <x-mantine-spoiler
 *     :expanded="true"
 *     max-height={150}
 *     show-label="Expand"
 *     hide-label="Collapse"
 * >
 *     {{ $content }}
 * </x-mantine-spoiler>
 * ```
 *
 * @example With custom transition
 * ```blade
 * <x-mantine-spoiler
 *     :transition-duration={300}
 *     max-height={200}
 *     show-label="Read more"
 *     hide-label="Show less"
 * >
 *     {{ $article }}
 * </x-mantine-spoiler>
 * ```
 */
class Spoiler extends MantineComponent
{
    /**
     * Create a new Spoiler component instance.
     *
     * @param int|null $maxHeight Maximum height of collapsed content in pixels
     * @param string|null $showLabel Label for button that shows content
     * @param string|null $hideLabel Label for button that hides content
     * @param bool|null $expanded Initial spoiler state
     * @param mixed|null $onExpandedChange Callback function called when spoiler state changes
     * @param int|null $transitionDuration Duration of transition in milliseconds
     * @param mixed|null $controlRef Ref object to get button element
     * @param array|null $classNames Object of class names for subcomponents
     * @param array|null $styles Object of styles for subcomponents
     */
    public function __construct(
        public mixed $maxHeight = null,
        public mixed $showLabel = null,
        public mixed $hideLabel = null,
        public mixed $expanded = null,
        public mixed $onExpandedChange = null,
        public mixed $transitionDuration = null,
        public mixed $controlRef = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'maxHeight' => $maxHeight,
            'showLabel' => $showLabel,
            'hideLabel' => $hideLabel,
            'expanded' => $expanded,
            'onExpandedChange' => $onExpandedChange,
            'transitionDuration' => $transitionDuration,
            'controlRef' => $controlRef,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
