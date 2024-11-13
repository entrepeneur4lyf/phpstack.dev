<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleJsonInput extends Component
{
    public ?string $json = null;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic JSON input -->
                <x-mantine-json-input
                    label="Your package.json"
                    placeholder="Textarea will autosize to fit the content"
                    validation-error="Invalid JSON"
                    :format-on-blur="true"
                    :autosize="true"
                    :min-rows="4"
                    wire:model="json"
                />

                <!-- With description and error -->
                <x-mantine-json-input
                    label="Configuration"
                    description="Enter your configuration in JSON format"
                    error="This field is required"
                    placeholder="Enter JSON"
                    class="mt-4"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-json-input
                            variant="default"
                            placeholder="Default variant"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            variant="filled"
                            placeholder="Filled variant"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            variant="unstyled"
                            placeholder="Unstyled variant"
                            :min-rows="2"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-json-input
                            size="xs"
                            placeholder="Extra small"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            size="sm"
                            placeholder="Small"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            size="md"
                            placeholder="Medium"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            size="lg"
                            placeholder="Large"
                            :min-rows="2"
                        />
                        <x-mantine-json-input
                            size="xl"
                            placeholder="Extra large"
                            :min-rows="2"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Disabled state -->
                <x-mantine-json-input
                    label="Disabled"
                    :disabled="true"
                    :default-value='{ "disabled": true }'
                    class="mt-4"
                />

                <!-- With validation error -->
                <x-mantine-json-input
                    label="With validation"
                    validation-error="Please enter valid JSON"
                    :format-on-blur="true"
                    class="mt-4"
                />

                <!-- Required with asterisk -->
                <x-mantine-json-input
                    label="Required field"
                    :required="true"
                    :with-asterisk="true"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
