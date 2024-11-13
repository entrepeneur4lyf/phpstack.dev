<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNotification extends Component
{
    public function handleClose()
    {
        $this->dispatch('notify', [
            'message' => 'Notification closed',
            'type' => 'info'
        ]);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-notification title="We notify you that">
                    You are now obligated to give a star to Mantine project on GitHub
                </x-mantine-notification>

                <!-- With loading state -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="Please wait"
                        :loading="true"
                    >
                        The application is trying to reconnect to the server
                    </x-mantine-notification>
                </div>

                <!-- With close button -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="With close button"
                        :with-close-button="true"
                        :close-button-props="['aria-label' => 'Hide notification']"
                        :on-close="fn() => $this->handleClose()"
                    >
                        This notification can be closed
                    </x-mantine-notification>
                </div>

                <!-- With border -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="With border"
                        :with-border="true"
                    >
                        This notification has a border
                    </x-mantine-notification>
                </div>

                <!-- With icons -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="Bummer!"
                        color="red"
                        :icon="'<i class=\"fas fa-times\" style=\"width: 20px; height: 20px;\"></i>'"
                        class="mb-4"
                    >
                        Something went wrong
                    </x-mantine-notification>

                    <x-mantine-notification
                        title="All good!"
                        color="teal"
                        :icon="'<i class=\"fas fa-check\" style=\"width: 20px; height: 20px;\"></i>'"
                    >
                        Everything is fine
                    </x-mantine-notification>
                </div>

                <!-- Different radius -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="Extra small radius"
                        radius="xs"
                        class="mb-4"
                    >
                        Notification with xs radius
                    </x-mantine-notification>

                    <x-mantine-notification
                        title="Large radius"
                        radius="lg"
                        class="mb-4"
                    >
                        Notification with lg radius
                    </x-mantine-notification>

                    <x-mantine-notification
                        title="Extra large radius"
                        radius="xl"
                    >
                        Notification with xl radius
                    </x-mantine-notification>
                </div>

                <!-- With custom styles -->
                <div class="mt-4">
                    <x-mantine-notification
                        title="Custom styled notification"
                        :styles="{
                            root: [
                                'box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1)',
                            ],
                            title: [
                                'font-weight: 700',
                                'text-transform: uppercase',
                            ],
                            description: [
                                'font-style: italic',
                            ],
                        }"
                    >
                        This notification has custom styles
                    </x-mantine-notification>
                </div>
            </div>
        blade;
    }
}
