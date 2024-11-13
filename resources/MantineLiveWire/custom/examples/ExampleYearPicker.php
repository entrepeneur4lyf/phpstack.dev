<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleYearPicker extends Component
{
    public $value = null;
    public $multipleValue = [];
    public $rangeValue = [null, null];
    public $date = null;

    public function setValue($date)
    {
        $this->value = $date;
    }

    public function setMultipleValue($dates)
    {
        $this->multipleValue = $dates;
    }

    public function setRangeValue($range)
    {
        $this->rangeValue = $range;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-year-picker
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- With allow deselect -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :allow-deselect="true"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- Multiple years -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        type="multiple"
                        :value="$multipleValue"
                        wire:change="setMultipleValue($event)"
                    />
                </div>

                <!-- Year range -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With single year in range -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        type="range"
                        :allow-single-date-in-range="true"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With default date -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :default-date="new \DateTime('2040-02-01')"
                    />
                </div>

                <!-- With controlled date -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :date="$date"
                        wire:date-change="setDate($event)"
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With min and max date -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :min-date="new \DateTime('2021-02-01')"
                        :max-date="new \DateTime('2028-02-01')"
                    />
                </div>

                <!-- With custom control props -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :get-year-control-props="function ($date) {
                            if (date('Y', strtotime($date)) === date('Y')) {
                                return [
                                    'style' => [
                                        'color' => 'var(--mantine-color-blue-filled)',
                                        'fontWeight' => 700,
                                    ],
                                ];
                            }
                            if (date('Y', strtotime($date)) === date('Y') + 1) {
                                return ['disabled' => true];
                            }
                            return [];
                        }"
                    />
                </div>

                <!-- With multiple columns -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        type="range"
                        :number-of-columns="2"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        size="xl"
                        :default-value="now()"
                    />
                </div>

                <!-- With custom formats -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        years-list-format="YY"
                        decade-label-format="YY"
                    />
                </div>

                <!-- With aria labels -->
                <div class="mt-8">
                    <x-mantine-year-picker
                        :aria-labels="[
                            'nextDecade' => 'Next decade',
                            'previousDecade' => 'Previous decade',
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
