<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NavbarCollapse extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-collapse';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarCollapse/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'sections' => [
                [
                    'label' => 'Development',
                    'icon' => 'code',
                    'links' => [
                        [
                            'label' => 'Frontend',
                            'icon' => 'browser',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Backend',
                            'icon' => 'server',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Mobile',
                            'icon' => 'device-mobile',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'Analytics',
                    'icon' => 'chart-bar',
                    'links' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'layout-dashboard',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Reports',
                            'icon' => 'file-analytics',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Real-time',
                            'icon' => 'chart-line',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'Settings',
                    'icon' => 'settings',
                    'links' => [
                        [
                            'label' => 'General',
                            'icon' => 'adjustments',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Security',
                            'icon' => 'shield',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Notifications',
                            'icon' => 'bell',
                            'href' => '#',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
