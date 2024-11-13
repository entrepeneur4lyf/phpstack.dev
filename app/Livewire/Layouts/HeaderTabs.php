<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class HeaderTabs extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-tabs';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeaderTabs/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                [
                    'label' => 'Home',
                    'href' => '#',
                    'icon' => 'home',
                ],
                [
                    'label' => 'Dashboard',
                    'href' => '#',
                    'icon' => 'dashboard',
                ],
                [
                    'label' => 'Analytics',
                    'href' => '#',
                    'icon' => 'chart-bar',
                ],
                [
                    'label' => 'Settings',
                    'href' => '#',
                    'icon' => 'settings',
                ],
            ],
            'userLinks' => [
                ['label' => 'Sign in', 'href' => '#'],
                ['label' => 'Sign up', 'href' => '#'],
            ],
        ]);
    }
}
