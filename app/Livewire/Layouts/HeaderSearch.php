<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class HeaderSearch extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-search';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeaderSearch/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                ['label' => 'Home', 'href' => '#'],
                ['label' => 'Learn', 'href' => '#'],
                ['label' => 'Academy', 'href' => '#'],
            ],
            'searchData' => [
                [
                    'title' => 'Getting Started',
                    'description' => 'Learn the basics of our platform',
                ],
                [
                    'title' => 'Components',
                    'description' => 'Explore our UI component library',
                ],
                [
                    'title' => 'Documentation',
                    'description' => 'Read our comprehensive guides',
                ],
                [
                    'title' => 'API Reference',
                    'description' => 'Detailed API documentation',
                ],
                [
                    'title' => 'Examples',
                    'description' => 'View example projects and code',
                ],
            ],
        ]);
    }
}
