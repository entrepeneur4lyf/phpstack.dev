<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSwitchInput extends Component
{
    public $checked = false;
    public $groupValue = ['react'];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic switch -->
                <x-mantine-switch-input
                    wire:model="checked"
                    label="I agree to sell my privacy"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-switch-input size="xs" label="Extra small" />
                        <x-mantine-switch-input size="sm" label="Small" />
                        <x-mantine-switch-input size="md" label="Medium" />
                        <x-mantine-switch-input size="lg" label="Large" />
                        <x-mantine-switch-input size="xl" label="Extra large" />
                    </x-mantine-stack>
                </div>

                <!-- With inner labels -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-switch-input size="xs" on-label="ON" off-label="OFF" />
                        <x-mantine-switch-input size="sm" on-label="ON" off-label="OFF" />
                        <x-mantine-switch-input size="md" on-label="ON" off-label="OFF" />
                        <x-mantine-switch-input size="lg" on-label="ON" off-label="OFF" />
                        <x-mantine-switch-input size="xl" on-label="ON" off-label="OFF" />
                    </x-mantine-group>
                </div>

                <!-- With icon labels -->
                <x-mantine-switch-input
                    size="md"
                    color="dark.4"
                    :on-label='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                    :off-label='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z"/></svg>'
                    class="mt-4"
                />

                <!-- With thumb icon -->
                <x-mantine-switch-input
                    wire:model="checked"
                    color="teal"
                    size="md"
                    label="Switch with thumb icon"
                    :thumb-icon="$checked
                        ? '<svg width=\"12\" height=\"12\" viewBox=\"0 0 24 24\"><path d=\"M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z\"/></svg>'
                        : '<svg width=\"12\" height=\"12\" viewBox=\"0 0 24 24\"><path d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\"/></svg>'"
                    class="mt-4"
                />

                <!-- Switch group -->
                <x-mantine-switch-input-group
                    wire:model="groupValue"
                    label="Select your favorite framework/library"
                    description="This is anonymous"
                    :with-asterisk="true"
                    class="mt-4"
                >
                    <x-mantine-group mt="xs">
                        <x-mantine-switch-input value="react" label="React" />
                        <x-mantine-switch-input value="svelte" label="Svelte" />
                        <x-mantine-switch-input value="ng" label="Angular" />
                        <x-mantine-switch-input value="vue" label="Vue" />
                    </x-mantine-group>
                </x-mantine-switch-input-group>

                <!-- With error -->
                <x-mantine-switch-input
                    label="With error"
                    error="This field is required"
                    class="mt-4"
                />

                <!-- With description -->
                <x-mantine-switch-input
                    label="With description"
                    description="This is a helpful description"
                    class="mt-4"
                />

                <!-- Different label positions -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-switch-input label="Right label" label-position="right" />
                        <x-mantine-switch-input label="Left label" label-position="left" />
                    </x-mantine-stack>
                </div>

                <!-- Disabled state -->
                <x-mantine-switch-input
                    label="Disabled switch"
                    :disabled="true"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
