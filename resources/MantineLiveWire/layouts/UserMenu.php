<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class UserMenu extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'user-menu';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UserMenu/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'user' => [
                'name' => 'Jane Smith',
                'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-5.png',
            ],
        ]);
    }
}
