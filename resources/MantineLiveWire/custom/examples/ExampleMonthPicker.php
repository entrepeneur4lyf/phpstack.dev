<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleMonthPicker extends Component
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
                    <x-mantine-month-picker
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- With allow deselect -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        :allow-deselect="true"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- Multiple months -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        type="multiple"
                        :value="$multipleValue"
                        wire:change="setMultipleValue($event)"
                    />
                </div>

                <!-- Month range -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With single month in range -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        type="range"
                        :allow-single-date-in-range="true"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With default date -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        :default-date="new \DateTime('2015-02-01')"
                    />
                </div>

                <!-- With controlled date -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        :date="$date"
                        wire:date-change="setDate($event)"
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With min and max date -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        :min-date="new \DateTime('2022-02-01')"
                        :max-date="new \DateTime('2022-09-01')"
                        :default-date="new \DateTime('2022-02-01')"
                    />
                </div>

                <!-- With custom control props -->
                <div class="mt-8">
                    <x-mantine-month-picker
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
                        :get-month-control-props="function ($date) {
                            if (date('n', strtotime($date)) === 2) {
                                return [
                                    'style' => [
                                        'color' => 'var(--mantine-color-blue-filled)',
                                        'fontWeight' => 700,
                                    ],
                                ];
                            }
                            if (date('n', strtotime($date)) === 6) {
                                return ['disabled' => true];
                            }
                            return [];
                        }"
                    />
                </div>

                <!-- With multiple columns -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        type="range"
                        :number-of-columns="2"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With max level -->
                <div class="mt-8">
                    <x-mantine-month-picker max-level="year" />
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        size="xl"
                        :default-value="now()"
                    />
                </div>

                <!-- With custom formats -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        months-list-format="MM"
                        years-list-format="YY"
                        decade-label-format="YY"
                        year-label-format="YYYY [year]"
                    />
                </div>

                <!-- With localization -->
                <div class="mt-8">
                    <x-mantine-month-picker locale="ru" />
                </div>

                <!-- With aria labels -->
                <div class="mt-8">
                    <x-mantine-month-picker
                        :aria-labels="[
                            'nextDecade' => 'Next decade',
                            'previousDecade' => 'Previous decade',
                            'nextYear' => 'Next year',
                            'previousYear' => 'Previous year',
                            'yearLevelControl' => 'Change to decade view',
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
