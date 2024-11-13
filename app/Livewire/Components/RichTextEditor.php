<?php

namespace MantineLivewire\Components;

/**
 * Rich Text Editor Component
 *
 * A TipTap-based rich text editor component that provides a familiar editing experience.
 * Supports various text formatting options, lists, links, and other extensions.
 * 
 * Requires the ueberdosis/tiptap-php package for server-side content handling:
 * composer require ueberdosis/tiptap-php
 *
 * Features:
 * - Text formatting and alignment
 * - Character count and limits
 * - Placeholder support
 * - Typography enhancements
 * - Undo/Redo functionality
 * 
 * @link https://mantine.dev/x/tiptap/
 * @link https://github.com/ueberdosis/tiptap-php
 *
 * @property mixed $editor TipTap editor instance
 * @property mixed $withTypographyStyles Enable/disable default typography styles
 * @property mixed $labels Localization labels for controls
 * @property mixed $stickyOffset Offset for sticky toolbar
 * @property mixed $classNames Custom class names
 * @property mixed $styles Custom styles
 */
class RichTextEditor extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $editor TipTap editor instance
     * @param mixed $withTypographyStyles Enable default typography styles
     * @param mixed $labels Control labels for localization
     * @param mixed $stickyOffset Offset for sticky toolbar
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $editor = null,
        public mixed $content = null,
        public mixed $withTypographyStyles = true,
        public mixed $labels = null,
        public mixed $stickyOffset = null,
        public mixed $classNames = null,
        public mixed $styles = null,
        public mixed $sanitize = true, // Enable sanitization by default
        public mixed $placeholder = null,
        public mixed $characterCount = false,
        public mixed $maxLength = null,
        public mixed $textAlign = true,
        // YouTube configuration
        public mixed $youtubeEmbed = false,
        public mixed $youtubeWidth = 640,
        public mixed $youtubeHeight = 480,
        public mixed $youtubeControls = true,
        public mixed $youtubeNoCookie = false,
        public mixed $youtubeModestBranding = false,
        // Feature flags
        public mixed $enableMentions = false,
        public mixed $enableTasks = false,
        public mixed $enableTables = false,
        public mixed $enableFontFamily = false,
        public mixed $enableBubbleMenu = false,
        public mixed $enableFloatingMenu = false,
        // Table configuration
        public mixed $tableRows = 3,
        public mixed $tableCols = 3,
        // Mention configuration
        public mixed $mentionSuggestions = [],
        public mixed $mentionChar = '@',
        // Typography configuration
        public mixed $enableSuperscript = false,
        public mixed $enableSubscript = false,
        public mixed $enableHighlight = false,
    ) {
        parent::__construct();

        // Initialize TipTap editor with content
        $this->editor = new \Tiptap\Editor([
            'content' => $content,
            'extensions' => [
                new \Tiptap\Extensions\StarterKit([
                    'heading' => [
                        'levels' => [1, 2, 3, 4, 5, 6]
                    ]
                ]),
                new \Tiptap\Marks\Link,
                new \Tiptap\Extensions\TextAlign,
                new \Tiptap\Extensions\Typography,
                new \Tiptap\Extensions\Placeholder,
                new \Tiptap\Extensions\CharacterCount,
            ]
        ]);
        
        $this->content = $this->editor->getDocument();

        $this->props = [
            'editor' => $editor,
            'content' => $this->content,
            'withTypographyStyles' => $withTypographyStyles,
            'labels' => $labels,
            'stickyOffset' => $stickyOffset,
            'classNames' => $classNames,
            'styles' => $styles,
            'youtubeEmbed' => $youtubeEmbed,
            'youtubeWidth' => $youtubeWidth,
            'youtubeHeight' => $youtubeHeight,
            'youtubeControls' => $youtubeControls,
            'youtubeNoCookie' => $youtubeNoCookie,
            'youtubeModestBranding' => $youtubeModestBranding,
        ];
    }

    /**
     * Get the editor content as HTML
     *
     * @return string
     */
    public function getHTML()
    {
        return $this->editor->getHTML();
    }

    /**
     * Get the editor content as plain text
     * 
     * @param array $options Options for text conversion
     * @return string
     */
    public function getText($options = [])
    {
        return $this->editor->getText($options);
    }

    /**
     * Get the editor content as a Tiptap-compatible array
     *
     * @return array
     */
    public function getDocument()
    {
        return $this->editor->getDocument();
    }
}

/**
 * RichTextEditor Toolbar Component
 */
class RichTextEditorToolbar extends MantineComponent
{
    public function __construct(
        public mixed $sticky = null,
        public mixed $stickyOffset = null,
    ) {
        parent::__construct();
        
        $this->props = [
            'sticky' => $sticky,
            'stickyOffset' => $stickyOffset,
        ];
    }
}

/**
 * RichTextEditor Content Component
 */
class RichTextEditorContent extends MantineComponent
{
    public function __construct() {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * RichTextEditor Control Component
 */
class RichTextEditorControl extends MantineComponent
{
    public function __construct(
        public mixed $active = null,
        public mixed $disabled = null,
        public mixed $icon = null,
    ) {
        parent::__construct();
        
        $this->props = [
            'active' => $active,
            'disabled' => $disabled,
            'icon' => $icon,
        ];
    }
}

/**
 * RichTextEditor Controls Group Component
 */
class RichTextEditorControlsGroup extends MantineComponent
{
    public function __construct() {
        parent::__construct();
        $this->props = [];
    }
}