<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTimeline extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-timeline :active="1" :bullet-size="24" :line-width="2">
                        <x-mantine-timeline-item
                            bullet='<i class="fas fa-code-branch" style="width: 12px; height: 12px;"></i>'
                            title="New branch"
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                You've created new branch
                                <x-mantine-text variant="link" component="span" inherit>
                                    fix-notifications
                                </x-mantine-text>
                                from master
                            </x-mantine-text>
                            <x-mantine-text size="xs" mt="4">2 hours ago</x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            bullet='<i class="fas fa-code-commit" style="width: 12px; height: 12px;"></i>'
                            title="Commits"
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                You've pushed 23 commits to
                                <x-mantine-text variant="link" component="span" inherit>
                                    fix-notifications branch
                                </x-mantine-text>
                            </x-mantine-text>
                            <x-mantine-text size="xs" mt="4">52 minutes ago</x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            title="Pull request"
                            bullet='<i class="fas fa-code-pull-request" style="width: 12px; height: 12px;"></i>'
                            line-variant="dashed"
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                You've submitted a pull request
                                <x-mantine-text variant="link" component="span" inherit>
                                    Fix incorrect notification message (#187)
                                </x-mantine-text>
                            </x-mantine-text>
                            <x-mantine-text size="xs" mt="4">34 minutes ago</x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            title="Code review"
                            bullet='<i class="fas fa-comments" style="width: 12px; height: 12px;"></i>'
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                <x-mantine-text variant="link" component="span" inherit>
                                    Robert Gluesticker
                                </x-mantine-text>
                                left a code review on your pull request
                            </x-mantine-text>
                            <x-mantine-text size="xs" mt="4">12 minutes ago</x-mantine-text>
                        </x-mantine-timeline-item>
                    </x-mantine-timeline>
                </div>

                <!-- With different bullets -->
                <div class="mt-8">
                    <x-mantine-timeline :bullet-size="24">
                        <x-mantine-timeline-item title="Default bullet">
                            <x-mantine-text c="dimmed" size="sm">
                                Default bullet without anything
                            </x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            title="Avatar"
                            :bullet="
                                '<x-mantine-avatar
                                    size=\"22\"
                                    radius=\"xl\"
                                    src=\"https://avatars0.githubusercontent.com/u/10353856?s=460&u=88394dfd67727327c1f7670a1764dc38a8a24831&v=4\"
                                />'
                            "
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                Timeline bullet as avatar image
                            </x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            title="Icon"
                            bullet='<i class="fas fa-sun" style="width: 0.8rem; height: 0.8rem;"></i>'
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                Timeline bullet as icon
                            </x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item
                            title="ThemeIcon"
                            :bullet="
                                '<x-mantine-theme-icon
                                    size=\"22\"
                                    variant=\"gradient\"
                                    :gradient=\"[\'from\' => \'lime\', \'to\' => \'cyan\']\"
                                    radius=\"xl\"
                                >
                                    <i class=\"fas fa-video\" style=\"width: 0.8rem; height: 0.8rem;\"></i>
                                </x-mantine-theme-icon>'
                            "
                        >
                            <x-mantine-text c="dimmed" size="sm">
                                Timeline bullet as ThemeIcon component
                            </x-mantine-text>
                        </x-mantine-timeline-item>
                    </x-mantine-timeline>
                </div>

                <!-- With different alignments -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-timeline align="left" :bullet-size="24">
                            <x-mantine-timeline-item title="Left aligned">
                                <x-mantine-text c="dimmed" size="sm">
                                    Left aligned content
                                </x-mantine-text>
                            </x-mantine-timeline-item>
                        </x-mantine-timeline>

                        <x-mantine-timeline align="right" :bullet-size="24">
                            <x-mantine-timeline-item title="Right aligned">
                                <x-mantine-text c="dimmed" size="sm">
                                    Right aligned content
                                </x-mantine-text>
                            </x-mantine-timeline-item>
                        </x-mantine-timeline>
                    </x-mantine-group>
                </div>

                <!-- With reverse active -->
                <div class="mt-8">
                    <x-mantine-timeline :active="1" :reverse-active="true" :bullet-size="24">
                        <x-mantine-timeline-item title="First">
                            <x-mantine-text c="dimmed" size="sm">First item</x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item title="Second">
                            <x-mantine-text c="dimmed" size="sm">Second item</x-mantine-text>
                        </x-mantine-timeline-item>

                        <x-mantine-timeline-item title="Third">
                            <x-mantine-text c="dimmed" size="sm">Third item</x-mantine-text>
                        </x-mantine-timeline-item>
                    </x-mantine-timeline>
                </div>
            </div>
        blade;
    }
}
