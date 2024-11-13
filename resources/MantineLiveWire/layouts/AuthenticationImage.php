<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class AuthenticationImage extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'authentication-image';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/AuthenticationImage/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'auth' => [
                'title' => 'Welcome back to Mantine!',
                'backgroundImage' => 'https://images.unsplash.com/photo-1484242857719-4b9144542727?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80',
            ],
        ]);
    }
}
