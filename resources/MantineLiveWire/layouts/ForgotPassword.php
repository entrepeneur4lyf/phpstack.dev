<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class ForgotPassword extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'forgot-password';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/ForgotPassword/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'auth' => [
                'title' => 'Forgot your password?',
                'description' => 'Enter your email to get a reset link',
                'backLink' => 'Back to the login page',
                'action' => 'Reset password',
            ],
        ]);
    }
}
