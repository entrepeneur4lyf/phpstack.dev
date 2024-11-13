<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDrawer extends Component
{
    public $opened = false;
    public $scrollContent;

    public function mount()
    {
        $this->scrollContent = array_fill(0, 100, 'Drawer with scroll');
    }

    public function open()
    {
        $this->opened = true;
    }

    public function close()
    {
        $this->opened = false;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                    >
                        <!-- Drawer content -->
                        <x-mantine-text-input
                            label="Email"
                            placeholder="your@email.com"
                            class="mb-4"
                        />
                        <x-mantine-text-input
                            label="Password"
                            type="password"
                            placeholder="Your password"
                            data-autofocus
                        />
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Drawer
                    </x-mantine-button>
                </div>

                <!-- Different positions -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-button :on-click="fn() => $this->open()">Left</x-mantine-button>
                        <x-mantine-drawer
                            :opened="$opened"
                            :on-close="fn() => $this->close()"
                            position="left"
                        >
                            Left drawer
                        </x-mantine-drawer>

                        <x-mantine-button :on-click="fn() => $this->open()">Right</x-mantine-button>
                        <x-mantine-drawer
                            :opened="$opened"
                            :on-close="fn() => $this->close()"
                            position="right"
                        >
                            Right drawer
                        </x-mantine-drawer>

                        <x-mantine-button :on-click="fn() => $this->open()">Top</x-mantine-button>
                        <x-mantine-drawer
                            :opened="$opened"
                            :on-close="fn() => $this->close()"
                            position="top"
                        >
                            Top drawer
                        </x-mantine-drawer>

                        <x-mantine-button :on-click="fn() => $this->open()">Bottom</x-mantine-button>
                        <x-mantine-drawer
                            :opened="$opened"
                            :on-close="fn() => $this->close()"
                            position="bottom"
                        >
                            Bottom drawer
                        </x-mantine-drawer>
                    </x-mantine-group>
                </div>

                <!-- With offset and radius -->
                <div class="mt-8">
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        :offset="8"
                        radius="md"
                        title="Authentication"
                    >
                        Drawer content
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Drawer
                    </x-mantine-button>
                </div>

                <!-- With custom overlay -->
                <div class="mt-8">
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                        :overlay-props="[
                            'backgroundOpacity' => 0.5,
                            'blur' => 4,
                        ]"
                    >
                        Drawer content
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open drawer
                    </x-mantine-button>
                </div>

                <!-- With scroll -->
                <div class="mt-8">
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Header is sticky"
                    >
                        @foreach($scrollContent as $text)
                            <p>{{ $text }}</p>
                        @endforeach
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open drawer
                    </x-mantine-button>
                </div>

                <!-- Using compound components -->
                <div class="mt-8">
                    <x-mantine-drawer-root
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                    >
                        <x-mantine-drawer-overlay />
                        <x-mantine-drawer-content>
                            <x-mantine-drawer-header>
                                <x-mantine-drawer-title>
                                    Drawer title
                                </x-mantine-drawer-title>
                                <x-mantine-drawer-close-button />
                            </x-mantine-drawer-header>
                            <x-mantine-drawer-body>
                                Drawer content
                            </x-mantine-drawer-body>
                        </x-mantine-drawer-content>
                    </x-mantine-drawer-root>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open drawer
                    </x-mantine-button>
                </div>

                <!-- With custom transition -->
                <div class="mt-8">
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                        :transition-props="[
                            'transition' => 'rotate-left',
                            'duration' => 150,
                            'timingFunction' => 'linear',
                        ]"
                    >
                        Drawer content
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Drawer
                    </x-mantine-button>
                </div>

                <!-- With custom close button -->
                <div class="mt-8">
                    <x-mantine-drawer
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                        :close-button-props="[
                            'icon' => '<i class=\"fas fa-times\" style=\"width: 20px; height: 20px;\"></i>',
                        ]"
                    >
                        Drawer content
                    </x-mantine-drawer>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Drawer
                    </x-mantine-button>
                </div>
            </div>
        blade;
    }
}
