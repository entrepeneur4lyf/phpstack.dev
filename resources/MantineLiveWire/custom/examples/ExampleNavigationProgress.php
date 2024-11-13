<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNavigationProgress extends Component
{
    public function start()
    {
        $this->dispatch('start');
    }

    public function stop()
    {
        $this->dispatch('stop');
    }

    public function increment()
    {
        $this->dispatch('increment');
    }

    public function decrement()
    {
        $this->dispatch('decrement');
    }

    public function setHalf()
    {
        $this->dispatch('set', 50);
    }

    public function reset()
    {
        $this->dispatch('reset');
    }

    public function complete()
    {
        $this->dispatch('complete');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <x-mantine-navigation-progress
                        :initial-progress="0"
                        color="blue"
                        :height="3"
                        :auto-reset="true"
                    />

                    <x-mantine-group justify="center">
                        <x-mantine-button wire:click="start">
                            Start
                        </x-mantine-button>

                        <x-mantine-button wire:click="stop">
                            Stop
                        </x-mantine-button>

                        <x-mantine-button wire:click="increment">
                            Increment
                        </x-mantine-button>

                        <x-mantine-button wire:click="decrement">
                            Decrement
                        </x-mantine-button>

                        <x-mantine-button wire:click="setHalf">
                            Set 50%
                        </x-mantine-button>

                        <x-mantine-button wire:click="reset">
                            Reset
                        </x-mantine-button>

                        <x-mantine-button wire:click="complete">
                            Complete
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Custom styling -->
                <div class="mb-8">
                    <x-mantine-navigation-progress
                        color="teal"
                        :height="6"
                        radius="xl"
                        :transition-duration="400"
                    />

                    <x-mantine-group justify="center">
                        <x-mantine-button wire:click="start" color="teal">
                            Start teal progress
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- With progress label -->
                <div class="mb-8">
                    <x-mantine-navigation-progress
                        color="violet"
                        :height="10"
                        :progress-label="true"
                    />

                    <x-mantine-group justify="center">
                        <x-mantine-button wire:click="start" color="violet">
                            Start with label
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Auto reset disabled -->
                <div>
                    <x-mantine-navigation-progress
                        color="orange"
                        :auto-reset="false"
                    />

                    <x-mantine-group justify="center">
                        <x-mantine-button wire:click="complete" color="orange">
                            Complete without reset
                        </x-mantine-button>

                        <x-mantine-button wire:click="reset" variant="outline" color="orange">
                            Manual reset
                        </x-mantine-button>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
