<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class NavbarDivided extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-divided';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarDivided/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'sections' => [
                [
                    'label' => 'Main',
                    'links' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'layout-dashboard',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Analytics',
                            'icon' => 'chart-bar',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Releases',
                            'icon' => 'rocket',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'Organization',
                    'links' => [
                        [
                            'label' => 'Projects',
                            'icon' => 'folder',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Team',
                            'icon' => 'users',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Calendar',
                            'icon' => 'calendar',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'System',
                    'links' => [
                        [
                            'label' => 'Settings',
                            'icon' => 'settings',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Security',
                            'icon' => 'shield',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Support',
                            'icon' => 'lifebuoy',
                            'href' => '#',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
