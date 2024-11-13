<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleRadio extends Component
{
    public $value = '';
    public $cardValue = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic radio -->
                <x-mantine-radio
                    label="Basic radio"
                    wire:model="value"
                />

                <!-- Different states -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-radio
                            :checked="false"
                            label="Default radio"
                        />
                        <x-mantine-radio
                            :checked="true"
                            label="Checked radio"
                        />
                        <x-mantine-radio
                            :checked="true"
                            variant="outline"
                            label="Outline checked radio"
                        />
                        <x-mantine-radio
                            :disabled="true"
                            label="Disabled radio"
                        />
                        <x-mantine-radio
                            :disabled="true"
                            :checked="true"
                            label="Disabled checked radio"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With custom icon -->
                <x-mantine-radio
                    label="Custom check icon"
                    :icon="'CheckIcon'"
                    name="check"
                    value="check"
                    :default-value="true"
                    class="mt-4"
                />

                <!-- With custom icon color -->
                <x-mantine-radio
                    label="Custom icon color"
                    icon-color="dark.8"
                    color="lime.4"
                    name="color"
                    value="color"
                    :default-value="true"
                    class="mt-4"
                />

                <!-- Radio group -->
                <x-mantine-radio-group
                    name="favoriteFramework"
                    label="Select your favorite framework/library"
                    description="This is anonymous"
                    :with-asterisk="true"
                    wire:model="value"
                    class="mt-4"
                >
                    <x-mantine-group mt="xs">
                        <x-mantine-radio value="react" label="React" />
                        <x-mantine-radio value="svelte" label="Svelte" />
                        <x-mantine-radio value="ng" label="Angular" />
                        <x-mantine-radio value="vue" label="Vue" />
                    </x-mantine-group>
                </x-mantine-radio-group>

                <!-- Radio cards -->
                <x-mantine-radio-group
                    label="Pick one package to install"
                    description="Choose a package that you will need in your application"
                    wire:model="cardValue"
                    class="mt-4"
                >
                    <x-mantine-stack pt="md" gap="xs">
                        <x-mantine-radio-card
                            radius="md"
                            value="@mantine/core"
                        >
                            <x-mantine-group wrap="nowrap" align="flex-start">
                                <x-mantine-radio-indicator />
                                <div>
                                    <x-mantine-text>@mantine/core</x-mantine-text>
                                    <x-mantine-text size="sm" c="dimmed">
                                        Core components library: inputs, buttons, overlays, etc.
                                    </x-mantine-text>
                                </div>
                            </x-mantine-group>
                        </x-mantine-radio-card>

                        <x-mantine-radio-card
                            radius="md"
                            value="@mantine/hooks"
                        >
                            <x-mantine-group wrap="nowrap" align="flex-start">
                                <x-mantine-radio-indicator />
                                <div>
                                    <x-mantine-text>@mantine/hooks</x-mantine-text>
                                    <x-mantine-text size="sm" c="dimmed">
                                        Collection of reusable hooks for React applications.
                                    </x-mantine-text>
                                </div>
                            </x-mantine-group>
                        </x-mantine-radio-card>

                        <x-mantine-radio-card
                            radius="md"
                            value="@mantine/notifications"
                        >
                            <x-mantine-group wrap="nowrap" align="flex-start">
                                <x-mantine-radio-indicator />
                                <div>
                                    <x-mantine-text>@mantine/notifications</x-mantine-text>
                                    <x-mantine-text size="sm" c="dimmed">
                                        Notifications system
                                    </x-mantine-text>
                                </div>
                            </x-mantine-group>
                        </x-mantine-radio-card>
                    </x-mantine-stack>
                </x-mantine-radio-group>

                <!-- Indicator only -->
                <x-mantine-group class="mt-4">
                    <x-mantine-radio-indicator />
                    <x-mantine-radio-indicator :checked="true" />
                    <x-mantine-radio-indicator :disabled="true" />
                    <x-mantine-radio-indicator :disabled="true" :checked="true" />
                </x-mantine-group>
            </div>
        blade;
    }
}
