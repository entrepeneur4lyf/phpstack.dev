<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class AuthenticationForm extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'authentication-form';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/AuthenticationForm/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'auth' => [
                'title' => 'Welcome to Mantine',
                'subtitle' => 'login with',
            ],
        ]);
    }
}
