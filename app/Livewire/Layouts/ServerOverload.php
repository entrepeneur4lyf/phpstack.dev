<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class ServerOverload extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'server-overload';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/ServerOverload/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'error' => [
                'title' => 'All of our servers are busy',
                'description' => 'We cannot handle your request right now, please wait for a couple of minutes and refresh the page. Our team is already working on this issue.',
                'action' => 'Refresh the page',
            ],
        ]);
    }
}
