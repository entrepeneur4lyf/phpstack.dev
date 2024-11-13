<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleHoverCard extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-group justify="center">
                        <x-mantine-hover-card :width="280" shadow="md">
                            <x-mantine-hover-card-target>
                                <x-mantine-button>
                                    Hover to reveal the card
                                </x-mantine-button>
                            </x-mantine-hover-card-target>

                            <x-mantine-hover-card-dropdown>
                                <x-mantine-text size="sm">
                                    Hover card is revealed when user hovers over target element, it will be hidden once
                                    mouse is not over both target and dropdown elements
                                </x-mantine-text>
                            </x-mantine-hover-card-dropdown>
                        </x-mantine-hover-card>
                    </x-mantine-group>
                </div>

                <!-- With delays -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-hover-card shadow="md" :open-delay="1000">
                            <x-mantine-hover-card-target>
                                <x-mantine-button>
                                    1000ms open delay
                                </x-mantine-button>
                            </x-mantine-hover-card-target>

                            <x-mantine-hover-card-dropdown>
                                <x-mantine-text size="sm">
                                    Opened with 1000ms delay
                                </x-mantine-text>
                            </x-mantine-hover-card-dropdown>
                        </x-mantine-hover-card>

                        <x-mantine-hover-card shadow="md" :close-delay="1000">
                            <x-mantine-hover-card-target>
                                <x-mantine-button>
                                    1000ms close delay
                                </x-mantine-button>
                            </x-mantine-hover-card-target>

                            <x-mantine-hover-card-dropdown>
                                <x-mantine-text size="sm">
                                    Will close with 1000ms delay
                                </x-mantine-text>
                            </x-mantine-hover-card-dropdown>
                        </x-mantine-hover-card>
                    </x-mantine-group>
                </div>

                <!-- With interactive elements -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-hover-card
                            :width="320"
                            shadow="md"
                            :with-arrow="true"
                            :open-delay="200"
                            :close-delay="400"
                        >
                            <x-mantine-hover-card-target>
                                <x-mantine-avatar
                                    src="https://avatars.githubusercontent.com/u/79146003?s=200&v=4"
                                    radius="xl"
                                />
                            </x-mantine-hover-card-target>

                            <x-mantine-hover-card-dropdown>
                                <x-mantine-group>
                                    <x-mantine-avatar
                                        src="https://avatars.githubusercontent.com/u/79146003?s=200&v=4"
                                        radius="xl"
                                    />
                                    <x-mantine-stack gap="5">
                                        <x-mantine-text size="sm" fw="700" style="line-height: 1">
                                            Mantine
                                        </x-mantine-text>
                                        <x-mantine-anchor
                                            href="https://x.com/mantinedev"
                                            c="dimmed"
                                            size="xs"
                                            style="line-height: 1"
                                        >
                                            @mantinedev
                                        </x-mantine-anchor>
                                    </x-mantine-stack>
                                </x-mantine-group>

                                <x-mantine-text size="sm" mt="md">
                                    Customizable React components and hooks library with focus on usability, accessibility
                                    and developer experience
                                </x-mantine-text>

                                <x-mantine-group mt="md" gap="xl">
                                    <x-mantine-text size="sm">
                                        <b>0</b> Following
                                    </x-mantine-text>
                                    <x-mantine-text size="sm">
                                        <b>1,174</b> Followers
                                    </x-mantine-text>
                                </x-mantine-group>
                            </x-mantine-hover-card-dropdown>
                        </x-mantine-hover-card>
                    </x-mantine-group>
                </div>

                <!-- With custom position -->
                <div class="mt-8">
                    <x-mantine-group justify="center">
                        <x-mantine-hover-card
                            :width="280"
                            shadow="md"
                            position="right"
                            :offset="20"
                        >
                            <x-mantine-hover-card-target>
                                <x-mantine-button>
                                    Hover me
                                </x-mantine-button>
                            </x-mantine-hover-card-target>

                            <x-mantine-hover-card-dropdown>
                                <x-mantine-text size="sm">
                                    This dropdown appears on the right with 20px offset
                                </x-mantine-text>
                            </x-mantine-hover-card-dropdown>
                        </x-mantine-hover-card>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
