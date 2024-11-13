<?php

namespace App\Traits;

trait WithMantineTheme
{
    /**
     * Get the theme configuration.
     */
    public function themeConfig(): array
    {
        return [
            'colorScheme' => request()->cookie('color-scheme', 'light'),
            'primaryColor' => 'blue',
            'fontFamily' => 'system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
            'defaultRadius' => 'md',
            'white' => '#ffffff',
            'black' => '#1a1b1e',
            'colors' => [
                'dark' => [
                    0 => '#C9C9C9',
                    1 => '#B8B8B8',
                    2 => '#828282',
                    3 => '#696969',
                    4 => '#424242',
                    5 => '#3B3B3B',
                    6 => '#2E2E2E',
                    7 => '#242424',
                    8 => '#1F1F1F',
                    9 => '#141414',
                ],
            ],
            'components' => [
                'Button' => [
                    'defaultProps' => [
                        'size' => 'md',
                    ],
                ],
                'TextInput' => [
                    'defaultProps' => [
                        'size' => 'md',
                    ],
                ],
                'Select' => [
                    'defaultProps' => [
                        'size' => 'md',
                    ],
                ],
                'Modal' => [
                    'defaultProps' => [
                        'radius' => 'md',
                        'shadow' => 'md',
                    ],
                ],
                'Paper' => [
                    'defaultProps' => [
                        'radius' => 'md',
                        'shadow' => 'md',
                    ],
                ],
            ],
        ];
    }

    /**
     * Get the base layout configuration.
     */
    protected function baseLayoutConfig(): array
    {
        return [
            'header' => [
                'height' => 60,
            ],
            'footer' => [
                'height' => 60,
            ],
            'padding' => $this->padding ?? 'md',
        ];
    }
}
