<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Row Styling
    |--------------------------------------------------------------------------
    */
    'row' => [
        // Color options
        'colors' => [
            'primary' => 'blue',
            'secondary' => 'gray',
            'success' => 'green',
            'warning' => 'yellow',
            'danger' => 'red',
            'info' => 'cyan',
        ],

        // Background colors
        'backgroundColors' => [
            'light' => [
                'primary' => '#e7f5ff',
                'secondary' => '#f8f9fa',
                'success' => '#ebfbee',
                'warning' => '#fff9db',
                'danger' => '#fff5f5',
                'info' => '#e3fafc',
            ],
            'dark' => [
                'primary' => '#1c7ed6',
                'secondary' => '#343a40',
                'success' => '#2b8a3e',
                'warning' => '#e67700',
                'danger' => '#c92a2a',
                'info' => '#15aabf',
            ],
        ],

        // Default classes
        'defaultClasses' => [
            'hover' => 'hover:bg-gray-50 dark:hover:bg-gray-800',
            'selected' => 'bg-blue-50 dark:bg-blue-900',
            'disabled' => 'opacity-50 cursor-not-allowed',
        ],

        // Style presets
        'presets' => [
            'highlight' => [
                'fontWeight' => 500,
                'backgroundColor' => 'var(--mantine-color-yellow-1)',
            ],
            'muted' => [
                'opacity' => 0.7,
                'fontStyle' => 'italic',
            ],
            'danger' => [
                'color' => 'var(--mantine-color-red-6)',
                'fontWeight' => 500,
            ],
            'success' => [
                'color' => 'var(--mantine-color-green-6)',
                'fontWeight' => 500,
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Column Styling
    |--------------------------------------------------------------------------
    */
    'column' => [
        // Default properties
        'defaults' => [
            'sortable' => true,
            'hidden' => false,
            'ellipsis' => false,
            'noWrap' => false,
            'textAlignment' => 'left',
            'width' => null,
        ],

        // Header styling
        'header' => [
            'fontWeight' => 500,
            'fontSize' => 'sm',
            'textTransform' => null,
            'backgroundColor' => null,
            'borderBottom' => true,
            'borderBottomColor' => null,
            'padding' => 'xs',
        ],

        // Cell styling
        'cell' => [
            'fontSize' => 'sm',
            'padding' => 'xs',
            'borderBottom' => true,
            'borderBottomColor' => null,
            'backgroundColor' => null,
        ],

        // Footer styling
        'footer' => [
            'fontWeight' => 500,
            'fontSize' => 'sm',
            'backgroundColor' => null,
            'borderTop' => true,
            'borderTopColor' => null,
            'padding' => 'xs',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Styling
    |--------------------------------------------------------------------------
    */
    'table' => [
        // Basic properties
        'withBorder' => true,
        'withColumnBorders' => false,
        'withRowBorders' => true,
        'striped' => false,
        'highlightOnHover' => true,

        // Spacing
        'horizontalSpacing' => 'xs',
        'verticalSpacing' => 'xs',

        // Typography
        'fontSize' => 'sm',
        'fontFamily' => null,

        // Colors
        'textColor' => null,
        'backgroundColor' => null,
        'borderColor' => null,

        // Shadow and border radius
        'shadow' => 'sm',
        'borderRadius' => 'sm',

        // Vertical alignment
        'verticalAlign' => 'center',
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Integration
    |--------------------------------------------------------------------------
    */
    'theme' => [
        // Color scheme
        'colorScheme' => 'light', // light, dark, or auto

        // Custom colors
        'colors' => [
            'primary' => 'blue',
            'secondary' => 'gray',
            'accent' => 'violet',
        ],

        // Breakpoints (in pixels)
        'breakpoints' => [
            'xs' => 576,
            'sm' => 768,
            'md' => 992,
            'lg' => 1200,
            'xl' => 1400,
        ],
    ],
];
