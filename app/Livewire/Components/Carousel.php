<?php

namespace App\Livewire\Components;

/**
 * Carousel Component
 *
 * The Carousel component creates a slideshow for cycling through elements like images,
 * slides, or cards. It supports various navigation options, animations, and responsive layouts.
 *
 * @link https://mantine.dev/core/carousel/
 *
 * @property mixed $withIndicators Show slide indicators
 * @property mixed $withControls Show next/previous controls
 * @property mixed $slideSize Size of each slide ('100%', '50%', etc.)
 * @property mixed $slideGap Space between slides from theme or number for px value
 * @property mixed $orientation Carousel orientation ('horizontal' or 'vertical')
 * @property mixed $slidesToScroll Number of slides to scroll at once
 * @property mixed $align Slides alignment ('start', 'center', 'end')
 * @property mixed $includeGapInSize Include gap in slide size calculations
 * @property mixed $height Height of the carousel
 * @property mixed $controlsOffset Offset of controls from carousel edges
 * @property mixed $dragFree Enable one-by-one sliding
 * @property mixed $loop Enable infinite looping
 * @property mixed $plugins Array of Embla Carousel plugins
 * @property mixed $initialSlide Initial active slide
 * @property mixed $getEmblaApi Function to get Embla API instance
 * @property mixed $nextControlIcon Custom next control icon
 * @property mixed $previousControlIcon Custom previous control icon
 * @property mixed $classNames Custom class names for carousel elements
 * @property mixed $styles Custom styles for carousel elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-carousel :with-indicators="true" height="200">
 *     <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
 *     <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
 *     <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
 * </x-mantine-carousel>
 * ```
 *
 * @example With Custom Slide Size
 * ```blade
 * <x-mantine-carousel
 *     slide-size="70%"
 *     slide-gap="md"
 *     :loop="true"
 *     align="start"
 * >
 *     <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
 *     <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
 * </x-mantine-carousel>
 * ```
 */
class Carousel extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $withIndicators Show indicators
     * @param mixed $withControls Show controls
     * @param mixed $slideSize Slide size
     * @param mixed $slideGap Gap between slides
     * @param mixed $orientation Carousel direction
     * @param mixed $slidesToScroll Slides to scroll
     * @param mixed $align Slides alignment
     * @param mixed $includeGapInSize Include gap in size
     * @param mixed $height Carousel height
     * @param mixed $controlsOffset Controls offset
     * @param mixed $dragFree Enable drag free
     * @param mixed $loop Enable looping
     * @param mixed $plugins Carousel plugins
     * @param mixed $initialSlide Initial slide
     * @param mixed $getEmblaApi Get API function
     * @param mixed $nextControlIcon Next icon
     * @param mixed $previousControlIcon Previous icon
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $withIndicators = null,
        public mixed $withControls = null,
        public mixed $slideSize = null,
        public mixed $slideGap = null,
        public mixed $orientation = null,
        public mixed $slidesToScroll = null,
        public mixed $align = null,
        public mixed $includeGapInSize = null,
        public mixed $height = null,
        public mixed $controlsOffset = null,
        public mixed $dragFree = null,
        public mixed $loop = null,
        public mixed $plugins = null,
        public mixed $initialSlide = null,
        public mixed $getEmblaApi = null,
        public mixed $nextControlIcon = null,
        public mixed $previousControlIcon = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'withIndicators' => $withIndicators,
            'withControls' => $withControls,
            'slideSize' => $slideSize,
            'slideGap' => $slideGap,
            'orientation' => $orientation,
            'slidesToScroll' => $slidesToScroll,
            'align' => $align,
            'includeGapInSize' => $includeGapInSize,
            'height' => $height,
            'controlsOffset' => $controlsOffset,
            'dragFree' => $dragFree,
            'loop' => $loop,
            'plugins' => $plugins,
            'initialSlide' => $initialSlide,
            'getEmblaApi' => $getEmblaApi,
            'nextControlIcon' => $nextControlIcon,
            'previousControlIcon' => $previousControlIcon,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
