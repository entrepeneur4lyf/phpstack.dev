<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDatePickerInput extends Component
{
    public $value = null;
    public $multipleValue = [];
    public $rangeValue = [null, null];

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

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-date-picker-input
                        label="Pick date"
                        placeholder="Pick date"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- Multiple dates -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        type="multiple"
                        label="Pick dates"
                        placeholder="Pick dates"
                        :value="$multipleValue"
                        wire:change="setMultipleValue($event)"
                    />
                </div>

                <!-- Date range -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        type="range"
                        label="Pick dates range"
                        placeholder="Pick dates range"
                        :value="$rangeValue"
                        wire:change="setRangeValue($event)"
                    />
                </div>

                <!-- Open in modal -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        dropdown-type="modal"
                        label="Pick date"
                        placeholder="Pick date"
                    />
                </div>

                <!-- Custom value format -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        value-format="YYYY MMM DD"
                        type="multiple"
                        label="Pick date"
                        placeholder="Pick date"
                    />
                </div>

                <!-- Custom value formatter -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        type="multiple"
                        label="Pick 2 dates or more"
                        placeholder="Pick 2 dates or more"
                        :value-formatter="function ($props) {
                            if ($props['type'] === 'multiple' && is_array($props['date'])) {
                                if (count($props['date']) === 1) {
                                    return date('Y M d', strtotime($props['date'][0]));
                                }
                                if (count($props['date']) > 1) {
                                    return count($props['date']) . ' dates selected';
                                }
                                return '';
                            }
                            return '';
                        }"
                    />
                </div>

                <!-- With clearable -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        :clearable="true"
                        :default-value="now()"
                        label="Pick date"
                        placeholder="Pick date"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        value-format="YYYY MMM DD"
                        type="multiple"
                        label="Disabled"
                        placeholder="Pick date"
                        :disabled="true"
                    />
                </div>

                <!-- Input variants -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        placeholder="Pick date"
                        label="Pick date"
                        :with-asterisk="true"
                    />
                </div>

                <!-- With icon -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        label="Pick date"
                        placeholder="Pick date"
                        :left-section="function () {
                            return <<<'HTML'
                                <x-mantine-icon-calendar
                                    style="width: 18px; height: 18px"
                                    :stroke="1.5"
                                />
                            HTML;
                        }"
                        left-section-pointer-events="none"
                    />
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-picker-input
                            size="xs"
                            label="Size XS"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            size="sm"
                            label="Size SM"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            size="md"
                            label="Size MD"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            size="lg"
                            label="Size LG"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            size="xl"
                            label="Size XL"
                            placeholder="Pick date"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different variants -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-picker-input
                            variant="default"
                            label="Default variant"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            variant="filled"
                            label="Filled variant"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-picker-input
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Pick date"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With error state -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        label="With error"
                        placeholder="Pick date"
                        error="Invalid date"
                    />
                </div>

                <!-- With description -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        label="With description"
                        description="Pick any date"
                        placeholder="Pick date"
                    />
                </div>

                <!-- Required with asterisk -->
                <div class="mt-8">
                    <x-mantine-date-picker-input
                        label="Required field"
                        :with-asterisk="true"
                        placeholder="Pick date"
                    />
                </div>
            </div>
        blade;
    }
}
