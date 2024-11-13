<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Carousel Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Carousel component.
 * It showcases different layouts, animations, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic carousel usage
 * - Custom slide sizes and gaps
 * - Responsive configurations
 * - Drag-free sliding
 * - Vertical orientation
 * - Custom control icons
 * - Image carousels
 * - Autoplay functionality
 * - Embla API integration
 *
 * @see \MantineBlade\Components\Carousel
 * @link https://mantine.dev/core/carousel/
 */
class ExampleCarousel extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic carousel with indicators
     * 2. Custom slide size and gap
     * 3. Responsive slide configurations
     * 4. Drag-free sliding behavior
     * 5. Vertical orientation
     * 6. Custom navigation controls
     * 7. Image carousel implementation
     * 8. Autoplay functionality
     * 9. Embla API integration with progress
     *
     * Each example showcases different features and customization
     * options available with the Carousel component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <x-mantine-carousel :with-indicators="true" height="200">
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- With custom slide size and gap -->
                <div class="mb-8">
                    <x-mantine-carousel
                        slide-size="70%"
                        height="200"
                        slide-gap="md"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- With responsive styles -->
                <div class="mb-8">
                    <x-mantine-carousel
                        :with-indicators="true"
                        height="200"
                        :slide-size="[
                            'base' => '100%',
                            'sm' => '50%',
                            'md' => '33.333333%'
                        ]"
                        :slide-gap="[
                            'base' => 0,
                            'sm' => 'md'
                        ]"
                        :loop="true"
                        align="start"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- With drag free -->
                <div class="mb-8">
                    <x-mantine-carousel
                        :with-indicators="true"
                        height="200"
                        :drag-free="true"
                        slide-gap="md"
                        align="start"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- Vertical orientation -->
                <div class="mb-8">
                    <x-mantine-carousel
                        orientation="vertical"
                        height="200"
                        :with-indicators="true"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- With custom control icons -->
                <div class="mb-8">
                    <x-mantine-carousel
                        height="180"
                        :next-control-icon="'<IconArrowRight style={{ width: rem(16), height: rem(16) }} />'"
                        :previous-control-icon="'<IconArrowLeft style={{ width: rem(16), height: rem(16) }} />'"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- Images carousel -->
                <div class="mb-8">
                    <x-mantine-carousel :with-indicators="true">
                        @foreach ([
                            'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-1.png',
                            'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-2.png',
                            'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-3.png',
                            'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-4.png',
                            'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-5.png',
                        ] as $image)
                            <x-mantine-carousel.slide>
                                <x-mantine-image :src="$image" />
                            </x-mantine-carousel.slide>
                        @endforeach
                    </x-mantine-carousel>
                </div>

                <!-- With autoplay plugin -->
                <div class="mb-8">
                    @php
                        $autoplay = "useRef(Autoplay({ delay: 2000 }))";
                    @endphp

                    <x-mantine-carousel
                        :with-indicators="true"
                        height="200"
                        :plugins="[$autoplay]"
                        :on-mouse-enter="$autoplay . '.current.stop'"
                        :on-mouse-leave="$autoplay . '.current.reset'"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>
                </div>

                <!-- With embla instance -->
                <div class="mb-8">
                    @php
                        $embla = null;
                    @endphp

                    <x-mantine-carousel
                        :drag-free="true"
                        slide-size="50%"
                        slide-gap="md"
                        height="200"
                        :get-embla-api="function ($api) use (&$embla) { $embla = $api; }"
                        :initial-slide="2"
                    >
                        <x-mantine-carousel.slide>1</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>2</x-mantine-carousel.slide>
                        <x-mantine-carousel.slide>3</x-mantine-carousel.slide>
                    </x-mantine-carousel>

                    @if ($embla)
                        <x-mantine-progress
                            :value="$embla->scrollProgress() * 100"
                            max-width="320"
                            size="sm"
                            mt="xl"
                            mx="auto"
                        />
                    @endif
                </div>
            </div>
        blade;
    }
}
