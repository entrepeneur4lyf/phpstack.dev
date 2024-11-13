<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FooterSimple extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'footer-simple';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FooterSimple/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'links' => [
                [
                    'label' => 'Contact',
                    'href' => '#',
                ],
                [
                    'label' => 'Privacy',
                    'href' => '#',
                ],
                [
                    'label' => 'Blog',
                    'href' => '#',
                ],
                [
                    'label' => 'Careers',
                    'href' => '#',
                ],
            ],
        ]);
    }
}
