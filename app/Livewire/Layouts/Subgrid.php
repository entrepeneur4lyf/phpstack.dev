<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class Subgrid extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'subgrid';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/Subgrid/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'items' => [
                [
                    'id' => 1,
                    'mainImage' => 'https://placehold.co/400x280',
                    'subItems' => [
                        [
                            'id' => 11,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 1.1',
                        ],
                        [
                            'id' => 12,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 1.2',
                        ],
                    ],
                ],
                [
                    'id' => 2,
                    'mainImage' => 'https://placehold.co/400x280',
                    'subItems' => [
                        [
                            'id' => 21,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 2.1',
                        ],
                        [
                            'id' => 22,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 2.2',
                        ],
                    ],
                ],
                [
                    'id' => 3,
                    'mainImage' => 'https://placehold.co/400x280',
                    'subItems' => [
                        [
                            'id' => 31,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 3.1',
                        ],
                        [
                            'id' => 32,
                            'image' => 'https://placehold.co/200x120',
                            'title' => 'Sub Item 3.2',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
