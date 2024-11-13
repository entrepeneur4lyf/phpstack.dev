<?php

namespace MantineLivewire\Components;

class CodeHighlightTabs extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $code = null,
        public mixed $withExpandButton = null,
        public mixed $defaultExpanded = null,
        public mixed $expandCodeLabel = null,
        public mixed $collapseCodeLabel = null,
        public mixed $getFileIcon = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'code' => $code,
            'withExpandButton' => $withExpandButton,
            'defaultExpanded' => $defaultExpanded,
            'expandCodeLabel' => $expandCodeLabel,
            'collapseCodeLabel' => $collapseCodeLabel,
            'getFileIcon' => $getFileIcon,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
