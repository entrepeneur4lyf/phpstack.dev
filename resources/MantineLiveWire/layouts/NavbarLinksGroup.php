<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class NavbarLinksGroup extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'navbar-links-group';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/NavbarLinksGroup/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'data' => [
                [
                    'label' => 'First Steps',
                    'icon' => 'rocket',
                    'links' => [
                        ['label' => 'Getting started', 'href' => '#'],
                        ['label' => 'Installation', 'href' => '#'],
                        ['label' => 'Quick start', 'href' => '#'],
                    ],
                ],
                [
                    'label' => 'Components',
                    'icon' => 'puzzle',
                    'links' => [
                        ['label' => 'Buttons', 'href' => '#'],
                        ['label' => 'Forms', 'href' => '#'],
                        ['label' => 'Layouts', 'href' => '#'],
                    ],
                ],
                [
                    'label' => 'Resources',
                    'icon' => 'book',
                    'links' => [
                        ['label' => 'Documentation', 'href' => '#'],
                        ['label' => 'Examples', 'href' => '#'],
                        ['label' => 'Community', 'href' => '#'],
                    ],
                ],
                [
                    'label' => 'Support',
                    'icon' => 'lifebuoy',
                    'links' => [
                        ['label' => 'FAQ', 'href' => '#'],
                        ['label' => 'Contact', 'href' => '#'],
                        ['label' => 'Forums', 'href' => '#'],
                    ],
                ],
            ],
        ]);
    }
}
