<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class AuthenticationTitle extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'authentication-title';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/AuthenticationTitle/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'auth' => [
                'title' => 'Welcome back!',
                'subtitle' => 'Do not have an account yet?',
                'subtitleLink' => 'Create account',
            ],
        ]);
    }
}
