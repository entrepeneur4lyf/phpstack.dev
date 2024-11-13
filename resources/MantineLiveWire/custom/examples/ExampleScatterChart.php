<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleScatterChart extends Component
{
    public $data = [
        ['age' => 25, 'BMI' => 22.5, 'group' => 1, 'spending' => 1200],
        ['age' => 30, 'BMI' => 25.0, 'group' => 1, 'spending' => 1500],
        ['age' => 35, 'BMI' => 30.4, 'group' => 1, 'spending' => 1800],
        ['age' => 40, 'BMI' => 28.2, 'group' => 1, 'spending' => 2200],
        ['age' => 45, 'BMI' => 26.8, 'group' => 2, 'spending' => 2500],
        ['age' => 50, 'BMI' => 32.2, 'group' => 2, 'spending' => 2800],
        ['age' => 55, 'BMI' => 29.4, 'group' => 2, 'spending' => 3000],
        ['age' => 60, 'BMI' => 27.3, 'group' => 2, 'spending' => 3400],
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                    />
                </div>

                <!-- With legend -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        :with-legend="true"
                    />
                </div>

                <!-- With custom legend position -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        :with-legend="true"
                        :legend-props="['verticalAlign' => 'bottom', 'height' => 20]"
                    />
                </div>

                <!-- With custom axis orientation -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        tick-line="xy"
                        :y-axis-props="['tickMargin' => 15, 'orientation' => 'right']"
                        :x-axis-props="['tickMargin' => 15, 'orientation' => 'top']"
                    />
                </div>

                <!-- With value formatter -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'spending']"
                        :y-axis-props="['domain' => [800, 3400]]"
                        :value-formatter="[
                            'x' => function ($value) { return $value . ' years'; },
                            'y' => function ($value) { return '$' . number_format($value); },
                        ]"
                    />
                </div>

                <!-- With point labels -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        point-labels="x"
                    />
                </div>

                <!-- With custom tooltip -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        :tooltip-props="[
                            'content' => function ($payload) {
                                return view('components.chart-tooltip', ['payload' => $payload])->render();
                            },
                        ]"
                    />
                </div>

                <!-- With reference lines -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        :reference-lines="[
                            ['y' => 14, 'label' => 'Underweight ↓', 'color' => 'red.7'],
                            ['y' => 19, 'label' => 'Normal weight', 'color' => 'teal.7'],
                            ['y' => 30, 'label' => 'Overweight ↑', 'color' => 'red.7'],
                        ]"
                    />
                </div>

                <!-- With custom dots -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'BMI']"
                        x-axis-label="Age"
                        y-axis-label="BMI"
                        :scatter-props="['shape' => '<circle r=\'3\' />']"
                    />
                </div>

                <!-- With units -->
                <div class="mt-8">
                    <x-mantine-scatter-chart
                        :h="350"
                        :data="$data"
                        :data-key="['x' => 'age', 'y' => 'spending']"
                        :y-axis-props="['domain' => [800, 3500]]"
                        :unit="['y' => '$']"
                        :labels="['x' => 'Age', 'y' => 'Spending']"
                    />
                </div>
            </div>
        blade;
    }
}
