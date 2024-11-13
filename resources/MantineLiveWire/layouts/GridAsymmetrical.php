<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class GridAsymmetrical extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'grid-asymmetrical';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/GridAsymmetrical/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'items' => [
                [
                    'id' => 1,
                    'title' => 'Featured Article',
                    'description' => 'This is a featured article with a larger image',
                    'image' => 'https://placehold.co/800x440',
                ],
                [
                    'id' => 2,
                    'title' => 'Secondary Article 1',
                    'description' => 'A secondary article with a smaller image',
                    'image' => 'https://placehold.co/400x210',
                ],
                [
                    'id' => 3,
                    'title' => 'Secondary Article 2',
                    'description' => 'Another secondary article with a smaller image',
                    'image' => 'https://placehold.co/400x210',
                ],
            ],
        ]);
    }
}
