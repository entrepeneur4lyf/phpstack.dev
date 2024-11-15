<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class PhpStackLayout extends BaseLayout
{
    public function render()
    {
        return view('mantinelivewire::layouts.phpstack', [
            'theme' => [
                'primaryColor' => 'indigo',
                'colors' => [
                    'indigo' => [
                        '#eef2ff', // 50
                        '#e0e7ff', // 100
                        '#c7d2fe', // 200
                        '#a5b4fc', // 300
                        '#818cf8', // 400
                        '#6366f1', // 500
                        '#4f46e5', // 600
                        '#4338ca', // 700
                        '#3730a3', // 800
                        '#312e81', // 900
                    ],
                ],
                'fontFamily' => 'Inter, system-ui, sans-serif',
                'defaultRadius' => 'md',
                'white' => '#ffffff',
                'black' => '#111827',
                'components' => [
                    'Button' => [
                        'defaultProps' => [
                            'radius' => 'xl',
                            'size' => 'md',
                        ],
                        'styles' => [
                            'root' => [
                                'fontWeight' => 600,
                            ],
                        ],
                    ],
                    'Title' => [
                        'defaultProps' => [
                            'order' => 2,
                        ],
                        'styles' => [
                            'root' => [
                                'fontWeight' => 700,
                                'letterSpacing' => '-0.025em',
                            ],
                        ],
                    ],
                    'Text' => [
                        'defaultProps' => [
                            'size' => 'md',
                        ],
                        'styles' => [
                            'root' => [
                                'lineHeight' => 1.625,
                            ],
                        ],
                    ],
                    'Container' => [
                        'defaultProps' => [
                            'size' => 'xl',
                            'px' => 'md',
                        ],
                    ],
                    'Card' => [
                        'defaultProps' => [
                            'radius' => 'lg',
                            'shadow' => 'sm',
                            'withBorder' => true,
                        ],
                    ],
                ],
            ],
        ]);
    }
}
