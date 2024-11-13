<?php

namespace App\Livewire\Components;

/**
 * Center Component
 *
 * The Center component centers content both vertically and horizontally. It's a simple
 * utility component that helps achieve common layout patterns with minimal code.
 *
 * @link https://mantine.dev/core/center/
 *
 * @property mixed $inline Makes the component display as inline-flex instead of flex
 * @property mixed $classNames Custom class names for center elements
 * @property mixed $styles Custom styles for center elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-center>
 *     <div>Centered content</div>
 * </x-mantine-center>
 * ```
 *
 * @example Inline Center
 * ```blade
 * <x-mantine-center :inline="true">
 *     <span>Centered inline content</span>
 * </x-mantine-center>
 * ```
 *
 * @example With Dimensions
 * ```blade
 * <x-mantine-center style="width: 400px; height: 100px;">
 *     <div>Content centered in a box</div>
 * </x-mantine-center>
 * ```
 */
class Center extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $inline Display as inline-flex
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $inline = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'inline' => $inline,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
