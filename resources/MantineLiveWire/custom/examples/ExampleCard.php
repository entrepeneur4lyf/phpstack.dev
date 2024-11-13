<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Card Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Card component.
 * It showcases different layouts, content organization, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic card layout
 * - Card as a link
 * - Section borders and padding
 * - Image integration
 * - Custom content organization
 * - Interactive menus
 * - Grid layouts
 * - Responsive design
 *
 * @see \MantineBlade\Components\Card
 * @link https://mantine.dev/core/card/
 */
class ExampleCard extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic card with image and content
     * 2. Card as a clickable link
     * 3. Card with section borders and padding
     * 4. Card with menu integration
     * 5. Card with image grid
     * 6. Card with custom header/footer
     *
     * Each example showcases different features and customization
     * options available with the Card component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-card shadow="sm" padding="lg" radius="md" :with-border="true">
                        <x-mantine-card-section>
                            <x-mantine-image
                                src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-8.png"
                                height="160"
                                alt="Norway"
                            />
                        </x-mantine-card-section>

                        <x-mantine-group justify="space-between" mt="md" mb="xs">
                            <x-mantine-text fw="500">Norway Fjord Adventures</x-mantine-text>
                            <x-mantine-badge color="pink">On Sale</x-mantine-badge>
                        </x-mantine-group>

                        <x-mantine-text size="sm" c="dimmed">
                            With Fjord Tours you can explore more of the magical fjord landscapes with tours and
                            activities on and around the fjords of Norway
                        </x-mantine-text>

                        <x-mantine-button color="blue" fullWidth mt="md" radius="md">
                            Book classic tour now
                        </x-mantine-button>
                    </x-mantine-card>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-card
                        shadow="sm"
                        padding="xl"
                        component="a"
                        href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                        target="_blank"
                    >
                        <x-mantine-card-section>
                            <x-mantine-image
                                src="https://images.unsplash.com/photo-1579227114347-15d08fc37cae?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80"
                                height="160"
                                alt="No way!"
                            />
                        </x-mantine-card-section>

                        <x-mantine-text fw="500" size="lg" mt="md">
                            You've won a million dollars in cash!
                        </x-mantine-text>

                        <x-mantine-text mt="xs" c="dimmed" size="sm">
                            Please click anywhere on this card to claim your reward, this is not a fraud, trust us
                        </x-mantine-text>
                    </x-mantine-card>
                </div>

                <!-- With section borders and padding -->
                <div class="mt-8">
                    <x-mantine-card :with-border="true" shadow="sm" radius="md">
                        <x-mantine-card-section :with-border="true" :inherit-padding="true" py="xs">
                            <x-mantine-group justify="space-between">
                                <x-mantine-text fw="500">Review pictures</x-mantine-text>
                                <x-mantine-menu within-portal position="bottom-end" shadow="sm">
                                    <x-mantine-menu-target>
                                        <x-mantine-action-icon variant="subtle" color="gray">
                                            <i class="fas fa-ellipsis-h" style="width: 16px; height: 16px;"></i>
                                        </x-mantine-action-icon>
                                    </x-mantine-menu-target>

                                    <x-mantine-menu-dropdown>
                                        <x-mantine-menu-item :left-section="'<i class=\"fas fa-file-archive\" style=\"width: 14px; height: 14px;\"></i>'">
                                            Download zip
                                        </x-mantine-menu-item>
                                        <x-mantine-menu-item :left-section="'<i class=\"fas fa-eye\" style=\"width: 14px; height: 14px;\"></i>'">
                                            Preview all
                                        </x-mantine-menu-item>
                                        <x-mantine-menu-item
                                            :left-section="'<i class=\"fas fa-trash\" style=\"width: 14px; height: 14px;\"></i>'"
                                            color="red"
                                        >
                                            Delete all
                                        </x-mantine-menu-item>
                                    </x-mantine-menu-dropdown>
                                </x-mantine-menu>
                            </x-mantine-group>
                        </x-mantine-card-section>

                        <x-mantine-text mt="sm" c="dimmed" size="sm">
                            <x-mantine-text span inherit c="var(--mantine-color-anchor)">
                                200+ images uploaded
                            </x-mantine-text>
                            since last visit, review them to select which one should be added to your gallery
                        </x-mantine-text>

                        <x-mantine-card-section mt="sm">
                            <x-mantine-image
                                src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-4.png"
                            />
                        </x-mantine-card-section>

                        <x-mantine-card-section :inherit-padding="true" mt="sm" pb="md">
                            <x-mantine-simple-grid cols="3">
                                @foreach([
                                    'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-1.png',
                                    'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-2.png',
                                    'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-3.png',
                                ] as $image)
                                    <x-mantine-image :src="$image" radius="sm" />
                                @endforeach
                            </x-mantine-simple-grid>
                        </x-mantine-card-section>
                    </x-mantine-card>
                </div>

                <!-- Section as a link -->
                <div class="mt-8">
                    <x-mantine-card shadow="sm" padding="lg" radius="md" :with-border="true">
                        <x-mantine-card-section
                            component="a"
                            href="https://mantine.dev"
                            target="_blank"
                        >
                            <x-mantine-image
                                src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-8.png"
                                height="160"
                                alt="Norway"
                            />
                        </x-mantine-card-section>

                        <x-mantine-group justify="space-between" mt="md" mb="xs">
                            <x-mantine-text fw="500">Norway Fjord Adventures</x-mantine-text>
                            <x-mantine-badge color="pink">On Sale</x-mantine-badge>
                        </x-mantine-group>

                        <x-mantine-text size="sm" c="dimmed">
                            With Fjord Tours you can explore more of the magical fjord landscapes with tours and
                            activities on and around the fjords of Norway
                        </x-mantine-text>

                        <x-mantine-button color="blue" fullWidth mt="md" radius="md">
                            Book classic tour now
                        </x-mantine-button>
                    </x-mantine-card>
                </div>
            </div>
        blade;
    }
}
