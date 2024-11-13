<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example ContextMenu Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade ContextMenu component.
 * It showcases different menu configurations, item types, and interaction patterns.
 *
 * Features demonstrated:
 * - Basic context menu with icons
 * - Custom styling and positioning
 * - Disabled items
 * - Nested menu items
 * - Event handling
 *
 * @see \MantineBlade\Components\ContextMenu
 * @link https://icflorescu.github.io/mantine-contextmenu/
 */
class ExampleContextMenu extends Component
{
    /**
     * Sample file operations for basic examples
     *
     * Each item contains:
     * - key: Unique identifier
     * - icon: FontAwesome icon markup
     * - title: Display text
     * - onClick: Action handler
     *
     * @var array
     */
    public $fileOperations = [
        [
            'key' => 'copy',
            'icon' => '<i class="fas fa-copy" style="color: var(--mantine-color-blue-6);"></i>',
            'title' => 'Copy',
            'onClick' => 'copyFile()',
        ],
        [
            'key' => 'move',
            'icon' => '<i class="fas fa-arrows-alt" style="color: var(--mantine-color-green-6);"></i>',
            'title' => 'Move to...',
            'onClick' => 'moveFile()',
        ],
        [
            'key' => 'delete',
            'icon' => '<i class="fas fa-trash" style="color: var(--mantine-color-red-6);"></i>',
            'title' => 'Delete',
            'onClick' => 'deleteFile()',
        ],
    ];

    /**
     * Sample edit operations with disabled states
     *
     * @var array
     */
    public $editOperations = [
        [
            'key' => 'cut',
            'icon' => '<i class="fas fa-cut"></i>',
            'title' => 'Cut',
            'onClick' => 'cutSelection()',
        ],
        [
            'key' => 'copy',
            'icon' => '<i class="fas fa-copy"></i>',
            'title' => 'Copy',
            'onClick' => 'copySelection()',
        ],
        [
            'key' => 'paste',
            'icon' => '<i class="fas fa-paste"></i>',
            'title' => 'Paste',
            'onClick' => 'pasteContent()',
            'disabled' => true,
        ],
    ];

    /**
     * Render the component
     *
     * Demonstrates multiple context menu configurations:
     * 1. Basic usage with icons
     * 2. Custom styling and positioning
     * 3. Disabled items
     * 4. Nested menus
     * 5. Event handling
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <x-mantine-context-menu :items="$fileOperations">
                        <x-mantine-paper shadow="sm" p="md">
                            <x-mantine-text>
                                Right-click here to see basic context menu
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-context-menu>
                </div>

                <!-- With custom styling -->
                <div class="mb-8">
                    <x-mantine-context-menu
                        :items="$fileOperations"
                        shadow="xl"
                        :offset="5"
                        position="right"
                    >
                        <x-mantine-paper shadow="sm" p="md">
                            <x-mantine-text>
                                Custom styled context menu (right-click to see)
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-context-menu>
                </div>

                <!-- With disabled items -->
                <div class="mb-8">
                    <x-mantine-context-menu :items="$editOperations">
                        <x-mantine-paper shadow="sm" p="md">
                            <x-mantine-text>
                                Context menu with disabled items (right-click to see)
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-context-menu>
                </div>

                <!-- With nested items -->
                <div class="mb-8">
                    <x-mantine-context-menu
                        :items="[
                            [
                                'key' => 'view',
                                'icon' => '<i class=\"fas fa-eye\"></i>',
                                'title' => 'View',
                                'items' => [
                                    [
                                        'key' => 'details',
                                        'title' => 'Details',
                                        'onClick' => 'viewDetails()',
                                    ],
                                    [
                                        'key' => 'preview',
                                        'title' => 'Preview',
                                        'onClick' => 'viewPreview()',
                                    ],
                                ],
                            ],
                            [
                                'key' => 'share',
                                'icon' => '<i class=\"fas fa-share-alt\"></i>',
                                'title' => 'Share',
                                'items' => [
                                    [
                                        'key' => 'email',
                                        'title' => 'Email',
                                        'onClick' => 'shareEmail()',
                                    ],
                                    [
                                        'key' => 'link',
                                        'title' => 'Copy Link',
                                        'onClick' => 'shareLink()',
                                    ],
                                ],
                            ],
                        ]"
                    >
                        <x-mantine-paper shadow="sm" p="md">
                            <x-mantine-text>
                                Nested context menu items (right-click to see)
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-context-menu>
                </div>

                <!-- With event handling -->
                <div>
                    <x-mantine-context-menu
                        :items="[
                            [
                                'key' => 'click',
                                'icon' => '<i class=\"fas fa-mouse-pointer\"></i>',
                                'title' => 'Click me!',
                                'onClick' => 'alert(\'Item clicked!\')',
                            ],
                        ]"
                    >
                        <x-mantine-paper shadow="sm" p="md">
                            <x-mantine-text>
                                Context menu with event handling (right-click to see)
                            </x-mantine-text>
                        </x-mantine-paper>
                    </x-mantine-context-menu>
                </div>
            </div>
        blade;
    }
}
