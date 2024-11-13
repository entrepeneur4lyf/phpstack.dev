<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNotifications extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic notifications setup -->
                <x-mantine-notifications
                    position="top-right"
                    :auto-close="4000"
                    :limit="5"
                    :z-index="1000"
                />

                <!-- Show notifications with different positions -->
                <div class="flex gap-4 mb-4">
                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Top left notification',
                            'message' => 'This notification appears in the top left corner',
                            'position' => 'top-left'
                        ])"
                    >
                        Top left
                    </x-mantine-button>

                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Top right notification',
                            'message' => 'This notification appears in the top right corner',
                            'position' => 'top-right'
                        ])"
                    >
                        Top right
                    </x-mantine-button>

                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Bottom left notification',
                            'message' => 'This notification appears in the bottom left corner',
                            'position' => 'bottom-left'
                        ])"
                    >
                        Bottom left
                    </x-mantine-button>

                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Bottom right notification',
                            'message' => 'This notification appears in the bottom right corner',
                            'position' => 'bottom-right'
                        ])"
                    >
                        Bottom right
                    </x-mantine-button>
                </div>

                <!-- Show notifications with different auto-close timeouts -->
                <div class="flex gap-4 mb-4">
                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Quick notification',
                            'message' => 'This notification will close in 500ms',
                            'autoClose' => 500
                        ])"
                    >
                        Close in 500ms
                    </x-mantine-button>

                    <x-mantine-button
                        wire:click="$emit('showNotification', [
                            'title' => 'Persistent notification',
                            'message' => 'This notification will not close automatically',
                            'autoClose' => false
                        ])"
                    >
                        Never close
                    </x-mantine-button>
                </div>

                <!-- Show notifications with different styles -->
                <div class="flex gap-4 mb-4">
                    <x-mantine-button
                        color="blue"
                        wire:click="$emit('showNotification', [
                            'title' => 'Default notification',
                            'message' => 'This is a default notification'
                        ])"
                    >
                        Default
                    </x-mantine-button>

                    <x-mantine-button
                        color="green"
                        wire:click="$emit('showNotification', [
                            'title' => 'Success notification',
                            'message' => 'Your action was successful',
                            'color' => 'green'
                        ])"
                    >
                        Success
                    </x-mantine-button>

                    <x-mantine-button
                        color="red"
                        wire:click="$emit('showNotification', [
                            'title' => 'Error notification',
                            'message' => 'Oops! Something went wrong',
                            'color' => 'red'
                        ])"
                    >
                        Error
                    </x-mantine-button>

                    <x-mantine-button
                        color="yellow"
                        wire:click="$emit('showNotification', [
                            'title' => 'Warning notification',
                            'message' => 'Please be careful with this action',
                            'color' => 'yellow'
                        ])"
                    >
                        Warning
                    </x-mantine-button>
                </div>

                <!-- Show loading notification that updates -->
                <div class="flex gap-4">
                    <x-mantine-button
                        wire:click="$emit('showLoadingNotification')"
                    >
                        Show loading notification
                    </x-mantine-button>
                </div>
            </div>
        blade;
    }

    public function showLoadingNotification()
    {
        $id = $this->emit('showNotification', [
            'loading' => true,
            'title' => 'Loading your data',
            'message' => 'Data will be loaded in 3 seconds',
            'autoClose' => false,
            'withCloseButton' => false
        ]);

        // Simulate loading
        sleep(3);

        $this->emit('updateNotification', [
            'id' => $id,
            'color' => 'teal',
            'title' => 'Data loaded',
            'message' => 'Your data has been successfully loaded',
            'icon' => '<IconCheck size="1.1rem" />',
            'loading' => false,
            'autoClose' => 2000
        ]);
    }
}
