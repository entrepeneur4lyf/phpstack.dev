<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Rich Text Editor Component
 *
 * This example demonstrates various configurations and features of the MantineBlade RichTextEditor component.
 * It showcases different formatting options, extensions, and customizations available.
 * 
 * Requirements:
 * - Tiptap PHP package: composer require ueberdosis/tiptap-php
 *
 * Features demonstrated:
 * - Basic text formatting (bold, italic, underline, etc.)
 * - Headings and lists
 * - Links and quotes
 * - Text alignment
 * - Custom controls and icons
 * - Sticky toolbar
 * - Content sanitization and conversion using Tiptap PHP
 *
 * @see \MantineBlade\Components\RichTextEditor
 * @link https://mantine.dev/x/tiptap/
 */
class ExampleRichTextEditor extends Component
{
    /**
     * Initial content for the editor
     *
     * @var string
     */
    public $content;

    public function mount()
    {
        // Initialize with HTML content and sanitize it
        $this->content = (new \Tiptap\Editor)->sanitize(
            '<h2 style="text-align: center;">Welcome to Mantine rich text editor</h2>' .
            '<p>This editor provides a familiar editing experience with various formatting options:</p>' .
            '<ul>' .
            '<li>Text formatting: <strong>bold</strong>, <em>italic</em>, <u>underline</u></li>' .
            '<li>Lists and headings</li>' .
            '<li>Links and quotes</li>' .
            '<li>And more...</li>' .
            '</ul>' .
            '<script>alert("malicious code")</script>' // This will be stripped out
        );
    }

    /**
     * Render the component
     *
     * Demonstrates multiple editor configurations:
     * 1. Basic usage with standard controls
     * 2. Custom toolbar with specific controls
     * 3. Sticky toolbar implementation
     * 4. Custom control example
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic Editor with Character Count -->
                <div class="mb-8">
                    <x-mantine-title order="2" class="mb-4">Basic Editor with Features</x-mantine-title>
                    <x-mantine-rich-text-editor 
                        :content="$content"
                        :placeholder="'Start typing your content here...'"
                        :character-count="true"
                        :max-length="1000"
                        :text-align="true"
                    >
                        <x-mantine-rich-text-editor-toolbar>
                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="bold" />
                                <x-mantine-rich-text-editor-control name="italic" />
                                <x-mantine-rich-text-editor-control name="underline" />
                                <x-mantine-rich-text-editor-control name="strike" />
                            </x-mantine-rich-text-editor-controls-group>

                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="h2" />
                                <x-mantine-rich-text-editor-control name="h3" />
                                <x-mantine-rich-text-editor-control name="h4" />
                            </x-mantine-rich-text-editor-controls-group>

                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="bulletList" />
                                <x-mantine-rich-text-editor-control name="orderedList" />
                                <x-mantine-rich-text-editor-control name="link" />
                            </x-mantine-rich-text-editor-controls-group>

                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="alignLeft" />
                                <x-mantine-rich-text-editor-control name="alignCenter" />
                                <x-mantine-rich-text-editor-control name="alignRight" />
                                <x-mantine-rich-text-editor-control name="alignJustify" />
                            </x-mantine-rich-text-editor-controls-group>

                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="undo" />
                                <x-mantine-rich-text-editor-control name="redo" />
                            </x-mantine-rich-text-editor-controls-group>
                        </x-mantine-rich-text-editor-toolbar>

                        <x-mantine-rich-text-editor-content />
                    </x-mantine-rich-text-editor>
                </div>

                <!-- Editor with Sticky Toolbar -->
                <div class="mb-8">
                    <x-mantine-title order="2" class="mb-4">Editor with Sticky Toolbar</x-mantine-title>
                    <x-mantine-rich-text-editor :content="$content">
                        <x-mantine-rich-text-editor-toolbar :sticky="true" :sticky-offset="60">
                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="bold" />
                                <x-mantine-rich-text-editor-control name="italic" />
                                <x-mantine-rich-text-editor-control name="underline" />
                            </x-mantine-rich-text-editor-controls-group>

                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="alignLeft" />
                                <x-mantine-rich-text-editor-control name="alignCenter" />
                                <x-mantine-rich-text-editor-control name="alignRight" />
                                <x-mantine-rich-text-editor-control name="alignJustify" />
                            </x-mantine-rich-text-editor-controls-group>
                        </x-mantine-rich-text-editor-toolbar>

                        <x-mantine-rich-text-editor-content />
                    </x-mantine-rich-text-editor>
                </div>

                <!-- Advanced Features Example -->
                <div class="mb-8">
                    <x-mantine-title order="2" class="mb-4">Advanced Editor Features</x-mantine-title>
                    <x-mantine-rich-text-editor
                        :content="$content"
                        :youtube-embed="true"
                        :youtube-width="800"
                        :youtube-height="450"
                        :youtube-controls="true"
                        :youtube-modest-branding="true"
                        :enable-emoji="true"
                        :enable-mentions="true"
                        :enable-tasks="true"
                        :enable-tables="true"
                        :enable-font-family="true"
                        :enable-bubble-menu="true"
                        :enable-floating-menu="true"
                    >
                        <x-mantine-rich-text-editor-toolbar>
                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control name="bold" />
                                <x-mantine-rich-text-editor-control name="italic" />
                                <x-mantine-rich-text-editor-control name="youtube" />
                            </x-mantine-rich-text-editor-controls-group>
                        </x-mantine-rich-text-editor-toolbar>

                        <x-mantine-rich-text-editor-content />
                    </x-mantine-rich-text-editor>
                </div>

                <!-- Custom Controls Example -->
                <div>
                    <x-mantine-title order="2" class="mb-4">Custom Controls</x-mantine-title>
                    <x-mantine-rich-text-editor :content="$content">
                        <x-mantine-rich-text-editor-toolbar>
                            <x-mantine-rich-text-editor-controls-group>
                                <x-mantine-rich-text-editor-control 
                                    name="bold"
                                    :icon="'<i class=\"fas fa-bold\"></i>'"
                                />
                                <x-mantine-rich-text-editor-control
                                    name="italic"
                                    :icon="'<i class=\"fas fa-italic\"></i>'"
                                />
                                <x-mantine-rich-text-editor-control
                                    name="star"
                                    :icon="'<i class=\"fas fa-star\"></i>'"
                                    title="Insert star"
                                />
                            </x-mantine-rich-text-editor-controls-group>
                        </x-mantine-rich-text-editor-toolbar>

                        <x-mantine-rich-text-editor-content />
                    </x-mantine-rich-text-editor>
                </div>
            </div>
        blade;
    }
}
