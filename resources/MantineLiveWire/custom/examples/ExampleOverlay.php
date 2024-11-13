<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleOverlay extends Component
{
    public $visible = true;

    public function toggleOverlay()
    {
        $this->visible = !$this->visible;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-aspect-ratio :ratio="16/9" maw="400" mx="auto" pos="relative">
                        <img
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-1.png"
                            alt="Demo"
                        />
                        @if($visible)
                            <x-mantine-overlay
                                color="#000"
                                :background-opacity="0.85"
                            />
                        @endif
                    </x-mantine-aspect-ratio>

                    <x-mantine-button
                        :on-click="fn() => $this->toggleOverlay()"
                        full-width
                        maw="200"
                        mx="auto"
                        mt="xl"
                    >
                        Toggle overlay
                    </x-mantine-button>
                </div>

                <!-- With gradient -->
                <div class="mt-8">
                    <x-mantine-aspect-ratio :ratio="16/9" maw="400" mx="auto" pos="relative">
                        <img
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="Demo"
                        />
                        @if($visible)
                            <x-mantine-overlay
                                gradient="linear-gradient(145deg, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0) 100%)"
                                :opacity="0.85"
                            />
                        @endif
                    </x-mantine-aspect-ratio>

                    <x-mantine-button
                        :on-click="fn() => $this->toggleOverlay()"
                        full-width
                        maw="200"
                        mx="auto"
                        mt="xl"
                    >
                        Toggle overlay
                    </x-mantine-button>
                </div>

                <!-- With blur -->
                <div class="mt-8">
                    <x-mantine-aspect-ratio :ratio="16/9" maw="400" mx="auto" pos="relative">
                        <img
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-3.png"
                            alt="Demo"
                        />
                        <x-mantine-overlay
                            color="#000"
                            :background-opacity="0.35"
                            :blur="15"
                        />
                    </x-mantine-aspect-ratio>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-aspect-ratio :ratio="16/9" maw="400" mx="auto" pos="relative">
                        <img
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-1.png"
                            alt="Demo"
                        />
                        <x-mantine-overlay
                            component="a"
                            href="#"
                            color="#000"
                            :background-opacity="0.35"
                        />
                    </x-mantine-aspect-ratio>
                </div>

                <!-- Fixed position -->
                <div class="mt-8">
                    <x-mantine-aspect-ratio :ratio="16/9" maw="400" mx="auto" pos="relative">
                        <img
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-1.png"
                            alt="Demo"
                        />
                        @if($visible)
                            <x-mantine-overlay
                                :fixed="true"
                                color="#000"
                                :background-opacity="0.85"
                                :z-index="200"
                            />
                        @endif
                    </x-mantine-aspect-ratio>

                    <x-mantine-button
                        :on-click="fn() => $this->toggleOverlay()"
                        full-width
                        maw="200"
                        mx="auto"
                        mt="xl"
                    >
                        Toggle fixed overlay
                    </x-mantine-button>
                </div>
            </div>
        blade;
    }
}
