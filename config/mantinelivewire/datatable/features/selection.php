<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Selection Configuration
    |--------------------------------------------------------------------------
    */
    'enabled' => false,

    // Selection trigger area
    'trigger' => 'checkbox', // checkbox, cell

    // Selection column
    'column' => [
        'width' => 0,
        'className' => null,
        'style' => null,
        'fixed' => true, // Keep column fixed during horizontal scroll
    ],

    // Checkbox properties
    'checkbox' => [
        // Default checkbox props for all checkboxes
        'props' => [
            'color' => 'blue',
            'radius' => 'sm',
            'size' => 'sm',
        ],

        // All records selection checkbox
        'allRecords' => [
            'title' => 'Select all records',
            'ariaLabel' => 'Select all records',
            'indeterminate' => false,
        ],

        // Record selection checkbox
        'record' => [
            'title' => 'Select record',
            'ariaLabel' => 'Select record',
        ],
    ],

    // Selection behavior
    'behavior' => [
        // Allow shift-click to select multiple
        'allowShiftSelect' => true,

        // Allow selecting all records across pages
        'allowSelectAllPages' => false,

        // Preserve selection on page change
        'preserveOnPageChange' => false,

        // Clear selection on sort change
        'clearOnSortChange' => true,

        // Unselect mode (when all records are selected)
        'unselect' => [
            // Track unselected records instead of selected ones
            'trackUnselected' => false,
            
            // Maximum number of unselected records to track
            'maxUnselectedRecords' => 1000,
        ],
    ],

    // Selection styling
    'style' => [
        // Selected row styling
        'row' => [
            'backgroundColor' => [
                'light' => '#e7f5ff',
                'dark' => '#1c7ed6',
            ],
            'textColor' => null,
            'borderColor' => null,
        ],

        // Checkbox styling
        'checkbox' => [
            'color' => 'blue',
            'radius' => 'sm',
            'size' => 'sm',
        ],
    ],

    // Selection events
    'events' => [
        'onChange' => 'selection-change',
        'onAllChange' => 'all-selection-change',
        'onPageChange' => 'page-selection-change',
    ],

    // Selection validation
    'validation' => [
        // Function to determine if a record is selectable
        'isRecordSelectable' => null,

        // Maximum number of selectable records
        'maxSelectable' => null,

        // Minimum number of selectable records
        'minSelectable' => null,
    ],

    // Selection state persistence
    'persistence' => [
        // Enable selection state persistence
        'enabled' => false,

        // Storage driver (session, local)
        'driver' => 'session',

        // Storage key prefix
        'keyPrefix' => 'datatable_selection_',

        // Expiration time in minutes (for session driver)
        'expiration' => 60,
    ],
];
