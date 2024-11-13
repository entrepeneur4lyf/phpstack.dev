<?php

namespace MantineLivewire\Traits;

use MantineLivewire\Components\RichTextEditor;

trait WithRichTextEditor
{
    public RichTextEditor $editor;

    public function bootWithRichTextEditor()
    {
        $this->editor = new RichTextEditor();
    }

    public function initializeEditor(array $config = [])
    {
        $this->editor = new RichTextEditor(
            content: $config['content'] ?? null,
            withTypographyStyles: $config['withTypographyStyles'] ?? true,
            labels: $config['labels'] ?? null,
            stickyOffset: $config['stickyOffset'] ?? null,
            classNames: $config['classNames'] ?? null,
            styles: $config['styles'] ?? null,
            sanitize: $config['sanitize'] ?? true,
            placeholder: $config['placeholder'] ?? null,
            characterCount: $config['characterCount'] ?? false,
            maxLength: $config['maxLength'] ?? null,
            textAlign: $config['textAlign'] ?? true,
            youtubeEmbed: $config['youtubeEmbed'] ?? false,
            youtubeWidth: $config['youtubeWidth'] ?? 640,
            youtubeHeight: $config['youtubeHeight'] ?? 480,
            youtubeControls: $config['youtubeControls'] ?? true,
            youtubeNoCookie: $config['youtubeNoCookie'] ?? false,
            youtubeModestBranding: $config['youtubeModestBranding'] ?? false,
            enableMentions: $config['enableMentions'] ?? false,
            enableTasks: $config['enableTasks'] ?? false,
            enableTables: $config['enableTables'] ?? false,
            enableFontFamily: $config['enableFontFamily'] ?? false,
            enableBubbleMenu: $config['enableBubbleMenu'] ?? false,
            enableFloatingMenu: $config['enableFloatingMenu'] ?? false,
            tableRows: $config['tableRows'] ?? 3,
            tableCols: $config['tableCols'] ?? 3,
            mentionSuggestions: $config['mentionSuggestions'] ?? [],
            mentionChar: $config['mentionChar'] ?? '@',
            enableSuperscript: $config['enableSuperscript'] ?? false,
            enableSubscript: $config['enableSubscript'] ?? false,
            enableHighlight: $config['enableHighlight'] ?? false
        );
    }

    public function getEditorHTML()
    {
        return $this->editor->getHTML();
    }

    public function getEditorText($options = [])
    {
        return $this->editor->getText($options);
    }

    public function getEditorDocument()
    {
        return $this->editor->getDocument();
    }

    public function setEditorContent($content)
    {
        $this->editor->content = $content;
    }

    public function updateEditorContent($content)
    {
        $this->editor->content = $content;
        $this->dispatch('editor-content-updated', content: $content);
    }

    public function clearEditorContent()
    {
        $this->editor->content = '';
    }
}
