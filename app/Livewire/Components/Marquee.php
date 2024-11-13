<?php

namespace App\Livewire\Components;

/**
 * Marquee Component
 *
 * The Marquee component creates a scrolling content effect, commonly used for displaying
 * testimonials, logos, or any content that needs to continuously scroll.
 *
 * @link https://gfazioli.github.io/mantine-marquee/
 *
 * @property mixed $w Width of the marquee container
 * @property mixed $h Height of the marquee container
 * @property mixed $vertical Whether to scroll vertically instead of horizontally
 * @property mixed $reverse Whether to reverse the scroll direction
 * @property mixed $pauseOnHover Whether to pause scrolling on hover
 * @property mixed $fadeEdges Whether to fade the edges of the marquee
 * @property mixed $fadeEdgesSize Size of the fade effect ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $fadeEdgesColor Color of the fade effect
 * @property mixed $duration Duration of one complete scroll cycle in seconds
 * @property mixed $gap Gap between repeated elements in pixels
 * @property mixed $repeat Number of times to repeat the children elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-marquee>
 *     <x-mantine-marquee-slide>
 *         Content that will scroll
 *     </x-mantine-marquee-slide>
 * </x-mantine-marquee>
 * ```
 */
class Marquee extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $w = null,
        public mixed $h = null,
        public mixed $vertical = null,
        public mixed $reverse = null,
        public mixed $pauseOnHover = null,
        public mixed $fadeEdges = null,
        public mixed $fadeEdgesSize = null,
        public mixed $fadeEdgesColor = null,
        public mixed $duration = null,
        public mixed $gap = null,
        public mixed $repeat = null,
    ) {
        parent::__construct();

        $this->props = [
            'w' => $w,
            'h' => $h,
            'vertical' => $vertical,
            'reverse' => $reverse,
            'pauseOnHover' => $pauseOnHover,
            'fadeEdges' => $fadeEdges,
            'fadeEdgesSize' => $fadeEdgesSize,
            'fadeEdgesColor' => $fadeEdgesColor,
            'duration' => $duration,
            'gap' => $gap,
            'repeat' => $repeat,
        ];
    }
}

/**
 * MarqueeSlide Component
 *
 * Represents a single slide within a Marquee. Must be placed inside Marquee component.
 */
class MarqueeSlide extends MantineComponent
{
    /**
     * Create a new MarqueeSlide instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
