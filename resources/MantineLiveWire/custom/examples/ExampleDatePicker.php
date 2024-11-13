<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDatePicker extends Component
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
                    <x-mantine-date-picker
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- With allow deselect -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :allow-deselect="true"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- Multiple dates -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        type="multiple"
                        :value="$multipleValue"
                        wire:change="setMultipleValue($event)"
                    />
                </div>

                <!-- Date range -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With single date in range -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        type="range"
                        :allow-single-date-in-range="true"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With default date -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :default-date="new \DateTime('2015-02-01')"
                    />
                </div>

                <!-- With controlled date -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :date="$date"
                        wire:date-change="setDate($event)"
                        type="range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With default level -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-date-picker default-level="decade" />
                        <x-mantine-date-picker default-level="year" />
                    </x-mantine-group>
                </div>

                <!-- Hide outside dates -->
                <div class="mt-8">
                    <x-mantine-date-picker :hide-outside-dates="true" />
                </div>

                <!-- First day of week -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-date-picker :first-day-of-week="0" />
                        <x-mantine-date-picker :first-day-of-week="6" />
                    </x-mantine-group>
                </div>

                <!-- Hide weekdays -->
                <div class="mt-8">
                    <x-mantine-date-picker :hide-weekdays="true" />
                </div>

                <!-- Weekend days -->
                <div class="mt-8">
                    <x-mantine-date-picker :weekend-days="[1, 2]" />
                </div>

                <!-- With custom day render -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :render-day="function ($date) {
                            $day = date('j', strtotime($date));
                            return <<<'HTML'
                                <x-mantine-indicator
                                    size="6"
                                    color="red"
                                    offset="-5"
                                    :disabled="$day !== 16"
                                >
                                    <div>{{ $day }}</div>
                                </x-mantine-indicator>
                            HTML;
                        }"
                    />
                </div>

                <!-- With min and max date -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :min-date="new \DateTime('2022-02-10')"
                        :max-date="new \DateTime('2022-02-25')"
                        :default-date="new \DateTime('2022-02-01')"
                    />
                </div>

                <!-- With custom control props -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :default-date="new \DateTime('2021-08-01')"
                        :get-day-props="function ($date) {
                            if (date('w', strtotime($date)) === 5 && date('j', strtotime($date)) === 13) {
                                return [
                                    'style' => [
                                        'backgroundColor' => 'var(--mantine-color-red-filled)',
                                        'color' => 'var(--mantine-color-white)',
                                    ],
                                ];
                            }
                            return [];
                        }"
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

                <!-- With exclude dates -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :exclude-date="function ($date) {
                            return date('w', strtotime($date)) !== 5;
                        }"
                    />
                </div>

                <!-- With multiple columns -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        type="range"
                        :number-of-columns="2"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- With max level -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-date-picker max-level="year" />
                        <x-mantine-date-picker max-level="month" />
                    </x-mantine-group>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        size="xl"
                        :default-value="now()"
                    />
                </div>

                <!-- With custom formats -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        months-list-format="MM"
                        years-list-format="YY"
                        decade-label-format="YY"
                        year-label-format="YYYY [year]"
                        month-label-format="MM/YY"
                    />
                </div>

                <!-- With localization -->
                <div class="mt-8">
                    <x-mantine-date-picker locale="ru" />
                </div>

                <!-- With aria labels -->
                <div class="mt-8">
                    <x-mantine-date-picker
                        :aria-labels="[
                            'nextDecade' => 'Next decade',
                            'previousDecade' => 'Previous decade',
                            'nextYear' => 'Next year',
                            'previousYear' => 'Previous year',
                            'nextMonth' => 'Next month',
                            'previousMonth' => 'Previous month',
                            'yearLevelControl' => 'Change to decade view',
                            'monthLevelControl' => 'Change to year view',
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
