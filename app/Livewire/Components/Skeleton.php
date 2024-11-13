<?php

namespace MantineLivewire\Components;

/**
 * Skeleton component for creating loading placeholders.
 *
 * The Skeleton component is used to create loading placeholder previews for content
 * that will appear eventually. It's particularly useful for improving perceived
 * performance and providing visual feedback during data loading.
 *
 * @see https://mantine.dev/core/skeleton/
 *
 * @example Basic usage with different shapes
 * ```blade
 * <x-mantine-skeleton height={50} width={200} />
 * <x-mantine-skeleton :circle="true" height={80} />
 * ```
 *
 * @example Controlled visibility with animation
 * ```blade
 * <x-mantine-skeleton
 *     :visible="$isLoading"
 *     height={20}
 *     width="70%"
 *     :animate="true"
 * >
 *     <div>Content that will be shown once loaded</div>
 * </x-mantine-skeleton>
 * ```
 *
 * @example Custom styling with radius
 * ```blade
 * <x-mantine-skeleton
 *     height={100}
 *     radius="lg"
 *     :styles="[
 *         'root' => ['backgroundColor' => '#f1f3f5']
 *     ]"
 * />
 * ```
 */
class Skeleton extends MantineComponent
{
    /**
     * Create a new Skeleton component instance.
     *
     * @param mixed $visible Whether the content should be shown instead of skeleton
     * @param mixed $height Height of skeleton
     * @param mixed $width Width of skeleton
     * @param mixed $radius Border radius from theme.radius or number for px value
     * @param mixed $circle Whether to render as circle, ignores radius if true
     * @param mixed $animate Whether to show animation
     * @param mixed $classNames Object of class names for subcomponents
     * @param mixed $styles Object of styles for subcomponents
     */
    public function __construct(
        public mixed $visible = null,
        public mixed $height = null,
        public mixed $width = null,
        public mixed $radius = null,
        public mixed $circle = null,
        public mixed $animate = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'visible' => $visible,
            'height' => $height,
            'width' => $width,
            'radius' => $radius,
            'circle' => $circle,
            'animate' => $animate,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
