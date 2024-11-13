<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FooterSocial extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'footer-social';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FooterSocial/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'socialLinks' => [
                [
                    'label' => 'Twitter',
                    'icon' => 'brand-twitter',
                    'href' => '#',
                ],
                [
                    'label' => 'YouTube',
                    'icon' => 'brand-youtube',
                    'href' => '#',
                ],
                [
                    'label' => 'Instagram',
                    'icon' => 'brand-instagram',
                    'href' => '#',
                ],
                [
                    'label' => 'GitHub',
                    'icon' => 'brand-github',
                    'href' => '#',
                ],
            ],
        ]);
    }
}
