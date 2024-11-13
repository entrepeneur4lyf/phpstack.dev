<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFlex extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic flex container -->
                <x-mantine-flex gap="md">
                    <div>First</div>
                    <div>Second</div>
                    <div>Third</div>
                </x-mantine-flex>

                <!-- Center aligned with space-between -->
                <x-mantine-flex justify="space-between" align="center">
                    <div>Left</div>
                    <div>Center</div>
                    <div>Right</div>
                </x-mantine-flex>

                <!-- Column direction -->
                <x-mantine-flex direction="column" gap="sm">
                    <div>Top</div>
                    <div>Middle</div>
                    <div>Bottom</div>
                </x-mantine-flex>

                <!-- Wrapping with row-reverse -->
                <x-mantine-flex wrap="wrap" direction="row-reverse" gap="lg">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                </x-mantine-flex>
            </div>
        blade;
    }
}
