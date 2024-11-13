<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeaderMenu extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-menu';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeaderMenu/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                ['label' => 'Home', 'href' => '#'],
                ['label' => 'Learn', 'href' => '#'],
                ['label' => 'Academy', 'href' => '#'],
            ],
            'menuItems' => [
                ['label' => 'Dashboard', 'icon' => 'layout-dashboard'],
                ['label' => 'Analytics', 'icon' => 'chart-bar'],
                ['label' => 'Messages', 'icon' => 'message'],
                ['label' => 'Team', 'icon' => 'users'],
                ['label' => 'Settings', 'icon' => 'settings'],
            ],
            'userLinks' => [
                ['label' => 'Sign in', 'href' => '#'],
                ['label' => 'Sign up', 'href' => '#'],
            ],
        ]);
    }
}
