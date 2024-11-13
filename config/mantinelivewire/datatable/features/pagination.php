<?php

return [
    // Basic settings
    'defaultRecordsPerPage' => 10,
    'recordsPerPageOptions' => [10, 25, 50, 100],
    'recordsPerPageLabel' => 'Records per page',

    // Styling
    'paginationSize' => 'sm', // xs, sm, md, lg, xl
    'paginationWrapBreakpoint' => 'sm', // xs, sm, md, lg, xl, or pixel/rem value

    // Colors (these override the props if set)
    'paginationActiveTextColor' => null,
    'paginationActiveBackgroundColor' => null,

    // Accessibility
    'paginationControlProps' => [
        'previous' => [
            'title' => 'Previous page',
            'ariaLabel' => 'Go to previous page',
        ],
        'next' => [
            'title' => 'Next page',
            'ariaLabel' => 'Go to next page',
        ],
        'first' => [
            'title' => 'First page',
            'ariaLabel' => 'Go to first page',
        ],
        'last' => [
            'title' => 'Last page',
            'ariaLabel' => 'Go to last page',
        ],
    ],

    // Text customization
    'paginationText' => '{from} - {to} / {totalRecords}',
    'loadingText' => 'Loading...',
];
