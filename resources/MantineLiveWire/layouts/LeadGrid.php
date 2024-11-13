<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class LeadGrid extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'lead-grid';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/LeadGrid/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'items' => [
                [
                    'id' => 1,
                    'title' => 'Featured Content',
                    'description' => 'This is the main featured content that spans the full width',
                    'image' => 'https://placehold.co/1200x320',
                ],
                [
                    'id' => 2,
                    'title' => 'Grid Item 1',
                    'description' => 'A smaller grid item',
                    'image' => 'https://placehold.co/300x200',
                ],
                [
                    'id' => 3,
                    'title' => 'Grid Item 2',
                    'description' => 'Another smaller grid item',
                    'image' => 'https://placehold.co/300x200',
                ],
                [
                    'id' => 4,
                    'title' => 'Grid Item 3',
                    'description' => 'Yet another smaller grid item',
                    'image' => 'https://placehold.co/300x200',
                ],
                [
                    'id' => 5,
                    'title' => 'Grid Item 4',
                    'description' => 'The final smaller grid item',
                    'image' => 'https://placehold.co/300x200',
                ],
            ],
        ]);
    }
}
