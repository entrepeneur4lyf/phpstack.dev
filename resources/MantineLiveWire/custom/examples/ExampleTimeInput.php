<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTimeInput extends Component
{
    public $value = '';

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-time-input
                        label="Input label"
                        description="Input description"
                    />
                </div>

                <!-- Controlled -->
                <div class="mt-8">
                    <x-mantine-time-input
                        :value="$value"
                        wire:change="setValue($event.target.value)"
                    />
                </div>

                <!-- With browser picker -->
                <div class="mt-8">
                    <x-mantine-time-input
                        label="Click icon to show browser picker"
                        :right-section="function () {
                            return <<<'HTML'
                                <x-mantine-action-icon
                                    variant="subtle"
                                    color="gray"
                                    onclick="this.previousElementSibling.showPicker()"
                                >
                                    <x-mantine-icon-clock
                                        style="width: 16px; height: 16px"
                                        :stroke="1.5"
                                    />
                                </x-mantine-action-icon>
                            HTML;
                        }"
                    />
                </div>

                <!-- With seconds -->
                <div class="mt-8">
                    <x-mantine-time-input
                        :with-seconds="true"
                    />
                </div>

                <!-- With icon -->
                <div class="mt-8">
                    <x-mantine-time-input
                        :left-section="function () {
                            return <<<'HTML'
                                <x-mantine-icon-clock
                                    style="width: 16px; height: 16px"
                                    :stroke="1.5"
                                />
                            HTML;
                        }"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-8">
                    <x-mantine-time-input
                        :disabled="true"
                    />
                </div>

                <!-- Input variants -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-time-input
                            variant="default"
                            label="Default variant"
                        />
                        <x-mantine-time-input
                            variant="filled"
                            label="Filled variant"
                        />
                        <x-mantine-time-input
                            variant="unstyled"
                            label="Unstyled variant"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-time-input
                            size="xs"
                            label="Size XS"
                        />
                        <x-mantine-time-input
                            size="sm"
                            label="Size SM"
                        />
                        <x-mantine-time-input
                            size="md"
                            label="Size MD"
                        />
                        <x-mantine-time-input
                            size="lg"
                            label="Size LG"
                        />
                        <x-mantine-time-input
                            size="xl"
                            label="Size XL"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different radius -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-time-input
                            radius="xs"
                            label="Radius XS"
                        />
                        <x-mantine-time-input
                            radius="sm"
                            label="Radius SM"
                        />
                        <x-mantine-time-input
                            radius="md"
                            label="Radius MD"
                        />
                        <x-mantine-time-input
                            radius="lg"
                            label="Radius LG"
                        />
                        <x-mantine-time-input
                            radius="xl"
                            label="Radius XL"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With error state -->
                <div class="mt-8">
                    <x-mantine-time-input
                        label="With error"
                        error="Invalid time"
                    />
                </div>

                <!-- With description -->
                <div class="mt-8">
                    <x-mantine-time-input
                        label="With description"
                        description="Enter time in 24-hour format"
                    />
                </div>

                <!-- Required with asterisk -->
                <div class="mt-8">
                    <x-mantine-time-input
                        label="Required field"
                        :with-asterisk="true"
                    />
                </div>
            </div>
        blade;
    }
}
