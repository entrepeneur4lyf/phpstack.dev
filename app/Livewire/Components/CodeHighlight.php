<?php

namespace App\Livewire\Components;

/**
 * CodeHighlight Component
 *
 * The CodeHighlight component is used to display code snippets with syntax highlighting.
 * It supports various programming languages and can include copy and expand/collapse functionality.
 *
 * @link https://mantine.dev/core/code-highlight/
 *
 * @property mixed $code The code to be highlighted
 * @property mixed $language The programming language for syntax highlighting
 * @property mixed $copyLabel Label for the copy button
 * @property mixed $copiedLabel Label displayed after copying
 * @property mixed $withCopyButton Show copy button
 * @property mixed $withExpandButton Show expand/collapse button
 * @property mixed $defaultExpanded Default expanded state
 * @property mixed $expandCodeLabel Label for expand button
 * @property mixed $collapseCodeLabel Label for collapse button
 * @property mixed $classNames Custom class names for code highlight elements
 * @property mixed $styles Custom styles for code highlight elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-code-highlight
 *     code="console.log('Hello, world!');"
 *     language="javascript"
 * />
 * ```
 *
 * @example With Copy Button
 * ```blade
 * <x-mantine-code-highlight
 *     code="const value = 'Hello world';"
 *     language="javascript"
 *     with-copy-button="true"
 * />
 * ```
 *
 * @example With Expand/Collapse
 * ```blade
 * <x-mantine-code-highlight
 *     code="function hello() { return 'Hello world'; }"
 *     language="javascript"
 *     with-expand-button="true"
 * />
 * ```
 */
class CodeHighlight extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $code Code to highlight
     * @param mixed $language Language for syntax highlighting
     * @param mixed $copyLabel Copy button label
     * @param mixed $copiedLabel Label after copying
     * @param mixed $withCopyButton Show copy button
     * @param mixed $withExpandButton Show expand/collapse button
     * @param mixed $defaultExpanded Default expanded state
     * @param mixed $expandCodeLabel Expand button label
     * @param mixed $collapseCodeLabel Collapse button label
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $code = null,
        public mixed $language = null,
        public mixed $copyLabel = null,
        public mixed $copiedLabel = null,
        public mixed $withCopyButton = null,
        public mixed $withExpandButton = null,
        public mixed $defaultExpanded = null,
        public mixed $expandCodeLabel = null,
        public mixed $collapseCodeLabel = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'code' => $code,
            'language' => $language,
            'copyLabel' => $copyLabel,
            'copiedLabel' => $copiedLabel,
            'withCopyButton' => $withCopyButton,
            'withExpandButton' => $withExpandButton,
            'defaultExpanded' => $defaultExpanded,
            'expandCodeLabel' => $expandCodeLabel,
            'collapseCodeLabel' => $collapseCodeLabel,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
