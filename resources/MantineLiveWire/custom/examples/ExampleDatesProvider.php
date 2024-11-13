<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDatesProvider extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-dates-provider>
                        <x-mantine-date-picker-input
                            label="Pick date"
                            placeholder="Pick date"
                        />
                    </x-mantine-dates-provider>
                </div>

                <!-- With all settings -->
                <div class="mt-8">
                    <x-mantine-dates-provider
                        :settings="[
                            'locale' => 'ru',
                            'firstDayOfWeek' => 0,
                            'weekendDays' => [0],
                            'timezone' => 'UTC',
                        ]"
                    >
                        <x-mantine-month-picker-input
                            label="Pick month"
                            placeholder="Pick month"
                        />
                        <x-mantine-date-picker-input
                            mt="md"
                            label="Pick date"
                            placeholder="Pick date"
                        />
                    </x-mantine-dates-provider>
                </div>

                <!-- With timezone -->
                <div class="mt-8">
                    <x-mantine-dates-provider :settings="['timezone' => 'America/New_York']">
                        <x-mantine-date-time-picker
                            label="Pick a Date"
                            placeholder="Pick a Date"
                            :default-value="new \DateTime('2000-10-03 02:10:00Z')"
                        />
                    </x-mantine-dates-provider>
                </div>

                <!-- With weekend customization -->
                <div class="mt-8">
                    <x-mantine-dates-provider
                        :settings="[
                            'firstDayOfWeek' => 1,
                            'weekendDays' => [5, 6],  // Friday and Saturday
                            'timezone' => 'Asia/Dubai'
                        ]"
                    >
                        <x-mantine-date-picker />
                    </x-mantine-dates-provider>
                </div>

                <!-- With consistent weeks and localization -->
                <div class="mt-8">
                    <x-mantine-dates-provider
                        :settings="[
                            'locale' => 'fr',
                            'consistentWeeks' => true,
                            'firstDayOfWeek' => 1,
                            'timezone' => 'Europe/Paris'
                        ]"
                    >
                        <x-mantine-date-picker />
                    </x-mantine-dates-provider>
                </div>

                <!-- With custom styles -->
                <div class="mt-8">
                    <x-mantine-dates-provider
                        :settings="[
                            'locale' => 'en',
                            'timezone' => 'UTC'
                        ]"
                        :styles="[
                            'day' => [
                                'selected' => ['backgroundColor' => 'var(--mantine-color-blue-6)'],
                                'weekend' => ['color' => 'var(--mantine-color-red-6)'],
                            ],
                        ]"
                    >
                        <x-mantine-date-picker />
                    </x-mantine-dates-provider>
                </div>
            </div>
        blade;
    }
}
