<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTooltip extends Component
{
    public $opened = true;

    public function toggleTooltip()
    {
        $this->opened = !$this->opened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-tooltip label="Tooltip">
                        <x-mantine-button>
                            Button with tooltip
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- With color -->
                <div class="mt-8">
                    <x-mantine-tooltip label="Tooltip" color="blue">
                        <x-mantine-button>
                            With tooltip
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- With arrow -->
                <div class="mt-8">
                    <x-mantine-tooltip
                        label="Tooltip"
                        :with-arrow="true"
                        :arrow-size="4"
                        position="top-start"
                        :arrow-offset="10"
                    >
                        <x-mantine-button>
                            Button with tooltip
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- Controlled -->
                <div class="mt-8">
                    <x-mantine-tooltip
                        label="Ctrl + J"
                        :opened="$opened"
                    >
                        <x-mantine-button :on-click="fn() => $this->toggleTooltip()">
                            Toggle color scheme
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- With events -->
                <div class="mt-8">
                    <x-mantine-tooltip
                        label="Tooltip"
                        :events="[
                            'hover' => true,
                            'focus' => true,
                            'touch' => false,
                        ]"
                    >
                        <x-mantine-button>
                            With events
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- Multiline -->
                <div class="mt-8">
                    <x-mantine-tooltip
                        :multiline="true"
                        w="220"
                        :with-arrow="true"
                        :transition-props="['duration' => 200]"
                        label="Use this button to save this information in your profile, after that you will be able to access it any time and share it via email."
                    >
                        <x-mantine-button>
                            Multiline tooltip
                        </x-mantine-button>
                    </x-mantine-tooltip>
                </div>

                <!-- Inline -->
                <div class="mt-8">
                    <x-mantine-text>
                        Stantler's magnificent antlers were traded at high prices as works of art. As a result, this
                        Pokémon was hunted close to extinction by those who were after the priceless antlers.
                        <x-mantine-tooltip inline label="Inline tooltip">
                            <x-mantine-mark>When visiting a junkyard</x-mantine-mark>
                        </x-mantine-tooltip>
                        , you may catch sight of it having an intense fight with Murkrow over shiny objects.
                    </x-mantine-text>
                </div>

                <!-- With delays -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-tooltip
                            label="Opened after 500ms"
                            :open-delay="500"
                        >
                            <x-mantine-button>
                                Delay open - 500ms
                            </x-mantine-button>
                        </x-mantine-tooltip>

                        <x-mantine-tooltip
                            label="Closes after 500ms"
                            :close-delay="500"
                        >
                            <x-mantine-button>
                                Delay close - 500ms
                            </x-mantine-button>
                        </x-mantine-tooltip>
                    </x-mantine-group>
                </div>

                <!-- Tooltip group -->
                <div class="mt-8">
                    <x-mantine-tooltip-group :open-delay="500" :close-delay="100">
                        <x-mantine-group justify="center">
                            <x-mantine-tooltip label="Tooltip 1">
                                <x-mantine-button>Button 1</x-mantine-button>
                            </x-mantine-tooltip>

                            <x-mantine-tooltip label="Tooltip 2">
                                <x-mantine-button>Button 2</x-mantine-button>
                            </x-mantine-tooltip>

                            <x-mantine-tooltip label="Tooltip 3">
                                <x-mantine-button>Button 3</x-mantine-button>
                            </x-mantine-tooltip>
                        </x-mantine-group>
                    </x-mantine-tooltip-group>
                </div>

                <!-- Floating tooltip -->
                <div class="mt-8">
                    <x-mantine-tooltip-floating label="Floating tooltip">
                        <x-mantine-box
                            p="xl"
                            bg="var(--mantine-color-blue-light)"
                            style="cursor: default"
                        >
                            Hover over the box to see tooltip
                        </x-mantine-box>
                    </x-mantine-tooltip-floating>
                </div>
            </div>
        blade;
    }
}
