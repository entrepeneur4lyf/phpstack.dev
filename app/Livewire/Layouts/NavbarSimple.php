<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NavbarSimple extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-simple';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarSimple/index.js';
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
