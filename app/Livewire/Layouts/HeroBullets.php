<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroBullets extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-bullets';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroBullets/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'A modern React components library',
                'description' => 'Build fully functional accessible web applications faster than ever – Mantine includes more than 120 customizable components and hooks to cover you in any situation',
                'features' => [
                    'TypeScript based – build type safe applications, all components and hooks export types',
                    'Free and open source – all packages have MIT license, you can use Mantine in any project',
                    'No annoying focus ring – focus ring will appear only when user navigates with keyboard',
                ],
                'primaryAction' => 'Get started',
                'secondaryAction' => 'Source code',
                'image' => '/_next/static/media/image.9a65bd94.svg',
            ],
        ]);
    }
}
