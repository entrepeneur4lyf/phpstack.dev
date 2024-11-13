<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NavbarDouble extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-double';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarDouble/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                [
                    'label' => 'Dashboard',
                    'icon' => 'layout-dashboard',
                    'href' => '#',
                ],
                [
                    'label' => 'Documentation',
                    'icon' => 'book',
                    'href' => '#',
                ],
                [
                    'label' => 'Analytics',
                    'icon' => 'chart-bar',
                    'href' => '#',
                ],
                [
                    'label' => 'Settings',
                    'icon' => 'settings',
                    'href' => '#',
                ],
            ],
            'content' => [
                [
                    'section' => 'Dashboard',
                    'title' => 'Dashboard Overview',
                    'description' => 'Monitor your key metrics and performance indicators',
                    'items' => [
                        [
                            'title' => 'Active Users',
                            'description' => '1,234 users currently online',
                        ],
                        [
                            'title' => 'Revenue',
                            'description' => '$12,345 in the last 24 hours',
                        ],
                        [
                            'title' => 'New Signups',
                            'description' => '45 new users today',
                        ],
                    ],
                ],
                [
                    'section' => 'Documentation',
                    'title' => 'Getting Started',
                    'description' => 'Learn how to use our platform effectively',
                    'items' => [
                        [
                            'title' => 'Quick Start Guide',
                            'description' => 'Get up and running in minutes',
                        ],
                        [
                            'title' => 'API Documentation',
                            'description' => 'Integrate with our API endpoints',
                        ],
                        [
                            'title' => 'Best Practices',
                            'description' => 'Learn recommended patterns and approaches',
                        ],
                    ],
                ],
                [
                    'section' => 'Analytics',
                    'title' => 'Performance Metrics',
                    'description' => 'Track and analyze your application metrics',
                    'items' => [
                        [
                            'title' => 'Traffic Overview',
                            'description' => 'Monitor site visits and user behavior',
                        ],
                        [
                            'title' => 'Conversion Rates',
                            'description' => 'Track user engagement and conversions',
                        ],
                        [
                            'title' => 'Error Tracking',
                            'description' => 'Monitor and debug application issues',
                        ],
                    ],
                ],
                [
                    'section' => 'Settings',
                    'title' => 'Application Settings',
                    'description' => 'Configure your application preferences',
                    'items' => [
                        [
                            'title' => 'General Settings',
                            'description' => 'Basic application configuration',
                        ],
                        [
                            'title' => 'Security Settings',
                            'description' => 'Manage authentication and permissions',
                        ],
                        [
                            'title' => 'Notification Settings',
                            'description' => 'Configure alerts and notifications',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
