<?php

namespace MantineLivewire\Components;

/**
 * FileButton Component
 *
 * The FileButton component is used to create a button that opens the file dialog for file selection.
 * It can be customized to accept specific file types and handle file uploads.
 *
 * @link https://mantine.dev/core/file-button/
 *
 * @property mixed $onChange Function called when files are selected
 * @property mixed $accept Accepted file types
 * @property bool|null $multiple Allow multiple file selection
 * @property mixed $resetRef Reference to reset the input
 * @property mixed $name Input name
 * @property mixed $form Form id if input is outside of form element
 * @property mixed $capture Capture attribute for file input
 * @property mixed $disabled Disable the button
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-file-button
 *     :on-change="fn($files) => handleFileChange($files)"
 * >
 *     Select File
 * </x-mantine-file-button>
 * ```
 *
 * @example With Accept Attribute
 * ```blade
 * <x-mantine-file-button
 *     :accept="'image/*'"
 *     :on-change="fn($files) => handleFileChange($files)"
 * >
 *     Upload Image
 * </x-mantine-file-button>
 * ```
 */
class FileButton extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $onChange Change handler
     * @param mixed $accept Accepted file types
     * @param bool|null $multiple Allow multiple files
     * @param mixed $resetRef Reference for reset
     * @param mixed $name Input name
     * @param mixed $form Form id
     * @param mixed $capture Capture attribute
     * @param mixed $disabled Disabled state
     */
    public function __construct(
        public mixed $onChange = null,
        public mixed $accept = null,
        public ?bool $multiple = null,
        public mixed $resetRef = null,
        public mixed $name = null,
        public mixed $form = null,
        public mixed $capture = null,
        public mixed $disabled = null,
    ) {
        parent::__construct();

        $this->props = [
            'onChange' => $onChange,
            'accept' => $accept,
            'multiple' => $multiple,
            'resetRef' => $resetRef,
            'name' => $name,
            'form' => $form,
            'capture' => $capture,
            'disabled' => $disabled,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('mantine::components.file-button');
    }
}
