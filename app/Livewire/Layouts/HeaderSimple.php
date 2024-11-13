<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeaderSimple extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-simple';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeaderSimple/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                ['label' => 'Home', 'href' => '#'],
                ['label' => 'About', 'href' => '#'],
                ['label' => 'Contact', 'href' => '#'],
            ],
            'cta' => [
                'label' => 'Get started',
                'href' => '#',
            ],
        ]);
    }
}
