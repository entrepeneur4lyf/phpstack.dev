<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Component Configuration
    |--------------------------------------------------------------------------
    |
    | This is the main configuration file for the MantineLiveWire DataTable
    | component. It imports all the separate configuration files and merges
    | them into a single configuration array.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Core Properties
    |--------------------------------------------------------------------------
    */
    'props' => require(__DIR__ . '/datatable/props.php'),

    /*
    |--------------------------------------------------------------------------
    | Styling Configuration
    |--------------------------------------------------------------------------
    */
    'styling' => require(__DIR__ . '/datatable/styling.php'),

    /*
    |--------------------------------------------------------------------------
    | Built-in Renderers
    |--------------------------------------------------------------------------
    */
    'renderers' => require(__DIR__ . '/datatable/renderers.php'),

    /*
    |--------------------------------------------------------------------------
    | Feature Configurations
    |--------------------------------------------------------------------------
    */
    'features' => [
        'sorting' => require(__DIR__ . '/datatable/features/sorting.php'),
        'pagination' => require(__DIR__ . '/datatable/features/pagination.php'),
        'scrolling' => require(__DIR__ . '/datatable/features/scrolling.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Events Configuration
    |--------------------------------------------------------------------------
    */
    'events' => require(__DIR__ . '/datatable/events.php'),

    /*
    |--------------------------------------------------------------------------
    | Validation Configuration
    |--------------------------------------------------------------------------
    */
    'validation' => require(__DIR__ . '/datatable/validation.php'),

    /*
    |--------------------------------------------------------------------------
    | Package Information
    |--------------------------------------------------------------------------
    */
    'package' => [
        'name' => 'MantineLiveWire DataTable',
        'version' => '1.0.0',
        'author' => 'Cline',
        'license' => 'MIT',
        'repository' => 'https://github.com/entrepeneur4lyf/mantinelivewire',
    ],

    /*
    |--------------------------------------------------------------------------
    | Development Settings
    |--------------------------------------------------------------------------
    */
    'development' => [
        'debug' => env('APP_DEBUG', false),
        'logLevel' => env('LOG_LEVEL', 'error'),
        'strictMode' => true,
    ],
];
