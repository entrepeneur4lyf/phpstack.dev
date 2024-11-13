<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class UserInfoAction extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'user-info-action';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UserInfoAction/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'user' => [
                'name' => 'Jane Fingerlicker',
                'email' => 'jfingerlicker@me.io',
                'role' => 'Art director',
                'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-8.png',
                'actionLabel' => 'Send message',
            ],
        ]);
    }
}
