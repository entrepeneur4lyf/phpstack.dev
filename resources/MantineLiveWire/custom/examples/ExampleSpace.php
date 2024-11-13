<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSpace extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Vertical spacing -->
                <div>
                    <div>First line</div>
                    <x-mantine-space h="md" />
                    <div>Second line</div>
                </div>

                <!-- Horizontal spacing -->
                <div style="display: flex">
                    <div>First part</div>
                    <x-mantine-space w="md" />
                    <div>Second part</div>
                </div>

                <!-- Different spacing sizes -->
                <div>
                    <div>Line 1</div>
                    <x-mantine-space h="xs" />
                    <div>Line 2</div>
                    <x-mantine-space h="sm" />
                    <div>Line 3</div>
                    <x-mantine-space h="md" />
                    <div>Line 4</div>
                    <x-mantine-space h="lg" />
                    <div>Line 5</div>
                    <x-mantine-space h="xl" />
                    <div>Line 6</div>
                </div>
            </div>
        blade;
    }
}
