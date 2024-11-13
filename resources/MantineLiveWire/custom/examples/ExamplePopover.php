<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePopover extends Component
{
    public $opened = false;
    public $hoverOpened = false;

    public function togglePopover()
    {
        $this->opened = !$this->opened;
    }

    public function openHover()
    {
        $this->hoverOpened = true;
    }

    public function closeHover()
    {
        $this->hoverOpened = false;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-popover :width="200" position="bottom" :with-arrow="true" shadow="md">
                        <x-mantine-popover-target>
                            <x-mantine-button>
                                Toggle popover
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-text size="xs">
                                This is uncontrolled popover, it is opened when button is clicked
                            </x-mantine-text>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- Controlled with hover -->
                <div class="mt-8">
                    <x-mantine-popover
                        :width="200"
                        position="bottom"
                        :with-arrow="true"
                        shadow="md"
                        :opened="$hoverOpened"
                    >
                        <x-mantine-popover-target>
                            <x-mantine-button
                                :on-mouse-enter="fn() => $this->openHover()"
                                :on-mouse-leave="fn() => $this->closeHover()"
                            >
                                Hover to see popover
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown style="pointer-events: none">
                            <x-mantine-text size="sm">
                                This popover is shown when user hovers the target element
                            </x-mantine-text>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- With focus trap -->
                <div class="mt-8">
                    <x-mantine-popover
                        :width="300"
                        :trap-focus="true"
                        position="bottom"
                        :with-arrow="true"
                        shadow="md"
                    >
                        <x-mantine-popover-target>
                            <x-mantine-button>
                                Toggle popover
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-text-input
                                label="Name"
                                placeholder="Name"
                                size="xs"
                            />
                            <x-mantine-text-input
                                label="Email"
                                placeholder="john@doe.com"
                                size="xs"
                                mt="xs"
                            />
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- With inline elements -->
                <div class="mt-8">
                    <x-mantine-text>
                        Stantler's magnificent antlers were traded at high prices as works of art. As a result, this
                        Pokémon was hunted close to extinction by those who were after the priceless antlers.
                        <x-mantine-popover
                            :middlewares="['flip' => true, 'shift' => true, 'inline' => true]"
                            position="top"
                        >
                            <x-mantine-popover-target>
                                <x-mantine-mark>When visiting a junkyard</x-mantine-mark>
                            </x-mantine-popover-target>

                            <x-mantine-popover-dropdown>
                                Inline dropdown
                            </x-mantine-popover-dropdown>
                        </x-mantine-popover>
                        , you may catch sight of it having an intense fight with Murkrow over shiny objects.
                    </x-mantine-text>
                </div>

                <!-- Same width as target -->
                <div class="mt-8">
                    <x-mantine-popover
                        width="target"
                        position="bottom"
                        :with-arrow="true"
                        shadow="md"
                    >
                        <x-mantine-popover-target>
                            <x-mantine-button w="280">
                                Toggle popover
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-text size="sm">
                                This popover has same width as target, it is useful when you are building input dropdowns
                            </x-mantine-text>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- With custom arrow -->
                <div class="mt-8">
                    <x-mantine-popover
                        :width="200"
                        position="bottom-start"
                        :with-arrow="true"
                        arrow-position="side"
                        :arrow-offset="20"
                        :arrow-size="10"
                        :arrow-radius="4"
                    >
                        <x-mantine-popover-target>
                            <x-mantine-button>
                                Custom arrow
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-text size="sm">
                                This popover has customized arrow properties
                            </x-mantine-text>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- With custom click outside events -->
                <div class="mt-8">
                    <x-mantine-popover
                        :width="200"
                        position="bottom"
                        :click-outside-events="['mouseup', 'touchend']"
                    >
                        <x-mantine-popover-target>
                            <x-mantine-button>
                                Toggle popover
                            </x-mantine-button>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-text size="xs">
                                Popover will be closed with mouseup and touchend events
                            </x-mantine-text>
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>
            </div>
        blade;
    }
}
