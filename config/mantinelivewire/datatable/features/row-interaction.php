<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Row Click Handling
    |--------------------------------------------------------------------------
    */
    'click' => [
        // Enable row click handling
        'enabled' => true,

        // Click behavior
        'behavior' => [
            // What triggers the click event
            'trigger' => 'row', // row, cell

            // Prevent click on certain elements
            'preventClickOnElements' => [
                'button',
                'a',
                'input',
                'select',
                'textarea',
                '.no-click',
            ],

            // Double click support
            'handleDoubleClick' => false,
            'doubleClickDelay' => 300,
        ],

        // Click events
        'events' => [
            'onClick' => 'row-click',
            'onDoubleClick' => 'row-double-click',
            'onContextMenu' => 'row-context-menu',
        ],

        // Styling on click
        'style' => [
            // Clicked row styling
            'clickedRow' => [
                'backgroundColor' => [
                    'light' => '#f8f9fa',
                    'dark' => '#2c2e33',
                ],
                'transition' => 'background-color 0.2s',
            ],

            // Hover styling
            'hover' => [
                'backgroundColor' => [
                    'light' => '#f1f3f5',
                    'dark' => '#25262b',
                ],
                'cursor' => 'pointer',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Row Hover Effects
    |--------------------------------------------------------------------------
    */
    'hover' => [
        // Enable hover effects
        'enabled' => true,

        // Hover delay
        'delay' => 0,

        // Hover styling
        'style' => [
            'backgroundColor' => [
                'light' => '#f8f9fa',
                'dark' => '#2c2e33',
            ],
            'transition' => 'background-color 0.2s',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Context Menu
    |--------------------------------------------------------------------------
    */
    'contextMenu' => [
        // Enable context menu
        'enabled' => false,

        // Context menu position
        'position' => [
            'fixed' => true,
            'offset' => [
                'x' => 0,
                'y' => 0,
            ],
        ],

        // Context menu styling
        'style' => [
            'width' => 200,
            'shadow' => 'md',
            'borderRadius' => 'sm',
            'backgroundColor' => [
                'light' => '#ffffff',
                'dark' => '#1A1B1E',
            ],
        ],

        // Context menu events
        'events' => [
            'onOpen' => 'context-menu-open',
            'onClose' => 'context-menu-close',
            'onItemClick' => 'context-menu-item-click',
        ],
    ],
];
