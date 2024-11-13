<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class ServerError extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'server-error';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/ServerError/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'error' => [
                'code' => '500',
                'title' => 'Something bad just happened...',
                'description' => 'Our servers could not handle your request. Don\'t worry, our development team was already notified. Try refreshing the page.',
                'action' => 'Refresh the page',
            ],
        ]);
    }
}
