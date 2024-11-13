<?php

return [
    // Default height (100% means auto-height)
    'height' => '100%',

    // ScrollArea configuration
    'scrollArea' => [
        // ScrollArea type: 'hover', 'always', 'scroll', 'auto', or 'never'
        'type' => 'hover',

        // Scrollbar size in pixels
        'scrollbarSize' => 8,

        // Delay before hiding scrollbars (in milliseconds)
        'scrollHideDelay' => 500,

        // Offset from frame
        'offsetScrollbars' => false,

        // ScrollArea viewport padding
        'viewportPadding' => 0,
    ],

    // Infinite scrolling
    'infiniteScroll' => [
        // Enable infinite scrolling
        'enabled' => false,

        // Batch size for loading more records
        'batchSize' => 100,

        // Distance from bottom to trigger loading (in pixels)
        'threshold' => 50,

        // Debounce time for scroll events (in milliseconds)
        'debounce' => 150,

        // Loading state configuration
        'loading' => [
            'indicator' => true,
            'blur' => 2,
            'delay' => 300,
        ],

        // Reset behavior
        'reset' => [
            'scrollToTop' => true,
            'resetPage' => true,
        ],
    ],

    // Responsive breakpoints for height
    'responsive' => [
        'sm' => 300,   // Height for small screens
        'md' => 400,   // Height for medium screens
        'lg' => 500,   // Height for large screens
        'xl' => 600,   // Height for extra large screens
    ],
];
