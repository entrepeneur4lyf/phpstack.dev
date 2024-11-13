<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NavbarSearch extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-search';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarSearch/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'version' => 'v3.1.2',
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
                    'label' => 'Releases',
                    'icon' => 'rocket',
                    'href' => '#',
                ],
                [
                    'label' => 'Account',
                    'icon' => 'user',
                    'href' => '#',
                ],
                [
                    'label' => 'Security',
                    'icon' => 'shield',
                    'href' => '#',
                ],
                [
                    'label' => 'Settings',
                    'icon' => 'settings',
                    'href' => '#',
                ],
            ],
            'userLinks' => [
                [
                    'label' => 'Profile',
                    'icon' => 'user',
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
