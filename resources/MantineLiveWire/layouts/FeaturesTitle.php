<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FeaturesTitle extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'features-title';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FeaturesTitle/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'features' => [
                'title' => 'A fully featured React components library for your next project',
                'description' => 'Build fully functional accessible web applications faster than ever – Mantine includes more than 120 customizable components and hooks to cover you in any situation',
                'action' => 'Get started',
                'items' => [
                    [
                        'icon' => 'receipt',
                        'title' => 'Free and open source',
                        'description' => 'All packages are published under MIT license, you can use Mantine in any project',
                    ],
                    [
                        'icon' => 'code',
                        'title' => 'TypeScript based',
                        'description' => 'Build type safe applications, all components and hooks export types',
                    ],
                    [
                        'icon' => 'circle',
                        'title' => 'No annoying focus ring',
                        'description' => 'With new :focus-visible selector focus ring will appear only when user navigates with keyboard',
                    ],
                    [
                        'icon' => 'flame',
                        'title' => 'Flexible',
                        'description' => 'Customize colors, spacing, shadows, fonts and many other settings with global theme object',
                    ],
                ],
            ],
        ]);
    }
}
