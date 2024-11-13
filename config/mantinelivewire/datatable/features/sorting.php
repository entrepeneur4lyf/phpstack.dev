<?php

return [
    // Basic settings
    'defaultDirection' => 'asc',
    'allowMultiple' => false,
    'disableTextSelection' => true,

    // Sort icons configuration
    'icons' => [
        'sorted' => [
            'name' => 'chevron-up',
            'size' => 14,
        ],
        'unsorted' => [
            'name' => 'selector',
            'size' => 14,
        ],
    ],

    // Column defaults
    'columnDefaults' => [
        'sortable' => true,
        'sortIconPosition' => 'right', // 'left', 'right'
        'sortIconSpacing' => 4,
    ],

    // Multi-sort settings
    'multiSort' => [
        'maxColumns' => 3,
        'separator' => ', ',
        'indicatorPosition' => 'right', // 'left', 'right'
    ],
];
