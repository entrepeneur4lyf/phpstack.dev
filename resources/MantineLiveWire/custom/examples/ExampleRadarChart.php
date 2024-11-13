<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleRadarChart extends Component
{
    public $data = [
        ['product' => 'Apples', 'sales' => 90, 'January' => 80, 'February' => 130],
        ['product' => 'Oranges', 'sales' => 75, 'January' => 60, 'February' => 120],
        ['product' => 'Tomatoes', 'sales' => 60, 'January' => 90, 'February' => 85],
        ['product' => 'Grapes', 'sales' => 85, 'January' => 70, 'February' => 110],
        ['product' => 'Bananas', 'sales' => 100, 'January' => 100, 'February' => 100],
        ['product' => 'Lemons', 'sales' => 70, 'January' => 110, 'February' => 95],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :with-polar-radius-axis="true"
                        :series="[
                            ['name' => 'sales', 'color' => 'blue.4', 'opacity' => 0.2],
                        ]"
                    />
                </div>

                <!-- Multiple series -->
                <div class="mt-8">
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :with-polar-radius-axis="true"
                        :series="[
                            ['name' => 'Sales January', 'color' => 'lime.4', 'opacity' => 0.1],
                            ['name' => 'Sales February', 'color' => 'cyan.4', 'opacity' => 0.1],
                        ]"
                    />
                </div>

                <!-- With custom colors -->
                <div class="mt-8">
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :series="[
                            ['name' => 'sales', 'color' => 'blue', 'strokeColor' => 'blue'],
                        ]"
                    />
                </div>

                <!-- With all chart parts -->
                <div class="mt-8">
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :series="[
                            ['name' => 'Sales January', 'color' => 'lime.4', 'opacity' => 0.1],
                            ['name' => 'Sales February', 'color' => 'cyan.4', 'opacity' => 0.1],
                        ]"
                        :with-polar-grid="true"
                        :with-polar-angle-axis="true"
                        :with-polar-radius-axis="true"
                    />
                </div>

                <!-- With custom axis props -->
                <div class="mt-8">
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :with-polar-radius-axis="true"
                        :polar-radius-axis-props="[
                            'angle' => 30,
                            'tickFormatter' => function ($value) {
                                return $value . '$';
                            },
                        ]"
                        :series="[
                            ['name' => 'Sales January', 'color' => 'lime.4', 'opacity' => 0.1],
                            ['name' => 'Sales February', 'color' => 'cyan.4', 'opacity' => 0.1],
                        ]"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-radar-chart
                        :h="300"
                        :data="$data"
                        data-key="product"
                        :with-polar-radius-axis="true"
                        :with-legend="true"
                        :series="[
                            ['name' => 'Sales January', 'color' => 'blue.6', 'opacity' => 0.2],
                            ['name' => 'Sales February', 'color' => 'orange.6', 'opacity' => 0.2],
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
