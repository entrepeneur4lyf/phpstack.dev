<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroTitle extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-title';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroTitle/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'A fully featured React components and hooks library',
                'description' => 'Build fully functional accessible web applications with ease – Mantine includes more than 100 customizable components and hooks to cover you in any situation',
                'primaryAction' => 'Get started',
                'githubUrl' => 'https://github.com/mantinedev/mantine',
            ],
        ]);
    }
}
