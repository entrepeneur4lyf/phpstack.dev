<?php

namespace MantineLivewire\Components;

/**
 * CopyButton Component
 *
 * The CopyButton component allows users to copy text to the clipboard with a single click.
 * It provides visual feedback and can be used in various contexts where copying text is required.
 *
 * @link https://mantine.dev/core/copy-button/
 *
 * @property mixed $value The text to be copied
 * @property int|null $timeout Duration in milliseconds for the copied state
 * @property mixed $onCopy Function called when the value is copied
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-copy-button value="Copy this text" />
 * ```
 *
 * @example With Custom Timeout
 * ```blade
 * <x-mantine-copy-button value="Copy this text" :timeout="2000" />
 * ```
 */
class CopyButton extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Text to copy
     * @param int|null $timeout Duration for copied state
     * @param mixed $onCopy Function called on copy
     */
    public function __construct(
        public mixed $value = null,
        public ?int $timeout = null,
        public mixed $onCopy = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'timeout' => $timeout,
            'onCopy' => $onCopy,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('mantine::components.copy-button');
    }
}
