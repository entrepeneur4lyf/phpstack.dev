<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Core Events
    |--------------------------------------------------------------------------
    */
    'core' => [
        'selectionChange' => 'selection-change',
        'sortChange' => 'sort-change',
        'pageChange' => 'page-change',
        'filterChange' => 'filter-change',
        'recordsPerPageChange' => 'records-per-page-change',
    ],

    /*
    |--------------------------------------------------------------------------
    | Row Events
    |--------------------------------------------------------------------------
    */
    'row' => [
        'click' => 'row-click',
        'doubleClick' => 'row-double-click',
        'contextMenu' => 'context-menu',
        'expand' => 'row-expand',
        'collapse' => 'row-collapse',
    ],

    /*
    |--------------------------------------------------------------------------
    | Column Events
    |--------------------------------------------------------------------------
    */
    'column' => [
        'resize' => 'column-resize',
        'reorder' => 'column-reorder',
        'visibility' => 'column-visibility',
        'headerClick' => 'column-header-click',
    ],

    /*
    |--------------------------------------------------------------------------
    | Scroll Events
    |--------------------------------------------------------------------------
    */
    'scroll' => [
        'reachBottom' => 'scroll-reach-bottom',
        'reachTop' => 'scroll-reach-top',
        'scroll' => 'scroll',
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Events
    |--------------------------------------------------------------------------
    */
    'data' => [
        'load' => 'data-load',
        'loadError' => 'data-load-error',
        'loadSuccess' => 'data-load-success',
        'refresh' => 'data-refresh',
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Events
    |--------------------------------------------------------------------------
    */
    'error' => [
        'error' => 'error',
        'warning' => 'warning',
        'info' => 'info',
    ],

    /*
    |--------------------------------------------------------------------------
    | Event Debouncing and Throttling
    |--------------------------------------------------------------------------
    */
    'timing' => [
        'debounce' => [
            'scroll' => 150,
            'resize' => 150,
            'filter' => 300,
            'search' => 300,
        ],
        'throttle' => [
            'scroll' => 100,
            'resize' => 100,
        ],
    ],
];
