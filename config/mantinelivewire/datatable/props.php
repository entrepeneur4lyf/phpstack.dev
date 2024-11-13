<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Record Identification
    |--------------------------------------------------------------------------
    */
    'identification' => [
        'idAccessor' => 'id',
        'idType' => 'string', // 'string', 'number', or 'function'
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout Properties
    |--------------------------------------------------------------------------
    */
    'layout' => [
        'withRowBorders' => true,
        'withColumnBorders' => false,
        'withTableBorder' => true,
        'noHeader' => false,
        'withShadow' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Visual Properties
    |--------------------------------------------------------------------------
    */
    'visual' => [
        'striped' => false,
        'highlightOnHover' => true,
        'shadow' => 'sm',
        'borderRadius' => 'sm',
    ],

    /*
    |--------------------------------------------------------------------------
    | Spacing Properties
    |--------------------------------------------------------------------------
    */
    'spacing' => [
        'horizontalSpacing' => 'xs',
        'verticalSpacing' => 'xs',
        'fontSize' => 'sm',
        'verticalAlign' => 'center',
    ],

    /*
    |--------------------------------------------------------------------------
    | Color Properties
    |--------------------------------------------------------------------------
    */
    'colors' => [
        'textColor' => null,
        'backgroundColor' => null,
        'borderColor' => null,
        'rowBorderColor' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Selection Properties
    |--------------------------------------------------------------------------
    */
    'selection' => [
        'enabled' => false,
        'trigger' => 'click',
        'checkboxProps' => [
            'color' => 'blue',
            'radius' => 'sm',
        ],
        'highlightSelected' => true,
        'preserveSelected' => false,
        'selectableRows' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Empty State Properties
    |--------------------------------------------------------------------------
    */
    'emptyState' => [
        'noRecordsText' => 'No records found',
        'noRecordsIcon' => null,
        'loadingText' => 'Loading...',
        'errorText' => 'An error occurred while loading data',
    ],

    /*
    |--------------------------------------------------------------------------
    | Loading State Properties
    |--------------------------------------------------------------------------
    */
    'loading' => [
        'loaderSize' => 'md',
        'loaderVariant' => 'oval',
        'loaderColor' => 'blue',
        'loaderBackgroundBlur' => 2,
        'showLoaderOverlay' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Names
    |--------------------------------------------------------------------------
    */
    'classNames' => [
        'root' => 'mantine-datatable-root',
        'table' => 'mantine-datatable-table',
        'header' => 'mantine-datatable-header',
        'footer' => 'mantine-datatable-footer',
        'pagination' => 'mantine-datatable-pagination',
        'loading' => 'mantine-datatable-loading',
        'empty' => 'mantine-datatable-empty',
        'error' => 'mantine-datatable-error',
    ],

    /*
    |--------------------------------------------------------------------------
    | Accessibility Properties
    |--------------------------------------------------------------------------
    */
    'accessibility' => [
        'role' => 'grid',
        'labelledBy' => null,
        'describedBy' => null,
        'keyboardNavigation' => true,
        'focusable' => true,
        'tabIndex' => 0,
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Properties
    |--------------------------------------------------------------------------
    */
    'performance' => [
        'virtualizeRows' => false,
        'virtualizeThreshold' => 50,
        'rowHeight' => 'auto',
        'overscanCount' => 5,
        'enableResizeObserver' => true,
    ],
];
