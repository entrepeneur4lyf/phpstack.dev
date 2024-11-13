<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class NotFoundImage extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'not-found-image';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NotFoundImage/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'error' => [
                'title' => 'Something is not right...',
                'description' => 'Page you are trying to open does not exist. You may have mistyped the address, or the page has been moved to another URL. If you think this is an error contact support.',
                'action' => 'Get back to home page',
                'image' => 'https://ui.mantine.dev/_next/static/media/image.11cd6c19.svg',
            ],
        ]);
    }
}
