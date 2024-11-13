<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroContentLeft extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-content-left';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroContentLeft/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'A fully featured React components library',
                'description' => 'Build fully functional accessible web applications faster than ever – Mantine includes more than 120 customizable components and hooks to cover you in any situation',
                'primaryAction' => 'Get started',
            ],
        ]);
    }
}
