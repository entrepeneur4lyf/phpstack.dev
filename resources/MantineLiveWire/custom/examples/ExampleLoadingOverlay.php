<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleLoadingOverlay extends Component
{
    public $visible = false;

    public function toggleOverlay()
    {
        $this->visible = !$this->visible;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-box pos="relative">
                        <x-mantine-loading-overlay
                            :visible="$visible"
                            :z-index="1000"
                            :overlay-props="[
                                'radius' => 'sm',
                                'blur' => 2,
                            ]"
                        />

                        <x-mantine-stack>
                            <x-mantine-text-input
                                label="First name"
                                placeholder="Your first name"
                                required
                            />

                            <x-mantine-text-input
                                label="Last name"
                                placeholder="Your last name"
                                required
                            />

                            <x-mantine-text-input
                                label="Email"
                                placeholder="your@email.com"
                                required
                            />

                            <x-mantine-password-input
                                label="Password"
                                placeholder="Your password"
                                required
                            />

                            <x-mantine-password-input
                                label="Confirm Password"
                                placeholder="Confirm your password"
                                required
                            />

                            <x-mantine-checkbox
                                label="I agree to sell my soul and privacy to this corporation"
                            />
                        </x-mantine-stack>
                    </x-mantine-box>

                    <x-mantine-group justify="center" class="mt-4">
                        <x-mantine-button :on-click="fn() => $this->toggleOverlay()">
                            Toggle overlay
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- With custom loader -->
                <div class="mt-8">
                    <x-mantine-box pos="relative">
                        <x-mantine-loading-overlay
                            :visible="$visible"
                            :loader-props="[
                                'color' => 'pink',
                                'type' => 'bars',
                            ]"
                        />

                        <x-mantine-paper p="xl" shadow="xs">
                            <x-mantine-text>
                                Content with custom pink bars loader
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-box>

                    <x-mantine-group justify="center" class="mt-4">
                        <x-mantine-button :on-click="fn() => $this->toggleOverlay()">
                            Toggle overlay
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- With custom inline content -->
                <div class="mt-8">
                    <x-mantine-box pos="relative">
                        <x-mantine-loading-overlay
                            :visible="$visible"
                            :loader-props="[
                                'children' => '<x-mantine-text fw=\"500\" size=\"xl\">Loading...</x-mantine-text>',
                            ]"
                        />

                        <x-mantine-paper p="xl" shadow="xs">
                            <x-mantine-text>
                                Content with custom loading text
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-box>

                    <x-mantine-group justify="center" class="mt-4">
                        <x-mantine-button :on-click="fn() => $this->toggleOverlay()">
                            Toggle overlay
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- With custom transition -->
                <div class="mt-8">
                    <x-mantine-box pos="relative">
                        <x-mantine-loading-overlay
                            :visible="$visible"
                            :transition-props="[
                                'transition' => 'fade',
                                'duration' => 400,
                                'timingFunction' => 'ease',
                            ]"
                        />

                        <x-mantine-paper p="xl" shadow="xs">
                            <x-mantine-text>
                                Content with custom fade transition
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-box>

                    <x-mantine-group justify="center" class="mt-4">
                        <x-mantine-button :on-click="fn() => $this->toggleOverlay()">
                            Toggle overlay
                        </x-mantine-button>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
