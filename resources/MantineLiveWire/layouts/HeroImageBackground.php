<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroImageBackground extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-image-background';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroImageBackground/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'Automated AI code reviews for any stack',
                'description' => 'Build more reliable software with AI companion. AI is also trained to detect lazy developers who do nothing and just complain on Twitter.',
                'primaryAction' => 'Get started',
                'secondaryAction' => 'Live demo',
                'backgroundImage' => 'https://images.unsplash.com/photo-1419242902214-272b3f66ee7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80',
            ],
        ]);
    }
}
