<?php

namespace App\Livewire\Components;

/**
 * Textarea component for capturing multi-line text input.
 *
 * The Textarea component provides a resizable multi-line text input field with support
 * for autosize, character limits, and various styling options. It's ideal for collecting
 * longer text content like comments, descriptions, or messages.
 *
 * @see https://mantine.dev/core/textarea/
 *
 * @example Basic usage with label and placeholder
 * ```blade
 * <x-mantine-textarea
 *     label="Your comment"
 *     placeholder="Type your comment here..."
 *     :autosize="true"
 *     :minRows="3"
 * />
 * ```
 *
 * @example With validation and description
 * ```blade
 * <x-mantine-textarea
 *     label="Feedback"
 *     description="Please provide detailed feedback"
 *     :withAsterisk="true"
 *     error="This field is required"
 *     size="md"
 *     radius="md"
 * />
 * ```
 *
 * @example Custom styling and disabled state
 * ```blade
 * <x-mantine-textarea
 *     label="Read-only feedback"
 *     :value="'Previous feedback content'"
 *     :disabled="true"
 *     variant="filled"
 *     :resize="false"
 * />
 * ```
 */
class Textarea extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $label Input label
     * @param string|null $description Helper text below input
     * @param mixed $error Error message or boolean indicating error state
     * @param string|null $variant Input variant ('default', 'filled', 'unstyled')
     * @param string|null $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param string|null $radius Border radius ('xs', 'sm', 'md', 'lg', 'xl')
     * @param bool|null $withAsterisk Show required asterisk
     * @param bool|null $autosize Enable automatic height adjustment
     * @param int|null $minRows Minimum number of rows
     * @param int|null $maxRows Maximum number of rows
     * @param string|null $resize Resize behavior ('none', 'both', 'horizontal', 'vertical')
     * @param bool|null $disabled Disable input
     * @param mixed $value Controlled input value
     * @param mixed $defaultValue Default value for uncontrolled input
     * @param string|null $placeholder Placeholder text
     * @param string|null $ariaLabel Accessibility label
     * @param mixed $wrapperProps Props to pass to wrapper element
     */
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public mixed $error = null,
        public ?string $variant = null,
        public ?string $size = null,
        public ?string $radius = null,
        public ?bool $withAsterisk = null,
        public ?bool $autosize = null,
        public ?int $minRows = null,
        public ?int $maxRows = null,
        public ?string $resize = null,
        public ?bool $disabled = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?string $placeholder = null,
        public ?string $ariaLabel = null,
        public mixed $wrapperProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'label' => $label,
            'description' => $description,
            'error' => $error,
            'variant' => $variant,
            'size' => $size,
            'radius' => $radius,
            'withAsterisk' => $withAsterisk,
            'autosize' => $autosize,
            'minRows' => $minRows,
            'maxRows' => $maxRows,
            'resize' => $resize,
            'disabled' => $disabled,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'placeholder' => $placeholder,
            'aria-label' => $ariaLabel,
            'wrapperProps' => $wrapperProps,
        ];
    }
}
