<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleScrollArea extends Component
{
    public $scrollPosition = ['x' => 0, 'y' => 0];
    public $paragraphCount = 3;

    public function onScrollPositionChange($position)
    {
        $this->scrollPosition = $position;
    }

    public function addParagraph()
    {
        $this->paragraphCount++;
    }

    public function removeParagraph()
    {
        if ($this->paragraphCount > 0) {
            $this->paragraphCount--;
        }
    }

    public function render()
    {
        $content = "Charizard is a draconic, bipedal Pokémon. It is primarily orange with a cream underside from the chest to the tip of its tail. It has a long neck, small blue eyes, slightly raised nostrils, and two horn-like structures protruding from the back of its rectangular head. There are two fangs visible in the upper jaw when its mouth is closed. Two large wings with blue-green undersides sprout from its back, and a horn-like appendage juts out from the top of the third joint of each wing. A single wing-finger is visible through the center of each wing membrane. Charizard's arms are short and skinny compared to its robust belly, and each limb has three white claws. It has stocky legs with cream-colored soles on each of its plantigrade feet. The tip of its long, tapering tail burns with a sizable flame.";

        return <<<'blade'
            <div>
                <!-- Basic usage with different types -->
                <div>
                    <x-mantine-group grow>
                        <div>
                            <x-mantine-text mb="xs">Type: hover</x-mantine-text>
                            <x-mantine-scroll-area h="250" type="hover">
                                <x-mantine-text>{{ $content }}</x-mantine-text>
                            </x-mantine-scroll-area>
                        </div>

                        <div>
                            <x-mantine-text mb="xs">Type: auto</x-mantine-text>
                            <x-mantine-scroll-area h="250" type="auto">
                                <x-mantine-text>{{ $content }}</x-mantine-text>
                            </x-mantine-scroll-area>
                        </div>

                        <div>
                            <x-mantine-text mb="xs">Type: always</x-mantine-text>
                            <x-mantine-scroll-area h="250" type="always">
                                <x-mantine-text>{{ $content }}</x-mantine-text>
                            </x-mantine-scroll-area>
                        </div>
                    </x-mantine-group>
                </div>

                <!-- With horizontal scrollbars -->
                <div class="mt-8">
                    <x-mantine-scroll-area w="300" h="200">
                        <x-mantine-box w="600">
                            <x-mantine-text>{{ $content }}</x-mantine-text>
                        </x-mantine-box>
                    </x-mantine-scroll-area>
                </div>

                <!-- Disable horizontal scrollbars -->
                <div class="mt-8">
                    <x-mantine-scroll-area w="300" h="200" scrollbars="y">
                        <x-mantine-box w="600">
                            <x-mantine-text>{{ $content }}</x-mantine-text>
                        </x-mantine-box>
                    </x-mantine-scroll-area>
                </div>

                <!-- Subscribe to scroll position changes -->
                <div class="mt-8">
                    <x-mantine-scroll-area
                        w="300"
                        h="200"
                        wire:scroll-position-change="onScrollPositionChange"
                    >
                        <x-mantine-box w="600">
                            <x-mantine-text>{{ $content }}</x-mantine-text>
                        </x-mantine-box>
                    </x-mantine-scroll-area>

                    <x-mantine-text mt="sm">
                        Scroll position: x: {{ $scrollPosition['x'] }}, y: {{ $scrollPosition['y'] }}
                    </x-mantine-text>
                </div>

                <!-- ScrollArea.Autosize -->
                <div class="mt-8">
                    <x-mantine-scroll-area-autosize mah="300" maw="400" mx="auto">
                        @for($i = 0; $i < $paragraphCount; $i++)
                            <x-mantine-text>{{ $content }}</x-mantine-text>
                        @endfor
                    </x-mantine-scroll-area-autosize>

                    <x-mantine-group justify="center" mt="md">
                        <x-mantine-button color="red" wire:click="removeParagraph">
                            Remove paragraph
                        </x-mantine-button>
                        <x-mantine-button wire:click="addParagraph">
                            Add paragraph
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- ScrollArea.Autosize with Popover -->
                <div class="mt-8">
                    <x-mantine-popover width="target">
                        <x-mantine-popover-target>
                            <x-mantine-button>Open Popover</x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown p="0">
                            <x-mantine-scroll-area-autosize mah="200" type="always" scrollbars="y">
                                <x-mantine-box px="xs" py="5">
                                    <x-mantine-text>{{ $content }}</x-mantine-text>
                                </x-mantine-box>
                            </x-mantine-scroll-area-autosize>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>
            </div>
        blade;
    }
}
