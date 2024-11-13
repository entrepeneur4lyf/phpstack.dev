import React from 'react';
import { RichTextEditor as MantineRTE } from '@mantine/tiptap';
import { useEditor } from '@tiptap/react';
import StarterKit from '@tiptap/starter-kit';
import CodeBlockLowlight from '@tiptap/extension-code-block-lowlight';
import { Color } from '@tiptap/extension-color';
import TextStyle from '@tiptap/extension-text-style';
import Placeholder from '@tiptap/extension-placeholder';
import TextAlign from '@tiptap/extension-text-align';
import Underline from '@tiptap/extension-underline';
import Superscript from '@tiptap/extension-superscript';
import Subscript from '@tiptap/extension-subscript';
import Highlight from '@tiptap/extension-highlight';
import TaskItem from '@tiptap/extension-task-item';
import TaskList from '@tiptap/extension-task-list';
import Image from '@tiptap/extension-image';
import Table from '@tiptap/extension-table';
import TableRow from '@tiptap/extension-table-row';
import TableCell from '@tiptap/extension-table-cell';
import TableHeader from '@tiptap/extension-table-header';
import Link from '@tiptap/extension-link';
import Youtube from '@tiptap/extension-youtube';
import CharacterCount from '@tiptap/extension-character-count';
import Typography from '@tiptap/extension-typography';
import FontFamily from '@tiptap/extension-font-family';
import { BubbleMenu, FloatingMenu } from '@tiptap/react';
import { createLowlight } from 'lowlight';
import { useComponent } from '@/hooks/useComponent';

const lowlight = createLowlight();

export default function RichTextEditor() {
  const { 
    content, 
    updateContent, 
    placeholder, 
    characterCount, 
    maxLength, 
    enableBubbleMenu, 
    enableFloatingMenu,
    youtubeConfig = {} 
  } = useComponent();

  const editor = useEditor({
    extensions: [
      StarterKit.configure({
        heading: {
          levels: [1, 2, 3, 4, 5, 6]
        }
      }),
      CodeBlockLowlight.configure({
        lowlight,
      }),
      Color,
      TextStyle,
      Placeholder.configure({
        placeholder: placeholder || 'Start typing...',
      }),
      TextAlign.configure({
        types: ['heading', 'paragraph']
      }),
      Underline,
      Superscript,
      Subscript,
      Highlight,
      TaskList,
      TaskItem.configure({
        nested: true,
      }),
      Image,
      Table.configure({
        resizable: true,
      }),
      TableRow,
      TableCell,
      TableHeader,
      Link.configure({
        openOnClick: false,
      }),
      Youtube.configure({
        inline: youtubeConfig.inline ?? false,
        width: youtubeConfig.width ?? 640,
        height: youtubeConfig.height ?? 480,
        controls: youtubeConfig.controls ?? true,
        nocookie: youtubeConfig.nocookie ?? false,
        allowFullscreen: youtubeConfig.allowFullscreen ?? true,
        autoplay: youtubeConfig.autoplay ?? false,
        ccLanguage: youtubeConfig.ccLanguage,
        ccLoadPolicy: youtubeConfig.ccLoadPolicy ?? false,
        disableKBcontrols: youtubeConfig.disableKBcontrols ?? false,
        enableIFrameApi: youtubeConfig.enableIFrameApi ?? false,
        origin: youtubeConfig.origin ?? '',
        endTime: youtubeConfig.endTime ?? 0,
        interfaceLanguage: youtubeConfig.interfaceLanguage,
        ivLoadPolicy: youtubeConfig.ivLoadPolicy ?? 0,
        loop: youtubeConfig.loop ?? false,
        playlist: youtubeConfig.playlist ?? '',
        modestBranding: youtubeConfig.modestBranding ?? false,
        progressBarColor: youtubeConfig.progressBarColor,
      }),
      CharacterCount.configure({
        limit: maxLength,
      }),
      Typography,
      FontFamily,
    ],
    content,
    onUpdate: ({ editor }) => {
      updateContent(editor.getHTML());
    },
  });

  if (!editor) {
    return null;
  }

  return (
    <>
      {enableBubbleMenu && (
        <BubbleMenu editor={editor}>
          <MantineRTE.ControlsGroup>
            <MantineRTE.Bold />
            <MantineRTE.Italic />
            <MantineRTE.Underline />
            <MantineRTE.Link />
          </MantineRTE.ControlsGroup>
        </BubbleMenu>
      )}

      {enableFloatingMenu && (
        <FloatingMenu editor={editor}>
          <MantineRTE.ControlsGroup>
            <MantineRTE.H1 />
            <MantineRTE.H2 />
            <MantineRTE.BulletList />
            <MantineRTE.OrderedList />
          </MantineRTE.ControlsGroup>
        </FloatingMenu>
      )}

      <MantineRTE editor={editor}>
        <MantineRTE.Toolbar sticky stickyOffset={0}>
          <MantineRTE.ControlsGroup>
            <MantineRTE.Bold />
            <MantineRTE.Italic />
            <MantineRTE.Underline />
            <MantineRTE.Strikethrough />
            <MantineRTE.ClearFormatting />
            <MantineRTE.Highlight />
            <MantineRTE.Code />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.H1 />
            <MantineRTE.H2 />
            <MantineRTE.H3 />
            <MantineRTE.H4 />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.Blockquote />
            <MantineRTE.Hr />
            <MantineRTE.BulletList />
            <MantineRTE.OrderedList />
            <MantineRTE.TaskList />
            <MantineRTE.Subscript />
            <MantineRTE.Superscript />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.Link />
            <MantineRTE.Unlink />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.AlignLeft />
            <MantineRTE.AlignCenter />
            <MantineRTE.AlignJustify />
            <MantineRTE.AlignRight />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.ColorPicker
              colors={[
                '#25262b',
                '#868e96',
                '#fa5252',
                '#e64980',
                '#be4bdb',
                '#7950f2',
                '#4c6ef5',
                '#228be6',
                '#15aabf',
                '#12b886',
                '#40c057',
                '#82c91e',
                '#fab005',
                '#fd7e14',
              ]}
            />
          </MantineRTE.ControlsGroup>

          <MantineRTE.ControlsGroup>
            <MantineRTE.Undo />
            <MantineRTE.Redo />
          </MantineRTE.ControlsGroup>
        </MantineRTE.Toolbar>

        <MantineRTE.Content />
        
        {characterCount && (
          <div style={{ marginTop: '0.5rem', fontSize: '0.875rem', color: 'var(--mantine-color-dimmed)' }}>
            Characters: {editor.storage.characterCount.characters()}{' '}
            {maxLength && `/ ${maxLength}`}
          </div>
        )}
      </MantineRTE>
    </>
  );
}
