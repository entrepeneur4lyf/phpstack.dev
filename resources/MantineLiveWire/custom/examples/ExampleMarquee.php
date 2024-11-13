<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Marquee Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Marquee component.
 * It showcases different scrolling effects and content types through practical examples.
 *
 * Features demonstrated:
 * - Basic horizontal scrolling
 * - Vertical scrolling
 * - Fade edges effect
 * - Pause on hover functionality
 * - Different speeds and directions
 * - Real-world use cases like testimonials and brand logos
 *
 * @see \MantineBlade\Components\Marquee
 * @link https://mantine.dev/core/marquee/
 */
class ExampleMarquee extends Component
{
    /**
     * Sample testimonials data for examples
     *
     * @var array
     */
    public $testimonials = [
        [
            'name' => 'John Doe',
            'avatar' => 'https://i.pravatar.cc/100?img=1',
            'text' => 'An amazing product that has transformed our workflow!',
            'rating' => 5
        ],
        [
            'name' => 'Jane Smith',
            'avatar' => 'https://i.pravatar.cc/100?img=2',
            'text' => 'Incredibly intuitive and powerful. Highly recommended!',
            'rating' => 4
        ],
        [
            'name' => 'Mike Johnson',
            'avatar' => 'https://i.pravatar.cc/100?img=3',
            'text' => 'The best solution we\'ve found for our needs.',
            'rating' => 5
        ],
    ];

    /**
     * Sample brand data for examples
     *
     * @var array
     */
    public $brands = [
        ['name' => 'Apple', 'logo' => 'https://api.dicebear.com/7.x/initials/svg?seed=Apple'],
        ['name' => 'Google', 'logo' => 'https://api.dicebear.com/7.x/initials/svg?seed=Google'],
        ['name' => 'Microsoft', 'logo' => 'https://api.dicebear.com/7.x/initials/svg?seed=Microsoft'],
        ['name' => 'Amazon', 'logo' => 'https://api.dicebear.com/7.x/initials/svg?seed=Amazon'],
    ];

    /**
     * Render the component
     *
     * Demonstrates multiple marquee configurations:
     * 1. Basic horizontal scrolling
     * 2. Vertical testimonials
     * 3. Brand logo showcase
     * 4. Pause on hover example
     * 5. Fade edges demonstration
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic horizontal scrolling -->
                <div>
                    <x-mantine-marquee :duration="20">
                        @foreach($testimonials as $testimonial)
                            <x-mantine-marquee-slide>
                                <x-mantine-paper shadow="sm" p="lg" withBorder>
                                    <x-mantine-group>
                                        <x-mantine-avatar :src="$testimonial['avatar']" size="lg" radius="xl"/>
                                        <div>
                                            <x-mantine-text fw="bold">{{ $testimonial['name'] }}</x-mantine-text>
                                            <x-mantine-rating :value="$testimonial['rating']" readOnly/>
                                        </div>
                                    </x-mantine-group>
                                    <x-mantine-text mt="sm">{{ $testimonial['text'] }}</x-mantine-text>
                                </x-mantine-paper>
                            </x-mantine-marquee-slide>
                        @endforeach
                    </x-mantine-marquee>
                </div>

                <!-- Vertical scrolling -->
                <div class="mt-8">
                    <x-mantine-marquee
                        :vertical="true"
                        h="400"
                        :duration="30"
                    >
                        @foreach($testimonials as $testimonial)
                            <x-mantine-marquee-slide>
                                <x-mantine-paper shadow="sm" p="md" withBorder>
                                    <x-mantine-text>{{ $testimonial['text'] }}</x-mantine-text>
                                </x-mantine-paper>
                            </x-mantine-marquee-slide>
                        @endforeach
                    </x-mantine-marquee>
                </div>

                <!-- Brand logos -->
                <div class="mt-8">
                    <x-mantine-marquee
                        :pauseOnHover="true"
                        :duration="15"
                        :gap="50"
                    >
                        @foreach($brands as $brand)
                            <x-mantine-marquee-slide>
                                <x-mantine-image
                                    :src="$brand['logo']"
                                    width="100"
                                    height="100"
                                    :alt="$brand['name']"
                                />
                            </x-mantine-marquee-slide>
                        @endforeach
                    </x-mantine-marquee>
                </div>

                <!-- With fade edges -->
                <div class="mt-8">
                    <x-mantine-marquee
                        :fadeEdges="true"
                        fadeEdgesSize="xl"
                        :duration="25"
                    >
                        @foreach($brands as $brand)
                            <x-mantine-marquee-slide>
                                <x-mantine-paper shadow="sm" p="lg" withBorder>
                                    <x-mantine-text size="xl" fw="bold">{{ $brand['name'] }}</x-mantine-text>
                                </x-mantine-paper>
                            </x-mantine-marquee-slide>
                        @endforeach
                    </x-mantine-marquee>
                </div>

                <!-- Reverse direction -->
                <div class="mt-8">
                    <x-mantine-marquee
                        :reverse="true"
                        :duration="20"
                        :gap="40"
                    >
                        @foreach($testimonials as $testimonial)
                            <x-mantine-marquee-slide>
                                <x-mantine-paper shadow="sm" p="md" withBorder>
                                    <x-mantine-text fw="bold">{{ $testimonial['name'] }}</x-mantine-text>
                                </x-mantine-paper>
                            </x-mantine-marquee-slide>
                        @endforeach
                    </x-mantine-marquee>
                </div>
            </div>
        blade;
    }
}
