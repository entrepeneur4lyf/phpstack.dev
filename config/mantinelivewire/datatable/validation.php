<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Size Values
    |--------------------------------------------------------------------------
    */
    'sizes' => [
        'xs' => 'extra small',
        'sm' => 'small',
        'md' => 'medium',
        'lg' => 'large',
        'xl' => 'extra large',
    ],

    /*
    |--------------------------------------------------------------------------
    | Alignment Values
    |--------------------------------------------------------------------------
    */
    'alignments' => [
        'vertical' => ['top', 'center', 'bottom'],
        'text' => ['left', 'center', 'right', 'justify'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Scroll Types
    |--------------------------------------------------------------------------
    */
    'scrollTypes' => [
        'hover' => 'Show on hover',
        'always' => 'Always show',
        'scroll' => 'Show while scrolling',
        'auto' => 'Show when needed',
        'never' => 'Never show',
    ],

    /*
    |--------------------------------------------------------------------------
    | Selection Triggers
    |--------------------------------------------------------------------------
    */
    'selectionTriggers' => [
        'click' => 'On click',
        'hover' => 'On hover',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sort Directions
    |--------------------------------------------------------------------------
    */
    'sortDirections' => [
        'asc' => 'Ascending',
        'desc' => 'Descending',
    ],

    /*
    |--------------------------------------------------------------------------
    | Color Schemes
    |--------------------------------------------------------------------------
    */
    'colorSchemes' => [
        'light' => 'Light theme',
        'dark' => 'Dark theme',
        'auto' => 'System preference',
    ],

    /*
    |--------------------------------------------------------------------------
    | Value Constraints
    |--------------------------------------------------------------------------
    */
    'constraints' => [
        'pagination' => [
            'minPage' => 1,
            'maxRecordsPerPage' => 1000,
            'minRecordsPerPage' => 1,
        ],
        'scroll' => [
            'minScrollbarSize' => 4,
            'maxScrollbarSize' => 20,
            'minScrollHideDelay' => 0,
            'maxScrollHideDelay' => 5000,
        ],
        'style' => [
            'minFontSize' => 8,
            'maxFontSize' => 32,
            'minSpacing' => 0,
            'maxSpacing' => 48,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Regular Expressions
    |--------------------------------------------------------------------------
    */
    'regex' => [
        'color' => '/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
        'cssUnit' => '/^(\d*\.?\d+)(px|em|rem|%|vh|vw)$/',
        'className' => '/^[a-zA-Z][a-zA-Z0-9-_]*$/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Type Validation
    |--------------------------------------------------------------------------
    */
    'types' => [
        'recordId' => ['string', 'number'],
        'sortField' => ['string', 'array'],
        'filterValue' => ['string', 'number', 'boolean', 'array'],
        'customRenderer' => ['string', 'function'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Required Properties
    |--------------------------------------------------------------------------
    */
    'required' => [
        'column' => [
            'accessor',
        ],
        'group' => [
            'id',
            'columns',
        ],
        'renderer' => [
            'type',
        ],
    ],
];
