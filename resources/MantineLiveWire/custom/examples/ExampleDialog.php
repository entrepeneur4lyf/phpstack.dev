<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDialog extends Component
{
    public $opened = false;
    public $email = '';

    public function toggleDialog()
    {
        $this->opened = !$this->opened;
    }

    public function closeDialog()
    {
        $this->opened = false;
    }

    public function subscribe()
    {
        // Handle subscription logic here
        $this->dispatch('notify', [
            'message' => 'Successfully subscribed!',
            'type' => 'success'
        ]);
        $this->closeDialog();
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage with email subscription -->
                <div>
                    <x-mantine-group justify="center">
                        <x-mantine-button :on-click="fn() => $this->toggleDialog()">
                            Toggle dialog
                        </x-mantine-button>
                    </x-mantine-group>

                    <x-mantine-dialog
                        :opened="$opened"
                        :with-close-button="true"
                        :on-close="fn() => $this->closeDialog()"
                        size="lg"
                        radius="md"
                    >
                        <x-mantine-text size="sm" mb="xs" fw="500">
                            Subscribe to email newsletter
                        </x-mantine-text>

                        <x-mantine-group align="flex-end">
                            <x-mantine-text-input
                                placeholder="hello@gluesticker.com"
                                style="flex: 1"
                                wire:model="email"
                            />
                            <x-mantine-button :on-click="fn() => $this->subscribe()">
                                Subscribe
                            </x-mantine-button>
                        </x-mantine-group>
                    </x-mantine-dialog>
                </div>

                <!-- Different positions -->
                <div class="mt-8">
                    <x-mantine-dialog
                        :opened="true"
                        :position="['top' => 20, 'left' => 20]"
                    >
                        Dialog in top left corner
                    </x-mantine-dialog>

                    <x-mantine-dialog
                        :opened="true"
                        :position="['bottom' => 20, 'right' => 20]"
                    >
                        Dialog in bottom right corner
                    </x-mantine-dialog>
                </div>

                <!-- With custom styling -->
                <div class="mt-8">
                    <x-mantine-dialog
                        :opened="true"
                        :position="['top' => 20, 'right' => 20]"
                        size="sm"
                        radius="lg"
                        :with-border="true"
                        :styles="{
                            root: [
                                'background-color: var(--mantine-color-blue-0)',
                            ],
                        }"
                    >
                        <x-mantine-text fw="bold" mb="xs">
                            New Feature Available!
                        </x-mantine-text>
                        <x-mantine-text size="sm">
                            Check out our latest feature in the settings panel.
                        </x-mantine-text>
                        <x-mantine-button
                            variant="light"
                            color="blue"
                            fullWidth
                            mt="md"
                        >
                            Learn More
                        </x-mantine-button>
                    </x-mantine-dialog>
                </div>

                <!-- Quick notification -->
                <div class="mt-8">
                    <x-mantine-dialog
                        :opened="true"
                        :position="['bottom' => 20, 'left' => 20]"
                        size="auto"
                    >
                        <x-mantine-group gap="sm">
                            <x-mantine-text size="sm">
                                Your changes have been saved
                            </x-mantine-text>
                            <x-mantine-button
                                variant="subtle"
                                size="xs"
                                :on-click="fn() => $this->closeDialog()"
                            >
                                Dismiss
                            </x-mantine-button>
                        </x-mantine-group>
                    </x-mantine-dialog>
                </div>
            </div>
        blade;
    }
}
