<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDateTimePicker extends Component
{
    public $value = null;

    public function setValue($date)
    {
        $this->value = $date;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-date-time-picker
                        label="Pick date and time"
                        placeholder="Pick date and time"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- With seconds -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        :with-seconds="true"
                        label="With seconds"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- Custom value format -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        value-format="DD MMM YYYY hh:mm A"
                        label="Custom format"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- With clearable -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        :clearable="true"
                        :default-value="now()"
                        label="Clearable input"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- Open in modal -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        dropdown-type="modal"
                        label="Modal picker"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- Input variants -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-time-picker
                            label="Default variant"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            variant="filled"
                            label="Filled variant"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Pick date and time"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-time-picker
                            size="xs"
                            label="Size XS"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            size="sm"
                            label="Size SM"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            size="md"
                            label="Size MD"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            size="lg"
                            label="Size LG"
                            placeholder="Pick date and time"
                        />
                        <x-mantine-date-time-picker
                            size="xl"
                            label="Size XL"
                            placeholder="Pick date and time"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With error state -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        label="With error"
                        placeholder="Pick date and time"
                        error="Invalid date/time"
                    />
                </div>

                <!-- With description -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        label="With description"
                        description="Pick any date and time"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- Required with asterisk -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        label="Required field"
                        :with-asterisk="true"
                        placeholder="Pick date and time"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-8">
                    <x-mantine-date-time-picker
                        label="Disabled"
                        placeholder="Pick date and time"
                        :disabled="true"
                    />
                </div>
            </div>
        blade;
    }
}
