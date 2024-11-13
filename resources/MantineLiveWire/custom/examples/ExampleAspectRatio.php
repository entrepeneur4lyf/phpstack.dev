<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example AspectRatio Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade AspectRatio component.
 * It showcases how to maintain specific aspect ratios for different types of media content.
 *
 * Features demonstrated:
 * - Image aspect ratio maintenance
 * - Map embedding with fixed dimensions
 * - Video iframe with standard 16:9 ratio
 * - Custom sizing with max-width and margin controls
 *
 * @see \MantineBlade\Components\AspectRatio
 * @link https://mantine.dev/core/aspect-ratio/
 */
class ExampleAspectRatio extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic image example with custom ratio and max width
     * 2. Google Maps embed with 16:9 aspect ratio
     * 3. YouTube video embed maintaining proper video dimensions
     *
     * Each example showcases a different use case for maintaining
     * specific aspect ratios while ensuring responsive behavior.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic image example -->
                <x-mantine-aspect-ratio :ratio="1080/720" maw="300" mx="auto">
                    <img
                        src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-5.png"
                        alt="Panda"
                    />
                </x-mantine-aspect-ratio>

                <!-- Map embed example -->
                <x-mantine-aspect-ratio :ratio="16/9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.3063874233135!2d-74.04668908358428!3d40.68924937933441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25090129c363d%3A0x40c6a5770d25022b!2sStatue%20of%20Liberty%20National%20Monument!5e0!3m2!1sen!2sru!4v1644262070010!5m2!1sen!2sru"
                        title="Google map"
                        style="border: 0"
                    />
                </x-mantine-aspect-ratio>

                <!-- Video embed example -->
                <x-mantine-aspect-ratio :ratio="16/9">
                    <iframe
                        src="https://www.youtube.com/embed/mzJ4vCjSt28"
                        title="YouTube video player"
                        style="border: 0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    />
                </x-mantine-aspect-ratio>
            </div>
        blade;
    }
}
