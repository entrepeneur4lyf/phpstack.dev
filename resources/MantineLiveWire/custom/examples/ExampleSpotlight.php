<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSpotlight extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openSpotlight')">
                        Open spotlight
                    </x-mantine-button>

                    <x-mantine-spotlight
                        :actions="[
                            [
                                'id' => 'home',
                                'label' => 'Home',
                                'description' => 'Get to home page',
                                'leftSection' => '<IconHome style={{ width: rem(24), height: rem(24) }} stroke={1.5} />',
                            ],
                            [
                                'id' => 'dashboard',
                                'label' => 'Dashboard',
                                'description' => 'Get full information about current system status',
                                'leftSection' => '<IconDashboard style={{ width: rem(24), height: rem(24) }} stroke={1.5} />',
                            ],
                            [
                                'id' => 'documentation',
                                'label' => 'Documentation',
                                'description' => 'Visit documentation to learn more about all features',
                                'leftSection' => '<IconFileText style={{ width: rem(24), height: rem(24) }} stroke={1.5} />',
                            ],
                        ]"
                        nothing-found="Nothing found..."
                        :highlight-query="true"
                        :search-props="[
                            'leftSection' => '<IconSearch style={{ width: rem(20), height: rem(20) }} stroke={1.5} />',
                            'placeholder' => 'Search...',
                        ]"
                    />
                </div>

                <!-- With custom shortcut -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openCustomSpotlight')">
                        Open spotlight (Ctrl + J)
                    </x-mantine-button>

                    <x-mantine-spotlight
                        shortcut="mod + J"
                        :actions="[
                            [
                                'id' => 'home',
                                'label' => 'Home',
                                'description' => 'Get to home page',
                            ],
                        ]"
                    />
                </div>

                <!-- With multiple shortcuts -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openMultiSpotlight')">
                        Open spotlight (Ctrl + K or /)
                    </x-mantine-button>

                    <x-mantine-spotlight
                        :shortcut="['mod + K', '/']"
                        :actions="[
                            [
                                'id' => 'home',
                                'label' => 'Home',
                                'description' => 'Get to home page',
                            ],
                        ]"
                    />
                </div>

                <!-- With limit -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openLimitedSpotlight')">
                        Open spotlight with limit
                    </x-mantine-button>

                    <x-mantine-spotlight
                        :limit="7"
                        :actions="array_map(function($i) {
                            return [
                                'id' => 'action-' . $i,
                                'label' => 'Action ' . $i,
                                'description' => 'Description for action ' . $i,
                            ];
                        }, range(1, 100))"
                    />
                </div>

                <!-- With scrollable actions list -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openScrollableSpotlight')">
                        Open scrollable spotlight
                    </x-mantine-button>

                    <x-mantine-spotlight
                        :scrollable="true"
                        :max-height="350"
                        :actions="array_map(function($i) {
                            return [
                                'id' => 'action-' . $i,
                                'label' => 'Action ' . $i,
                                'description' => 'Description for action ' . $i,
                            ];
                        }, range(1, 100))"
                    />
                </div>

                <!-- With action groups -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openGroupedSpotlight')">
                        Open grouped spotlight
                    </x-mantine-button>

                    <x-mantine-spotlight
                        :actions="[
                            [
                                'group' => 'Pages',
                                'actions' => [
                                    [
                                        'id' => 'home',
                                        'label' => 'Home page',
                                        'description' => 'Where we present the product',
                                    ],
                                    [
                                        'id' => 'careers',
                                        'label' => 'Careers page',
                                        'description' => 'Where we list open positions',
                                    ],
                                ],
                            ],
                            [
                                'group' => 'Apps',
                                'actions' => [
                                    [
                                        'id' => 'svg-compressor',
                                        'label' => 'SVG compressor',
                                        'description' => 'Compress SVG images',
                                    ],
                                    [
                                        'id' => 'base64',
                                        'label' => 'Base 64 converter',
                                        'description' => 'Convert data to base 64 format',
                                    ],
                                ],
                            ],
                        ]"
                    />
                </div>

                <!-- With compound components -->
                <div class="mb-4">
                    <x-mantine-button wire:click="$emit('openCompoundSpotlight')">
                        Open compound spotlight
                    </x-mantine-button>

                    <x-mantine-spotlight.root
                        wire:model="query"
                    >
                        <x-mantine-spotlight.search
                            placeholder="Search..."
                            :left-section="'<IconSearch stroke={1.5} />'"
                        />
                        <x-mantine-spotlight.actions-list>
                            <x-mantine-spotlight.action
                                label="Home"
                                description="Get to home page"
                            />
                            <x-mantine-spotlight.action
                                label="Dashboard"
                                description="View dashboard"
                            />
                            <x-mantine-spotlight.empty>
                                Nothing found...
                            </x-mantine-spotlight.empty>
                        </x-mantine-spotlight.actions-list>
                    </x-mantine-spotlight.root>
                </div>
            </div>
        blade;
    }

    public $query = '';
}
