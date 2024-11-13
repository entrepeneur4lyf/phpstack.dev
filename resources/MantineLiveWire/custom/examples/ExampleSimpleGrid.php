<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSimpleGrid extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic grid with 3 columns -->
                <x-mantine-simple-grid :cols="3">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                </x-mantine-simple-grid>

                <!-- Responsive columns -->
                <x-mantine-simple-grid :cols="['base' => 1, 'sm' => 2, 'lg' => 5]">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                </x-mantine-simple-grid>

                <!-- Custom spacing -->
                <x-mantine-simple-grid 
                    :cols="3"
                    spacing="xl"
                    vertical-spacing="lg"
                >
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                </x-mantine-simple-grid>

                <!-- With container queries -->
                <x-mantine-simple-grid
                    type="container"
                    :cols="['base' => 1, '300px' => 2, '500px' => 5]"
                    :spacing="['base' => 10, '300px' => 'xl']"
                >
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                    <div>5</div>
                </x-mantine-simple-grid>
            </div>
        blade;
    }
}
