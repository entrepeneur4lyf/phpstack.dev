<?php

namespace App\Livewire\Components;

/**
 * Dropzone Component
 *
 * The Dropzone component allows users to drag and drop files for upload. It supports various
 * configurations for file acceptance, size limits, and event handling.
 *
 * @link https://mantine.dev/core/dropzone/
 *
 * @property mixed $accept Accepted file types
 * @property mixed $maxSize Maximum file size in bytes
 * @property mixed $maxFiles Maximum number of files
 * @property mixed $multiple Allow multiple file uploads
 * @property mixed $loading Show loading state
 * @property mixed $disabled Disable the dropzone
 * @property mixed $openRef Reference to open file dialog
 * @property mixed $activateOnClick Activate dropzone on click
 * @property mixed $onDrop Function called when files are dropped
 * @property mixed $onReject Function called when files are rejected
 * @property mixed $onDragEnter Function called when dragging enters the dropzone
 * @property mixed $onDragLeave Function called when dragging leaves the dropzone
 * @property mixed $onDragOver Function called when dragging over the dropzone
 * @property mixed $onFileDialogOpen Function called when file dialog opens
 * @property mixed $onFileDialogCancel Function called when file dialog is canceled
 * @property mixed $active Show active state
 * @property mixed $radius Border radius from theme.radius or number for value in px
 * @property mixed $padding Padding for the dropzone
 * @property mixed $classNames Custom class names for the dropzone
 * @property mixed $styles Custom styles for the dropzone
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-dropzone
 *     label="Drop files here"
 *     :on-drop="fn($files) => handleDrop($files)"
 * />
 * ```
 *
 * @example With File Type Restrictions
 * ```blade
 * <x-mantine-dropzone
 *     accept="image/*"
 *     :on-drop="fn($files) => handleDrop($files)"
 * />
 * ```
 *
 * @example With Size Limit
 * ```blade
 * <x-mantine-dropzone
 *     :max-size="5242880" // 5 MB
 *     :on-drop="fn($files) => handleDrop($files)"
 * />
 * ```
 */
class Dropzone extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $accept Accepted file types
     * @param mixed $maxSize Maximum file size
     * @param mixed $maxFiles Maximum number of files
     * @param mixed $multiple Allow multiple uploads
     * @param mixed $loading Loading state
     * @param mixed $disabled Disabled state
     * @param mixed $openRef Reference for file dialog
     * @param mixed $activateOnClick Activate on click
     * @param mixed $onDrop Drop handler
     * @param mixed $onReject Reject handler
     * @param mixed $onDragEnter Drag enter handler
     * @param mixed $onDragLeave Drag leave handler
     * @param mixed $onDragOver Drag over handler
     * @param mixed $onFileDialogOpen File dialog open handler
     * @param mixed $onFileDialogCancel File dialog cancel handler
     * @param mixed $active Active state
     * @param mixed $radius Border radius
     * @param mixed $padding Padding
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $accept = null,
        public mixed $maxSize = null,
        public mixed $maxFiles = null,
        public mixed $multiple = null,
        public mixed $loading = null,
        public mixed $disabled = null,
        public mixed $openRef = null,
        public mixed $activateOnClick = null,
        public mixed $onDrop = null,
        public mixed $onReject = null,
        public mixed $onDragEnter = null,
        public mixed $onDragLeave = null,
        public mixed $onDragOver = null,
        public mixed $onFileDialogOpen = null,
        public mixed $onFileDialogCancel = null,
        public mixed $active = null,
        public mixed $radius = null,
        public mixed $padding = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'accept' => $accept,
            'maxSize' => $maxSize,
            'maxFiles' => $maxFiles,
            'multiple' => $multiple,
            'loading' => $loading,
            'disabled' => $disabled,
            'openRef' => $openRef,
            'activateOnClick' => $activateOnClick,
            'onDrop' => $onDrop,
            'onReject' => $onReject,
            'onDragEnter' => $onDragEnter,
            'onDragLeave' => $onDragLeave,
            'onDragOver' => $onDragOver,
            'onFileDialogOpen' => $onFileDialogOpen,
            'onFileDialogCancel' => $onFileDialogCancel,
            'active' => $active,
            'radius' => $radius,
            'padding' => $padding,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
