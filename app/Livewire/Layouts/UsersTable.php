<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class UsersTable extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'users-table';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UsersTable/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'users' => [
                [
                    'id' => 1,
                    'name' => 'Robert Wolfkisser',
                    'role' => 'Engineer',
                    'email' => 'rob_wolf@gmail.com',
                    'phone' => '+44 (452) 886 09 12',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-1.png',
                ],
                [
                    'id' => 2,
                    'name' => 'Jill Jailbreaker',
                    'role' => 'Engineer',
                    'email' => 'jj@breaker.com',
                    'phone' => '+44 (934) 777 12 76',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-7.png',
                ],
                [
                    'id' => 3,
                    'name' => 'Henry Silkeater',
                    'role' => 'Designer',
                    'email' => 'henry@silkeater.io',
                    'phone' => '+44 (901) 384 88 34',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png',
                ],
                [
                    'id' => 4,
                    'name' => 'Bill Horsefighter',
                    'role' => 'Designer',
                    'email' => 'bhorsefighter@gmail.com',
                    'phone' => '+44 (667) 341 45 22',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-3.png',
                ],
                [
                    'id' => 5,
                    'name' => 'Jeremy Footviewer',
                    'role' => 'Manager',
                    'email' => 'jeremy@foot.dev',
                    'phone' => '+44 (881) 245 65 65',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-10.png',
                ],
            ],
        ]);
    }
}
