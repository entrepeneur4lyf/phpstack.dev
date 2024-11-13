<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NotFoundTitle extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'not-found-title';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NotFoundTitle/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'error' => [
                'code' => '404',
                'title' => 'You have found a secret place.',
                'description' => 'Unfortunately, this is only a 404 page. You may have mistyped the address, or the page has been moved to another URL.',
                'action' => 'Take me back to home page',
            ],
        ]);
    }
}
