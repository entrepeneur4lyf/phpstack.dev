<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class FooterCentered extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'footer-centered';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FooterCentered/index.js';
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
                    'label' => 'Store',
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
