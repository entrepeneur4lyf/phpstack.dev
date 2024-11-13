<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleGroup extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic group with gap -->
                <x-mantine-group gap="md">
                    <x-mantine-button>First</x-mantine-button>
                    <x-mantine-button>Second</x-mantine-button>
                    <x-mantine-button>Third</x-mantine-button>
                </x-mantine-group>

                <!-- Center aligned with space-between -->
                <x-mantine-group justify="space-between" align="center">
                    <x-mantine-button>Left</x-mantine-button>
                    <x-mantine-button>Center</x-mantine-button>
                    <x-mantine-button>Right</x-mantine-button>
                </x-mantine-group>

                <!-- Growing items -->
                <x-mantine-group :grow="true" gap="sm">
                    <x-mantine-button>Grows</x-mantine-button>
                    <x-mantine-button>To</x-mantine-button>
                    <x-mantine-button>Fill</x-mantine-button>
                    <x-mantine-button>Space</x-mantine-button>
                </x-mantine-group>

                <!-- Wrapping with prevent overflow -->
                <x-mantine-group :wrap="true" :prevent-grow-overflow="true" gap="lg">
                    <x-mantine-button>First</x-mantine-button>
                    <x-mantine-button>Wraps</x-mantine-button>
                    <x-mantine-button>When</x-mantine-button>
                    <x-mantine-button>Needed</x-mantine-button>
                    <x-mantine-button>Without</x-mantine-button>
                    <x-mantine-button>Overflow</x-mantine-button>
                </x-mantine-group>
            </div>
        blade;
    }
}
