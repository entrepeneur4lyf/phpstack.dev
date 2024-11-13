<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class DoubleHeader extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-double';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/DoubleHeader/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                ['label' => 'Home', 'href' => '#'],
                ['label' => 'Orders', 'href' => '#'],
                ['label' => 'Education', 'href' => '#'],
                ['label' => 'Community', 'href' => '#'],
                ['label' => 'Forums', 'href' => '#'],
                ['label' => 'Support', 'href' => '#'],
            ],
            'userLinks' => [
                ['label' => 'Account', 'href' => '#'],
                ['label' => 'Helpdesk', 'href' => '#'],
            ],
        ]);
    }
}
