<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePaper extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-paper shadow="xs" p="xl">
                        <x-mantine-text>Paper is the most basic ui component</x-mantine-text>
                        <x-mantine-text>
                            Use it to create cards, dropdowns, modals and other components that require background
                            with shadow
                        </x-mantine-text>
                    </x-mantine-paper>
                </div>

                <!-- Different shadows -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-paper shadow="xs" p="xl">Shadow xs</x-mantine-paper>
                        <x-mantine-paper shadow="sm" p="xl">Shadow sm</x-mantine-paper>
                        <x-mantine-paper shadow="md" p="xl">Shadow md</x-mantine-paper>
                        <x-mantine-paper shadow="lg" p="xl">Shadow lg</x-mantine-paper>
                        <x-mantine-paper shadow="xl" p="xl">Shadow xl</x-mantine-paper>
                    </x-mantine-stack>
                </div>

                <!-- Different radius -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-paper shadow="xs" radius="xs" p="xl">Radius xs</x-mantine-paper>
                        <x-mantine-paper shadow="xs" radius="sm" p="xl">Radius sm</x-mantine-paper>
                        <x-mantine-paper shadow="xs" radius="md" p="xl">Radius md</x-mantine-paper>
                        <x-mantine-paper shadow="xs" radius="lg" p="xl">Radius lg</x-mantine-paper>
                        <x-mantine-paper shadow="xs" radius="xl" p="xl">Radius xl</x-mantine-paper>
                    </x-mantine-stack>
                </div>

                <!-- With border -->
                <div class="mt-8">
                    <x-mantine-paper shadow="xs" p="xl" :with-border="true">
                        Paper with border
                    </x-mantine-paper>
                </div>

                <!-- As different elements -->
                <div class="mt-8">
                    <x-mantine-paper component="button" p="xl" shadow="xs">
                        Paper as button
                    </x-mantine-paper>

                    <x-mantine-paper component="a" href="#" p="xl" shadow="xs" mt="md">
                        Paper as link
                    </x-mantine-paper>
                </div>

                <!-- As a card -->
                <div class="mt-8">
                    <x-mantine-paper shadow="sm" p="xl" :with-border="true">
                        <x-mantine-title order="3" mb="md">Card-like Paper</x-mantine-title>
                        <x-mantine-text>
                            Paper can be used as a base for card components. Add shadow, padding,
                            border radius and other props to create different card variations.
                        </x-mantine-text>
                        <x-mantine-button mt="md">Action button</x-mantine-button>
                    </x-mantine-paper>
                </div>

                <!-- As a dropdown -->
                <div class="mt-8">
                    <x-mantine-paper shadow="md" p="md" :with-border="true" radius="md">
                        <x-mantine-stack>
                            <x-mantine-text>Dropdown item 1</x-mantine-text>
                            <x-mantine-text>Dropdown item 2</x-mantine-text>
                            <x-mantine-text>Dropdown item 3</x-mantine-text>
                        </x-mantine-stack>
                    </x-mantine-paper>
                </div>
            </div>
        blade;
    }
}
