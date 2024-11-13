<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTransition extends Component
{
    public $opened = false;
    public $dropdownOpened = false;

    public function toggle()
    {
        $this->opened = !$this->opened;
    }

    public function toggleDropdown()
    {
        $this->dropdownOpened = !$this->dropdownOpened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Pre-made transitions -->
                <div>
                    <x-mantine-group>
                        <x-mantine-button wire:click="toggle">
                            Toggle transitions
                        </x-mantine-button>
                    </x-mantine-group>

                    <x-mantine-group mt="xl">
                        <div>
                            <x-mantine-text mb="sm">fade</x-mantine-text>
                            <x-mantine-transition :mounted="$opened" transition="fade">
                                <x-mantine-paper shadow="sm" p="xl">
                                    Fade transition
                                </x-mantine-paper>
                            </x-mantine-transition>
                        </div>

                        <div>
                            <x-mantine-text mb="sm">slide-down</x-mantine-text>
                            <x-mantine-transition :mounted="$opened" transition="slide-down">
                                <x-mantine-paper shadow="sm" p="xl">
                                    Slide down transition
                                </x-mantine-paper>
                            </x-mantine-transition>
                        </div>

                        <div>
                            <x-mantine-text mb="sm">pop</x-mantine-text>
                            <x-mantine-transition :mounted="$opened" transition="pop">
                                <x-mantine-paper shadow="sm" p="xl">
                                    Pop transition
                                </x-mantine-paper>
                            </x-mantine-transition>
                        </div>
                    </x-mantine-group>
                </div>

                <!-- Custom transition -->
                <div class="mt-8">
                    <x-mantine-box maw="200" pos="relative" style="margin: auto">
                        <x-mantine-button wire:click="toggleDropdown">
                            Open dropdown
                        </x-mantine-button>

                        <x-mantine-transition
                            :mounted="$dropdownOpened"
                            :transition="[
                                'in' => ['opacity' => 1, 'transform' => 'scaleY(1)'],
                                'out' => ['opacity' => 0, 'transform' => 'scaleY(0)'],
                                'common' => ['transformOrigin' => 'top'],
                                'transitionProperty' => 'transform, opacity',
                            ]"
                            duration="200"
                            timing-function="ease"
                            :keep-mounted="true"
                        >
                            <x-mantine-paper
                                shadow="md"
                                p="xl"
                                h="120"
                                pos="absolute"
                                style="top: 0; left: 0; right: 0; z-index: 1;"
                            >
                                Dropdown with custom transition
                            </x-mantine-paper>
                        </x-mantine-transition>
                    </x-mantine-box>
                </div>

                <!-- With enter and exit delay -->
                <div class="mt-8">
                    <x-mantine-flex maw="200" pos="relative" justify="center" style="margin: auto">
                        <x-mantine-button wire:click="toggleDropdown">
                            Open delayed dropdown
                        </x-mantine-button>

                        <x-mantine-transition
                            :mounted="$dropdownOpened"
                            transition="pop"
                            enter-delay="500"
                            exit-delay="300"
                        >
                            <x-mantine-paper
                                shadow="md"
                                p="xl"
                                h="120"
                                pos="absolute"
                                style="inset: 0; bottom: auto; z-index: 1;"
                                wire:click="toggleDropdown"
                            >
                                Click to close (with delay)
                            </x-mantine-paper>
                        </x-mantine-transition>
                    </x-mantine-flex>
                </div>
            </div>
        blade;
    }
}
