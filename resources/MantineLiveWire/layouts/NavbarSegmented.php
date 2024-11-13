<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NavbarSegmented extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-segmented';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarSegmented/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'sections' => [
                [
                    'label' => 'Dashboard',
                    'value' => 'dashboard',
                    'description' => 'Application dashboard and analytics',
                    'links' => [
                        [
                            'label' => 'Overview',
                            'icon' => 'layout-dashboard',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Analytics',
                            'icon' => 'chart-bar',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Reports',
                            'icon' => 'file-analytics',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'Management',
                    'value' => 'management',
                    'description' => 'Manage your team and resources',
                    'links' => [
                        [
                            'label' => 'Team',
                            'icon' => 'users',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Projects',
                            'icon' => 'folder',
                            'href' => '#',
                        ],
                        [
                            'label' => 'Resources',
                            'icon' => 'database',
                            'href' => '#',
                        ],
                    ],
                ],
                [
                    'label' => 'Settings',
                    'value' => 'settings',
                    'description' => 'Configure your application',
                    'links' => [
                        [
                            'label' => 'General',
                            'icon' => 'settings',
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
