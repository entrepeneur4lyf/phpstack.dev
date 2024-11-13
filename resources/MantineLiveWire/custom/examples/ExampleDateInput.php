<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDateInput extends Component
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
                    <x-mantine-date-input
                        label="Date input"
                        placeholder="Pick date"
                        :value="$value"
                        wire:change="setValue($event)"
                    />
                </div>

                <!-- Custom value format -->
                <div class="mt-8">
                    <x-mantine-date-input
                        value-format="YYYY MMM DD"
                        label="Custom format"
                        placeholder="YYYY MMM DD"
                    />
                </div>

                <!-- With time -->
                <div class="mt-8">
                    <x-mantine-date-input
                        value-format="DD/MM/YYYY HH:mm:ss"
                        label="With time"
                        placeholder="DD/MM/YYYY HH:mm:ss"
                    />
                </div>

                <!-- Custom date parser -->
                <div class="mt-8">
                    <x-mantine-date-input
                        :date-parser="function ($input) {
                            if ($input === 'WW2') {
                                return new \DateTime('1939-09-01');
                            }
                            return \DateTime::createFromFormat('d/m/Y', $input);
                        }"
                        value-format="DD/MM/YYYY"
                        label="Type WW2"
                        placeholder="Type WW2 or DD/MM/YYYY"
                    />
                </div>

                <!-- With clearable -->
                <div class="mt-8">
                    <x-mantine-date-input
                        :clearable="true"
                        :default-value="now()"
                        label="Clearable input"
                        placeholder="Pick date"
                    />
                </div>

                <!-- With min and max date -->
                <div class="mt-8">
                    <x-mantine-date-input
                        :min-date="now()"
                        :max-date="now()->addMonth()"
                        label="Date range"
                        placeholder="Pick date within a month"
                    />
                </div>

                <!-- Input variants -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-input
                            label="Default variant"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            variant="filled"
                            label="Filled variant"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Pick date"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-date-input
                            size="xs"
                            label="Size XS"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            size="sm"
                            label="Size SM"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            size="md"
                            label="Size MD"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            size="lg"
                            label="Size LG"
                            placeholder="Pick date"
                        />
                        <x-mantine-date-input
                            size="xl"
                            label="Size XL"
                            placeholder="Pick date"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With error state -->
                <div class="mt-8">
                    <x-mantine-date-input
                        label="With error"
                        placeholder="Pick date"
                        error="Invalid date"
                    />
                </div>

                <!-- With description -->
                <div class="mt-8">
                    <x-mantine-date-input
                        label="With description"
                        description="Pick any date"
                        placeholder="Pick date"
                    />
                </div>

                <!-- Required with asterisk -->
                <div class="mt-8">
                    <x-mantine-date-input
                        label="Required field"
                        :with-asterisk="true"
                        placeholder="Pick date"
                    />
                </div>
            </div>
        blade;
    }
}
