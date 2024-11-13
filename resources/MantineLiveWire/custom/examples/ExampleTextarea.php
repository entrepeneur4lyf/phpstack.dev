<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTextarea extends Component
{
    public $value = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic textarea -->
                <x-mantine-textarea
                    label="Input label"
                    description="Input description"
                    placeholder="Input placeholder"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-textarea
                            variant="default"
                            label="Default variant"
                            placeholder="Default variant"
                        />
                        <x-mantine-textarea
                            variant="filled"
                            label="Filled variant"
                            placeholder="Filled variant"
                        />
                        <x-mantine-textarea
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Unstyled variant"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-textarea size="xs" label="Extra small" placeholder="Extra small" />
                        <x-mantine-textarea size="sm" label="Small" placeholder="Small" />
                        <x-mantine-textarea size="md" label="Medium" placeholder="Medium" />
                        <x-mantine-textarea size="lg" label="Large" placeholder="Large" />
                        <x-mantine-textarea size="xl" label="Extra large" placeholder="Extra large" />
                    </x-mantine-stack>
                </div>

                <!-- Autosize -->
                <div class="mt-4">
                    <x-mantine-textarea
                        placeholder="Autosize with no rows limit"
                        label="Autosize with no rows limit"
                        :autosize="true"
                        :min-rows="2"
                    />

                    <x-mantine-textarea
                        label="Autosize with 4 rows max"
                        placeholder="Autosize with 4 rows max"
                        :autosize="true"
                        :min-rows="2"
                        :max-rows="4"
                        class="mt-4"
                    />
                </div>

                <!-- With resize -->
                <x-mantine-textarea
                    resize="vertical"
                    label="Resizable"
                    placeholder="Try resizing vertically"
                    class="mt-4"
                />

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-textarea
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                    />

                    <x-mantine-textarea
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid input"
                        class="mt-4"
                    />
                </div>

                <!-- Disabled state -->
                <x-mantine-textarea
                    label="Disabled"
                    placeholder="Disabled textarea"
                    :disabled="true"
                    class="mt-4"
                />

                <!-- With asterisk -->
                <x-mantine-textarea
                    label="Required field"
                    placeholder="Required field"
                    :with-asterisk="true"
                    class="mt-4"
                />

                <!-- Controlled -->
                <x-mantine-textarea
                    wire:model="value"
                    label="Controlled textarea"
                    placeholder="Type something..."
                    class="mt-4"
                />
            </div>
        blade;
    }
}
