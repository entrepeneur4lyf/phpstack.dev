<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class UserCardImage extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'user-card-image';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/UserCardImage/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'user' => [
                'name' => 'Bill Headbanger',
                'job' => 'Fullstack engineer',
                'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-9.png',
                'backgroundImage' => 'https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80',
                'stats' => [
                    'followers' => 34,
                    'follows' => 187,
                    'posts' => 1.6,
                ],
            ],
        ]);
    }
}
