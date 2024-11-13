<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Row Actions Configuration
    |--------------------------------------------------------------------------
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Column Configuration
    |--------------------------------------------------------------------------
    */
    'column' => [
        // Column properties
        'accessor' => 'actions',
        'title' => 'Actions',
        'textAlign' => 'right',
        'width' => '0%', // Constrain width to content
        'sortable' => false,

        // Column styling
        'style' => [
            'minWidth' => '100px',
            'paddingRight' => '1rem',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Button Configuration
    |--------------------------------------------------------------------------
    */
    'buttons' => [
        // Default button properties
        'defaults' => [
            'size' => 'sm',
            'variant' => 'subtle',
            'radius' => 'sm',
        ],

        // Button group properties
        'group' => [
            'gap' => 4,
            'wrap' => 'nowrap',
            'justify' => 'right',
        ],

        // Default actions
        'actions' => [
            'view' => [
                'icon' => 'eye',
                'color' => 'green',
                'title' => 'View',
                'event' => 'row-action-view',
            ],
            'edit' => [
                'icon' => 'edit',
                'color' => 'blue',
                'title' => 'Edit',
                'event' => 'row-action-edit',
            ],
            'delete' => [
                'icon' => 'trash',
                'color' => 'red',
                'title' => 'Delete',
                'event' => 'row-action-delete',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Events
    |--------------------------------------------------------------------------
    */
    'events' => [
        'onClick' => 'row-action-click',
        'onView' => 'row-action-view',
        'onEdit' => 'row-action-edit',
        'onDelete' => 'row-action-delete',
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Permissions
    |--------------------------------------------------------------------------
    */
    'permissions' => [
        // Default permission checks
        'view' => null,   // function($record) { return true; }
        'edit' => null,   // function($record) { return true; }
        'delete' => null, // function($record) { return true; }
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Confirmation
    |--------------------------------------------------------------------------
    */
    'confirmation' => [
        // Enable action confirmation
        'enabled' => true,

        // Default confirmation messages
        'messages' => [
            'delete' => 'Are you sure you want to delete this record?',
        ],

        // Confirmation modal properties
        'modal' => [
            'title' => 'Confirm Action',
            'centered' => true,
            'size' => 'sm',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Styling
    |--------------------------------------------------------------------------
    */
    'style' => [
        // Button hover effects
        'hover' => [
            'transform' => 'scale(1.1)',
            'transition' => 'transform 0.2s',
        ],

        // Button disabled state
        'disabled' => [
            'opacity' => 0.5,
            'cursor' => 'not-allowed',
        ],

        // Button loading state
        'loading' => [
            'opacity' => 0.7,
            'cursor' => 'wait',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Action Tooltips
    |--------------------------------------------------------------------------
    */
    'tooltips' => [
        // Enable tooltips
        'enabled' => true,

        // Tooltip properties
        'props' => [
            'position' => 'top',
            'withArrow' => true,
            'arrowSize' => 6,
            'offset' => 5,
        ],
    ],
];
