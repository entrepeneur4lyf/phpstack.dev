<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class UserButton extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'user-button';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UserButton/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'user' => [
                'name' => 'Harriette Spoonlicker',
                'email' => 'hspoonlicker@outlook.com',
                'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-8.png',
            ],
        ]);
    }
}
