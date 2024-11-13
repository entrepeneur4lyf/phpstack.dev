<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSparkline extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-sparkline
                        :w="200"
                        :h="60"
                        :data="[10, 20, 40, 20, 40, 10, 50]"
                        curve-type="linear"
                        color="blue"
                        :fill-opacity="0.6"
                        :stroke-width="2"
                    />
                </div>

                <!-- Different curve types -->
                <div class="mt-8">
                    <div class="flex gap-4">
                        <div>
                            <x-mantine-text size="sm" ta="center" mb="xs">Linear</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[10, 20, 40, 20, 40, 10, 50]"
                                curve-type="linear"
                                color="blue"
                                :fill-opacity="0.6"
                            />
                        </div>

                        <div>
                            <x-mantine-text size="sm" ta="center" mb="xs">Natural</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[10, 20, 40, 20, 40, 10, 50]"
                                curve-type="natural"
                                color="blue"
                                :fill-opacity="0.6"
                            />
                        </div>

                        <div>
                            <x-mantine-text size="sm" ta="center" mb="xs">Step</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[10, 20, 40, 20, 40, 10, 50]"
                                curve-type="step"
                                color="blue"
                                :fill-opacity="0.6"
                            />
                        </div>
                    </div>
                </div>

                <!-- With trend colors -->
                <div class="mt-8">
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-mantine-text>Positive trend:</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[10, 20, 40, 20, 40, 10, 50]"
                                :trend-colors="[
                                    'positive' => 'teal.6',
                                    'negative' => 'red.6',
                                    'neutral' => 'gray.5',
                                ]"
                                :fill-opacity="0.2"
                            />
                        </div>

                        <div>
                            <x-mantine-text>Negative trend:</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[50, 40, 20, 40, 20, 40, 10]"
                                :trend-colors="[
                                    'positive' => 'teal.6',
                                    'negative' => 'red.6',
                                    'neutral' => 'gray.5',
                                ]"
                                :fill-opacity="0.2"
                            />
                        </div>

                        <div>
                            <x-mantine-text>Neutral trend:</x-mantine-text>
                            <x-mantine-sparkline
                                :w="200"
                                :h="60"
                                :data="[10, 20, 40, 20, 40, 10, 50, 5, 10]"
                                :trend-colors="[
                                    'positive' => 'teal.6',
                                    'negative' => 'red.6',
                                    'neutral' => 'gray.5',
                                ]"
                                :fill-opacity="0.2"
                            />
                        </div>
                    </div>
                </div>

                <!-- With color scheme dependent color -->
                <div class="mt-8">
                    <x-mantine-sparkline
                        :w="200"
                        :h="60"
                        :data="[10, 20, 40, 20, 40, 10, 50]"
                        color="var(--chart-color)"
                        class="root"
                        :fill-opacity="0.6"
                    />
                </div>
            </div>
        blade;
    }
}
