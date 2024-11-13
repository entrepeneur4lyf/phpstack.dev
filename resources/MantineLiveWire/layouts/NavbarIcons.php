<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class NavbarIcons extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-icons';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarIcons/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                [
                    'label' => 'Home',
                    'icon' => 'home',
                    'href' => '#',
                ],
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
                    'label' => 'Messages',
                    'icon' => 'message',
                    'href' => '#',
                ],
                [
                    'label' => 'Team',
                    'icon' => 'users',
                    'href' => '#',
                ],
            ],
            'userLinks' => [
                [
                    'label' => 'Settings',
                    'icon' => 'settings',
                    'href' => '#',
                ],
                [
                    'label' => 'Logout',
                    'icon' => 'logout',
                    'href' => '#',
                ],
            ],
        ]);
    }
}
