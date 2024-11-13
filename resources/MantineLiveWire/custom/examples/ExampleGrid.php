<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleGrid extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic grid with equal columns -->
                <x-mantine-grid :columns="3" gutter="md">
                    <x-mantine-grid-col>
                        <div>First column</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col>
                        <div>Second column</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col>
                        <div>Third column</div>
                    </x-mantine-grid-col>
                </x-mantine-grid>

                <!-- Responsive grid with different spans -->
                <x-mantine-grid gutter="lg">
                    <x-mantine-grid-col :span="12" :md="6" :lg="3">
                        <div>Responsive column</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="12" :md="6" :lg="3">
                        <div>Responsive column</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="12" :md="6" :lg="3">
                        <div>Responsive column</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="12" :md="6" :lg="3">
                        <div>Responsive column</div>
                    </x-mantine-grid-col>
                </x-mantine-grid>

                <!-- Grid with offset and order -->
                <x-mantine-grid gutter="xl">
                    <x-mantine-grid-col :span="4">
                        <div>First</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="4" :offset="4">
                        <div>Second with offset</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="4" order="3">
                        <div>Third ordered</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :span="4" order="2">
                        <div>Fourth ordered</div>
                    </x-mantine-grid-col>
                </x-mantine-grid>

                <!-- Auto-growing columns -->
                <x-mantine-grid :grow="true" gutter="md">
                    <x-mantine-grid-col :span="4">
                        <div>Fixed width</div>
                    </x-mantine-grid-col>
                    <x-mantine-grid-col :grow="true">
                        <div>Grows to fill space</div>
                    </x-mantine-grid-col>
                </x-mantine-grid>
            </div>
        blade;
    }
}
