<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Date and Time Renderers
    |--------------------------------------------------------------------------
    */
    'datetime' => [
        'format' => 'MMM d, yyyy HH:mm',
        'relative' => false,
        'locale' => null,
        'timezone' => null,
        'calendar' => false,
    ],

    'date' => [
        'format' => 'MMM d, yyyy',
        'relative' => false,
        'locale' => null,
        'calendar' => false,
    ],

    'time' => [
        'format' => 'HH:mm',
        'relative' => false,
        'locale' => null,
        'timezone' => null,
    ],

    'relative' => [
        'format' => null,
        'relative' => true,
        'calendar' => true,
        'units' => ['year', 'month', 'week', 'day', 'hour', 'minute'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Number Renderers
    |--------------------------------------------------------------------------
    */
    'number' => [
        'locale' => null,
        'style' => 'decimal',
        'minimumFractionDigits' => 0,
        'maximumFractionDigits' => 2,
        'useGrouping' => true,
    ],

    'currency' => [
        'locale' => null,
        'currency' => 'USD',
        'minimumFractionDigits' => 2,
        'maximumFractionDigits' => 2,
        'useGrouping' => true,
        'currencyDisplay' => 'symbol', // symbol, code, name
    ],

    'percent' => [
        'locale' => null,
        'minimumFractionDigits' => 0,
        'maximumFractionDigits' => 2,
        'multiplier' => 1,
        'includeSymbol' => true,
    ],

    'fileSize' => [
        'locale' => null,
        'unit' => 'auto', // auto, B, KB, MB, GB, TB
        'precision' => 2,
        'useGrouping' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Boolean Renderers
    |--------------------------------------------------------------------------
    */
    'boolean' => [
        'trueValue' => 'Yes',
        'falseValue' => 'No',
        'trueColor' => 'green',
        'falseColor' => 'red',
        'variant' => 'light',
        'size' => 'sm',
        'radius' => 'sm',
    ],

    'switch' => [
        'size' => 'sm',
        'color' => 'blue',
        'radius' => 'xl',
        'thumbIcon' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Status Renderers
    |--------------------------------------------------------------------------
    */
    'status' => [
        'colors' => [
            'active' => 'green',
            'pending' => 'yellow',
            'inactive' => 'gray',
            'error' => 'red',
            'warning' => 'orange',
            'info' => 'blue',
            'success' => 'green',
        ],
        'variant' => 'light',
        'size' => 'sm',
        'radius' => 'sm',
    ],

    'progress' => [
        'size' => 'sm',
        'radius' => 'sm',
        'color' => 'blue',
        'striped' => false,
        'animate' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Text Renderers
    |--------------------------------------------------------------------------
    */
    'text' => [
        'truncate' => [
            'enabled' => true,
            'length' => 50,
            'omission' => '...',
        ],
        'transform' => null, // uppercase, lowercase, capitalize
        'preserveWhitespace' => false,
    ],

    'markdown' => [
        'allowHtml' => false,
        'breaks' => false,
        'linkify' => true,
        'typographer' => true,
    ],

    'code' => [
        'language' => null,
        'showLineNumbers' => false,
        'wrap' => false,
        'theme' => 'default',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Renderers
    |--------------------------------------------------------------------------
    */
    'image' => [
        'width' => 40,
        'height' => 40,
        'radius' => 'sm',
        'fit' => 'cover',
        'withPlaceholder' => true,
    ],

    'avatar' => [
        'size' => 'sm',
        'radius' => 'sm',
        'color' => null,
        'variant' => 'light',
    ],
];
