<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleStack extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic stack with gap -->
                <x-mantine-stack gap="md">
                    <x-mantine-button variant="default">1</x-mantine-button>
                    <x-mantine-button variant="default">2</x-mantine-button>
                    <x-mantine-button variant="default">3</x-mantine-button>
                </x-mantine-stack>

                <!-- Stack with alignment and justification -->
                <x-mantine-stack
                    h="300"
                    bg="var(--mantine-color-body)"
                    align="stretch"
                    justify="center"
                    gap="md"
                >
                    <x-mantine-button variant="default">1</x-mantine-button>
                    <x-mantine-button variant="default">2</x-mantine-button>
                    <x-mantine-button variant="default">3</x-mantine-button>
                </x-mantine-stack>

                <!-- Stack with different alignments -->
                <x-mantine-stack align="flex-start" gap="sm">
                    <x-mantine-button variant="default">Left aligned</x-mantine-button>
                    <x-mantine-button variant="default">Content</x-mantine-button>
                </x-mantine-stack>

                <x-mantine-stack align="center" gap="sm">
                    <x-mantine-button variant="default">Center aligned</x-mantine-button>
                    <x-mantine-button variant="default">Content</x-mantine-button>
                </x-mantine-stack>

                <x-mantine-stack align="flex-end" gap="sm">
                    <x-mantine-button variant="default">Right aligned</x-mantine-button>
                    <x-mantine-button variant="default">Content</x-mantine-button>
                </x-mantine-stack>

                <!-- Stack with different spacing -->
                <x-mantine-stack gap="xl">
                    <x-mantine-button variant="default">Extra large gap</x-mantine-button>
                    <x-mantine-button variant="default">Between items</x-mantine-button>
                </x-mantine-stack>
            </div>
        blade;
    }
}
