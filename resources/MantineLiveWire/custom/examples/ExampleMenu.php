<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleMenu extends Component
{
    public $opened = false;

    public function toggleMenu()
    {
        $this->opened = !$this->opened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-menu shadow="md" :width="200">
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                Toggle menu
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-label>Application</x-mantine-menu-label>
                            <x-mantine-menu-item
                                :left-section="'<i class=\"fas fa-cog\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                Settings
                            </x-mantine-menu-item>
                            <x-mantine-menu-item
                                :left-section="'<i class=\"fas fa-message\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                Messages
                            </x-mantine-menu-item>
                            <x-mantine-menu-item
                                :left-section="'<i class=\"fas fa-image\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                Gallery
                            </x-mantine-menu-item>
                            <x-mantine-menu-item
                                :left-section="'<i class=\"fas fa-search\" style=\"width: 14px; height: 14px;\"></i>'"
                                :right-section="'<x-mantine-text size=\"xs\" c=\"dimmed\">⌘K</x-mantine-text>'"
                            >
                                Search
                            </x-mantine-menu-item>

                            <x-mantine-menu-divider />

                            <x-mantine-menu-label>Danger zone</x-mantine-menu-label>
                            <x-mantine-menu-item
                                :left-section="'<i class=\"fas fa-arrows-left-right\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                Transfer my data
                            </x-mantine-menu-item>
                            <x-mantine-menu-item
                                color="red"
                                :left-section="'<i class=\"fas fa-trash\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                Delete my account
                            </x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>

                <!-- Controlled menu -->
                <div class="mt-8">
                    <x-mantine-menu
                        :opened="$opened"
                        :on-change="fn($opened) => $this->toggleMenu()"
                    >
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                Toggle controlled menu
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-item>First item</x-mantine-menu-item>
                            <x-mantine-menu-item>Second item</x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>

                <!-- Hover menu -->
                <div class="mt-8">
                    <x-mantine-menu
                        trigger="hover"
                        :open-delay="100"
                        :close-delay="400"
                    >
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                Hover menu
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-item>First item</x-mantine-menu-item>
                            <x-mantine-menu-item>Second item</x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>

                <!-- With disabled items -->
                <div class="mt-8">
                    <x-mantine-menu>
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                With disabled items
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-item>Enabled item</x-mantine-menu-item>
                            <x-mantine-menu-item :disabled="true">
                                Disabled item
                            </x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>

                <!-- With custom component -->
                <div class="mt-8">
                    <x-mantine-menu :width="200" shadow="md">
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                With links
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-item
                                component="a"
                                href="https://mantine.dev"
                            >
                                Mantine website
                            </x-mantine-menu-item>
                            <x-mantine-menu-item
                                component="a"
                                href="https://mantine.dev"
                                target="_blank"
                                :left-section="'<i class=\"fas fa-external-link\" style=\"width: 14px; height: 14px;\"></i>'"
                            >
                                External link
                            </x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>

                <!-- With different positions -->
                <div class="mt-8">
                    <x-mantine-group>
                        @foreach(['bottom', 'bottom-start', 'bottom-end', 'top', 'top-start', 'top-end', 'left', 'left-start', 'left-end', 'right', 'right-start', 'right-end'] as $position)
                            <x-mantine-menu position="{{ $position }}">
                                <x-mantine-menu-target>
                                    <x-mantine-button>
                                        {{ $position }}
                                    </x-mantine-button>
                                </x-mantine-menu-target>

                                <x-mantine-menu-dropdown>
                                    <x-mantine-menu-item>First item</x-mantine-menu-item>
                                    <x-mantine-menu-item>Second item</x-mantine-menu-item>
                                </x-mantine-menu-dropdown>
                            </x-mantine-menu>
                        @endforeach
                    </x-mantine-group>
                </div>

                <!-- With transitions -->
                <div class="mt-8">
                    <x-mantine-menu
                        :transition-props="[
                            'transition' => 'rotate-right',
                            'duration' => 150,
                        ]"
                    >
                        <x-mantine-menu-target>
                            <x-mantine-button>
                                With transition
                            </x-mantine-button>
                        </x-mantine-menu-target>

                        <x-mantine-menu-dropdown>
                            <x-mantine-menu-item>First item</x-mantine-menu-item>
                            <x-mantine-menu-item>Second item</x-mantine-menu-item>
                        </x-mantine-menu-dropdown>
                    </x-mantine-menu>
                </div>
            </div>
        blade;
    }
}
