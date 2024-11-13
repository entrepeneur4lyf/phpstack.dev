<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Animation Configuration
    |--------------------------------------------------------------------------
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | AutoAnimate Configuration
    |--------------------------------------------------------------------------
    */
    'autoAnimate' => [
        // Animation duration in milliseconds
        'duration' => 250,

        // Animation easing function
        'easing' => 'ease-in-out',

        // When true, this will enable animations even if the user has indicated
        // they don't want them via prefers-reduced-motion
        'disrespectUserMotionPreference' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Animation Targets
    |--------------------------------------------------------------------------
    */
    'targets' => [
        // Animate row additions/removals
        'rows' => true,

        // Animate row reordering
        'reordering' => true,

        // Animate row expansion/collapse
        'expansion' => true,

        // Animate selection changes
        'selection' => true,

        // Animate loading states
        'loading' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Animation Effects
    |--------------------------------------------------------------------------
    */
    'effects' => [
        // Row addition effect
        'add' => [
            'opacity' => [0, 1],
            'transform' => ['translateY(-20px)', 'translateY(0)'],
        ],

        // Row removal effect
        'remove' => [
            'opacity' => [1, 0],
            'transform' => ['translateY(0)', 'translateY(20px)'],
        ],

        // Row reordering effect
        'reorder' => [
            'opacity' => [0.5, 1],
            'transform' => ['scale(0.98)', 'scale(1)'],
        ],

        // Row expansion effect
        'expand' => [
            'opacity' => [0, 1],
            'transform' => ['scaleY(0)', 'scaleY(1)'],
        ],

        // Row collapse effect
        'collapse' => [
            'opacity' => [1, 0],
            'transform' => ['scaleY(1)', 'scaleY(0)'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Settings
    |--------------------------------------------------------------------------
    */
    'performance' => [
        // Use hardware acceleration when possible
        'useHardwareAcceleration' => true,

        // Disable animations for large datasets
        'disableThreshold' => 1000,

        // Use reduced motion when available
        'respectReducedMotion' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Settings
    |--------------------------------------------------------------------------
    */
    'debug' => [
        // Log animation events to console
        'logEvents' => false,

        // Add debug classes to animated elements
        'addClasses' => false,

        // Slow down animations for debugging
        'slowMotion' => false,
    ],
];
