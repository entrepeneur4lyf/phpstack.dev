<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCopyButton extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-copy-button value="https://mantine.dev">
                    (copied, copy) => (
                        <x-mantine-button
                            :color="copied ? 'teal' : 'blue'"
                            :on-click="copy"
                        >
                            {copied ? 'Copied url' : 'Copy url'}
                        </x-mantine-button>
                    )
                </x-mantine-copy-button>

                <!-- With custom timeout -->
                <div class="mt-4">
                    <x-mantine-copy-button
                        value="https://mantine.dev"
                        :timeout="2000"
                    >
                        (copied, copy) => (
                            <x-mantine-tooltip
                                :label="copied ? 'Copied' : 'Copy'"
                                with-arrow
                                position="right"
                            >
                                <x-mantine-action-icon
                                    :color="copied ? 'teal' : 'gray'"
                                    variant="subtle"
                                    :on-click="copy"
                                >
                                    @if(copied)
                                        <i class="fas fa-check" style="width: 16px"></i>
                                    @else
                                        <i class="fas fa-copy" style="width: 16px"></i>
                                    @endif
                                </x-mantine-action-icon>
                            </x-mantine-tooltip>
                        )
                    </x-mantine-copy-button>
                </div>

                <!-- With copy event handler -->
                <div class="mt-4">
                    <x-mantine-copy-button
                        value="Text to copy"
                        :on-copy="fn($value) => $this->handleCopy($value)"
                    >
                        (copied, copy) => (
                            <x-mantine-button :on-click="copy">
                                {copied ? 'Copied!' : 'Copy with event handler'}
                            </x-mantine-button>
                        )
                    </x-mantine-copy-button>
                </div>

                <!-- With different button styles -->
                <div class="mt-4">
                    <x-mantine-copy-button value="Style variations">
                        (copied, copy) => (
                            <x-mantine-button
                                :variant="copied ? 'light' : 'filled'"
                                :color="copied ? 'teal' : 'blue'"
                                :on-click="copy"
                            >
                                {copied ? 'Text copied' : 'Copy text'}
                            </x-mantine-button>
                        )
                    </x-mantine-copy-button>
                </div>

                <!-- Inside a group -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-copy-button value="First value">
                            (copied, copy) => (
                                <x-mantine-button :on-click="copy">
                                    {copied ? 'Copied first' : 'Copy first'}
                                </x-mantine-button>
                            )
                        </x-mantine-copy-button>

                        <x-mantine-copy-button value="Second value">
                            (copied, copy) => (
                                <x-mantine-button :on-click="copy">
                                    {copied ? 'Copied second' : 'Copy second'}
                                </x-mantine-button>
                            )
                        </x-mantine-copy-button>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }

    public function handleCopy($value)
    {
        // Handle copy event
        $this->dispatch('notify', [
            'message' => "Copied text: {$value}",
            'type' => 'success'
        ]);
    }
}
