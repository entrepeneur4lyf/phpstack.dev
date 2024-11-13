<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class NavbarNested extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-nested';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarNested/index.js';
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
                    'label' => 'Infrastructure',
                    'icon' => 'server-2',
                    'links' => [
                        [
                            'label' => 'Cloud',
                            'icon' => 'cloud',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Databases',
                            'icon' => 'database',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Monitoring',
                            'icon' => 'activity',
                            'href' => '#',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
