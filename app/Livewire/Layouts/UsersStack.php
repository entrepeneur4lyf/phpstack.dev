<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class UsersStack extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'users-stack';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UsersStack/index.js';
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
                    'rate' => '$22.0 / hr',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-1.png',
                ],
                [
                    'id' => 2,
                    'name' => 'Jill Jailbreaker',
                    'role' => 'Engineer',
                    'email' => 'jj@breaker.com',
                    'rate' => '$45.0 / hr',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-5.png',
                ],
                [
                    'id' => 3,
                    'name' => 'Henry Silkeater',
                    'role' => 'Designer',
                    'email' => 'henry@silkeater.io',
                    'rate' => '$76.0 / hr',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-3.png',
                ],
                [
                    'id' => 4,
                    'name' => 'Bill Horsefighter',
                    'role' => 'Designer',
                    'email' => 'bhorsefighter@gmail.com',
                    'rate' => '$15.0 / hr',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-3.png',
                ],
                [
                    'id' => 5,
                    'name' => 'Jeremy Footviewer',
                    'role' => 'Manager',
                    'email' => 'jeremy@foot.dev',
                    'rate' => '$98.0 / hr',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png',
                ],
            ],
        ]);
    }
}
