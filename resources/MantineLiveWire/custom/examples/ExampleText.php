<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleText extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Different sizes -->
                <div>
                    <x-mantine-text size="xs">Extra small text</x-mantine-text>
                    <x-mantine-text size="sm">Small text</x-mantine-text>
                    <x-mantine-text size="md">Default text</x-mantine-text>
                    <x-mantine-text size="lg">Large text</x-mantine-text>
                    <x-mantine-text size="xl">Extra large text</x-mantine-text>
                </div>

                <!-- Font weights and styles -->
                <div class="mt-8">
                    <x-mantine-text fw="500">Semibold</x-mantine-text>
                    <x-mantine-text fw="700">Bold</x-mantine-text>
                    <x-mantine-text fs="italic">Italic</x-mantine-text>
                    <x-mantine-text td="underline">Underlined</x-mantine-text>
                    <x-mantine-text td="line-through">Strikethrough</x-mantine-text>
                </div>

                <!-- Colors -->
                <div class="mt-8">
                    <x-mantine-text c="dimmed">Dimmed text</x-mantine-text>
                    <x-mantine-text c="blue">Blue text</x-mantine-text>
                    <x-mantine-text c="teal.4">Teal 4 text</x-mantine-text>
                </div>

                <!-- Text transforms -->
                <div class="mt-8">
                    <x-mantine-text tt="uppercase">Uppercase</x-mantine-text>
                    <x-mantine-text tt="capitalize">capitalized text</x-mantine-text>
                </div>

                <!-- Alignment -->
                <div class="mt-8">
                    <x-mantine-text ta="center">Aligned to center</x-mantine-text>
                    <x-mantine-text ta="right">Aligned to right</x-mantine-text>
                </div>

                <!-- Gradient -->
                <div class="mt-8">
                    <x-mantine-text
                        size="xl"
                        fw="900"
                        variant="gradient"
                        :gradient="[
                            'from' => 'blue',
                            'to' => 'cyan',
                            'deg' => 90,
                        ]"
                    >
                        Gradient Text
                    </x-mantine-text>
                </div>

                <!-- Truncate -->
                <div class="mt-8">
                    <x-mantine-box w="300">
                        <x-mantine-text truncate="end">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde provident eos fugiat id
                            necessitatibus magni ducimus molestias. Placeat, consequatur. Quisquam, quae magnam
                            perspiciatis excepturi iste sint itaque sunt laborum. Nihil?
                        </x-mantine-text>
                    </x-mantine-box>
                </div>

                <!-- Line clamp -->
                <div class="mt-8">
                    <x-mantine-text :line-clamp="4">
                        From Bulbapedia: Bulbasaur is a small, quadrupedal Pokémon that has blue-green skin with darker patches.
                        It has red eyes with white pupils, pointed, ear-like structures on top of its head, and a short,
                        blunt snout with a wide mouth. A pair of small, pointed teeth are visible in the upper jaw when its
                        mouth is open. Each of its thick legs ends with three sharp claws. On Bulbasaur's back is a green
                        plant bulb, which is grown from a seed planted there at birth. The bulb also conceals two slender,
                        tentacle-like vines and provides it with energy through photosynthesis as well as from the
                        nutrient-rich seeds contained within.
                    </x-mantine-text>
                </div>

                <!-- Inherit styles -->
                <div class="mt-8">
                    <x-mantine-title order="3">
                        Title in which you want to
                        <x-mantine-text span c="blue" :inherit="true">
                            highlight
                        </x-mantine-text>
                        something
                    </x-mantine-title>
                </div>

                <!-- As different elements -->
                <div class="mt-8">
                    <x-mantine-text component="a" href="https://mantine.dev" target="_blank">
                        Link text
                    </x-mantine-text>

                    <x-mantine-text span>Span text</x-mantine-text>
                </div>
            </div>
        blade;
    }
}
