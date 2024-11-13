<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class NothingFoundBackground extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'nothing-found-background';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NothingFoundBackground/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'error' => [
                'title' => 'Nothing to see here',
                'description' => 'Page you are trying to open does not exist. You may have mistyped the address, or the page has been moved to another URL. If you think this is an error contact support.',
                'action' => 'Take me back to home page',
                'image' => 'https://raw.githubusercontent.com/mantinedev/ui.mantine.dev/master/public/404.svg',
            ],
        ]);
    }
}
