<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTextInput extends Component
{
    public $value = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic text input -->
                <x-mantine-text-input
                    label="Input label"
                    description="Input description"
                    placeholder="Input placeholder"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-text-input
                            variant="default"
                            label="Default variant"
                            placeholder="Default variant"
                        />
                        <x-mantine-text-input
                            variant="filled"
                            label="Filled variant"
                            placeholder="Filled variant"
                        />
                        <x-mantine-text-input
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Unstyled variant"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-text-input size="xs" label="Extra small" placeholder="Extra small" />
                        <x-mantine-text-input size="sm" label="Small" placeholder="Small" />
                        <x-mantine-text-input size="md" label="Medium" placeholder="Medium" />
                        <x-mantine-text-input size="lg" label="Large" placeholder="Large" />
                        <x-mantine-text-input size="xl" label="Extra large" placeholder="Extra large" />
                    </x-mantine-stack>
                </div>

                <!-- With sections -->
                <div class="mt-4">
                    <x-mantine-text-input
                        :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>'
                        left-section-pointer-events="none"
                        label="Your email"
                        placeholder="Your email"
                    />

                    <x-mantine-text-input
                        mt="md"
                        :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>'
                        right-section-pointer-events="none"
                        label="Your email"
                        placeholder="Your email"
                        class="mt-4"
                    />
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-text-input
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                    />

                    <x-mantine-text-input
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid name"
                        class="mt-4"
                    />
                </div>

                <!-- Disabled state -->
                <x-mantine-text-input
                    label="Disabled"
                    placeholder="Disabled input"
                    :disabled="true"
                    class="mt-4"
                />

                <!-- With asterisk -->
                <x-mantine-text-input
                    label="Required field"
                    placeholder="Required field"
                    :with-asterisk="true"
                    class="mt-4"
                />

                <!-- Controlled -->
                <x-mantine-text-input
                    wire:model="value"
                    label="Controlled input"
                    placeholder="Type something..."
                    class="mt-4"
                />
            </div>
        blade;
    }
}
