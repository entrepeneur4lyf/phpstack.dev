<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class UsersRolesTable extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'users-roles-table';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UsersRolesTable/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'users' => [
                [
                    'id' => 1,
                    'name' => 'Robert Wolfkisser',
                    'email' => 'rob_wolf@gmail.com',
                    'role' => 'Manager',
                    'lastActive' => '2 days ago',
                    'status' => 'Active',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-9.png',
                ],
                [
                    'id' => 2,
                    'name' => 'Jill Jailbreaker',
                    'email' => 'jj@breaker.com',
                    'role' => 'Engineer',
                    'lastActive' => '6 days ago',
                    'status' => 'Active',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-6.png',
                ],
                [
                    'id' => 3,
                    'name' => 'Henry Silkeater',
                    'email' => 'henry@silkeater.io',
                    'role' => 'Designer',
                    'lastActive' => '2 days ago',
                    'status' => 'Disabled',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-10.png',
                ],
                [
                    'id' => 4,
                    'name' => 'Bill Horsefighter',
                    'email' => 'bhorsefighter@gmail.com',
                    'role' => 'Designer',
                    'lastActive' => '5 days ago',
                    'status' => 'Active',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png',
                ],
                [
                    'id' => 5,
                    'name' => 'Jeremy Footviewer',
                    'email' => 'jeremy@foot.dev',
                    'role' => 'Manager',
                    'lastActive' => '3 days ago',
                    'status' => 'Disabled',
                    'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-3.png',
                ],
            ],
        ]);
    }
}
