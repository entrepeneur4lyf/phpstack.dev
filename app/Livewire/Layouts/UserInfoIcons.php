<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class UserInfoIcons extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'user-info-icons';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UserInfoIcons/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'user' => [
                'name' => 'Robert Glassbreaker',
                'role' => 'Software engineer',
                'email' => 'robert@glassbreaker.io',
                'phone' => '+11 (876) 890 56 23',
                'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png',
            ],
        ]);
    }
}
