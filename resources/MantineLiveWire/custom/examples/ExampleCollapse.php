<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCollapse extends Component
{
    public $opened = false;
    public $innerOpened = false;

    public function toggle()
    {
        $this->opened = !$this->opened;
    }

    public function toggleInner()
    {
        $this->innerOpened = !$this->innerOpened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-group justify="center" mb="5">
                            <x-mantine-button wire:click="toggle">
                                Toggle content
                            </x-mantine-button>
                        </x-mantine-group>

                        <x-mantine-collapse :in="$opened">
                            <x-mantine-text>
                                From Bulbapedia: Bulbasaur is a small, quadrupedal Pokémon that has blue-green skin
                                with darker patches. It has red eyes with white pupils, pointed, ear-like structures
                                on top of its head, and a short, blunt snout with a wide mouth. A pair of small,
                                pointed teeth are visible in the upper jaw when its mouth is open. Each of its thick
                                legs ends with three sharp claws. On Bulbasaur's back is a green plant bulb, which
                                is grown from a seed planted there at birth. The bulb also conceals two slender,
                                tentacle-like vines and provides it with energy through photosynthesis as well as
                                from the nutrient-rich seeds contained within.
                            </x-mantine-text>
                        </x-mantine-collapse>
                    </x-mantine-box>
                </div>

                <!-- With custom transition -->
                <div class="mt-8">
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-group justify="center" mb="5">
                            <x-mantine-button wire:click="toggle">
                                Toggle with linear transition
                            </x-mantine-button>
                        </x-mantine-group>

                        <x-mantine-collapse
                            :in="$opened"
                            transition-duration="1000"
                            transition-timing-function="linear"
                        >
                            <x-mantine-text>
                                From Bulbapedia: Bulbasaur is a small, quadrupedal Pokémon that has blue-green skin
                                with darker patches. It has red eyes with white pupils, pointed, ear-like structures
                                on top of its head, and a short, blunt snout with a wide mouth. A pair of small,
                                pointed teeth are visible in the upper jaw when its mouth is open. Each of its thick
                                legs ends with three sharp claws. On Bulbasaur's back is a green plant bulb, which
                                is grown from a seed planted there at birth. The bulb also conceals two slender,
                                tentacle-like vines and provides it with energy through photosynthesis as well as
                                from the nutrient-rich seeds contained within.
                            </x-mantine-text>
                        </x-mantine-collapse>
                    </x-mantine-box>
                </div>

                <!-- Nested collapses -->
                <div class="mt-8">
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-button wire:click="toggle" mb="md">
                            Root collapse
                        </x-mantine-button>

                        <x-mantine-collapse :in="$opened">
                            <x-mantine-text mb="md">
                                This collapse contains another collapse
                            </x-mantine-text>

                            <x-mantine-text mb="md">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea atque in est quaerat
                                dolore odio! Quibusdam, a nihil modi, maiores consequuntur ex quod suscipit illum
                                ducimus doloribus odit commodi tenetur.
                            </x-mantine-text>

                            <x-mantine-button wire:click="toggleInner" mb="md">
                                Inner collapse
                            </x-mantine-button>

                            <x-mantine-collapse :in="$innerOpened">
                                <x-mantine-text mb="md">
                                    This collapse is inside another collapse
                                </x-mantine-text>

                                <x-mantine-text>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea atque in est quaerat
                                    dolore odio! Quibusdam, a nihil modi, maiores consequuntur ex quod suscipit illum
                                    ducimus doloribus odit commodi tenetur.
                                </x-mantine-text>
                            </x-mantine-collapse>
                        </x-mantine-collapse>
                    </x-mantine-box>
                </div>
            </div>
        blade;
    }
}
