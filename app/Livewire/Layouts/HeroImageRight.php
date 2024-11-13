<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroImageRight extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-image-right';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroImageRight/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'A fully featured React components library',
                'description' => 'Build fully functional accessible web applications with ease – Mantine includes more than 100 customizable components and hooks to cover you in any situation',
                'primaryAction' => 'Get started',
                'image' => 'https://ui.mantine.dev/_next/static/media/image.9a65bd94.svg',
            ],
        ]);
    }
}
