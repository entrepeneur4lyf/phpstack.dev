<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleInput extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic input -->
                <x-mantine-input placeholder="Basic input" />

                <!-- Input with wrapper -->
                <x-mantine-input-wrapper
                    label="Input label"
                    description="Input description"
                    class="mt-4"
                >
                    <x-mantine-input placeholder="Input with wrapper" />
                </x-mantine-input-wrapper>

                <!-- With sections -->
                <x-mantine-input
                    :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                    :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z"/></svg>'
                    :left-section-pointer-events="'none'"
                    placeholder="Input with sections"
                    class="mt-4"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-input variant="default" placeholder="Default variant" />
                        <x-mantine-input variant="filled" placeholder="Filled variant" />
                        <x-mantine-input variant="unstyled" placeholder="Unstyled variant" />
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-input size="xs" placeholder="Extra small" />
                        <x-mantine-input size="sm" placeholder="Small" />
                        <x-mantine-input size="md" placeholder="Medium" />
                        <x-mantine-input size="lg" placeholder="Large" />
                        <x-mantine-input size="xl" placeholder="Extra large" />
                    </x-mantine-stack>
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-input-wrapper
                        label="With error"
                        error="This field is required"
                    >
                        <x-mantine-input :error="true" placeholder="Error input" />
                    </x-mantine-input-wrapper>
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-input-wrapper
                        label="Disabled input"
                        description="This input is disabled"
                    >
                        <x-mantine-input :disabled="true" placeholder="Cannot type here" />
                    </x-mantine-input-wrapper>
                </div>

                <!-- Custom input element -->
                <div class="mt-4">
                    <x-mantine-input
                        component="select"
                        :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>'
                        :pointer="true"
                    >
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </x-mantine-input>
                </div>

                <!-- Custom wrapper order -->
                <div class="mt-4">
                    <x-mantine-input-wrapper
                        label="Custom order"
                        description="Description below input"
                        error="Error at the top"
                        :input-wrapper-order="['label', 'error', 'input', 'description']"
                    >
                        <x-mantine-input placeholder="Input with custom wrapper order" />
                    </x-mantine-input-wrapper>
                </div>
            </div>
        blade;
    }
}
