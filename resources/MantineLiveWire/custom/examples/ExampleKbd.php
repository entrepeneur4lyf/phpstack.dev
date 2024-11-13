<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleKbd extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div dir="ltr">
                    <x-mantine-kbd>⌘</x-mantine-kbd> +
                    <x-mantine-kbd>Shift</x-mantine-kbd> +
                    <x-mantine-kbd>M</x-mantine-kbd>
                </div>

                <!-- Different sizes -->
                <div class="mt-8" dir="ltr">
                    <x-mantine-group>
                        <div>
                            <x-mantine-kbd size="xs">Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd size="xs">S</x-mantine-kbd>
                        </div>

                        <div>
                            <x-mantine-kbd size="sm">Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd size="sm">S</x-mantine-kbd>
                        </div>

                        <div>
                            <x-mantine-kbd size="md">Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd size="md">S</x-mantine-kbd>
                        </div>

                        <div>
                            <x-mantine-kbd size="lg">Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd size="lg">S</x-mantine-kbd>
                        </div>

                        <div>
                            <x-mantine-kbd size="xl">Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd size="xl">S</x-mantine-kbd>
                        </div>
                    </x-mantine-group>
                </div>

                <!-- Common shortcuts -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <div dir="ltr">
                            Copy: <x-mantine-kbd>Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd>C</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Paste: <x-mantine-kbd>Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd>V</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Undo: <x-mantine-kbd>Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd>Z</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Save: <x-mantine-kbd>Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd>S</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Find: <x-mantine-kbd>Ctrl</x-mantine-kbd> +
                            <x-mantine-kbd>F</x-mantine-kbd>
                        </div>
                    </x-mantine-stack>
                </div>

                <!-- Mac shortcuts -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <div dir="ltr">
                            Copy: <x-mantine-kbd>⌘</x-mantine-kbd> +
                            <x-mantine-kbd>C</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Paste: <x-mantine-kbd>⌘</x-mantine-kbd> +
                            <x-mantine-kbd>V</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Undo: <x-mantine-kbd>⌘</x-mantine-kbd> +
                            <x-mantine-kbd>Z</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Save: <x-mantine-kbd>⌘</x-mantine-kbd> +
                            <x-mantine-kbd>S</x-mantine-kbd>
                        </div>

                        <div dir="ltr">
                            Find: <x-mantine-kbd>⌘</x-mantine-kbd> +
                            <x-mantine-kbd>F</x-mantine-kbd>
                        </div>
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
