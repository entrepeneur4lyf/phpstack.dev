<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class HeroText extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'hero-text';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeroText/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'hero' => [
                'title' => 'Automated AI code reviews for any stack',
                'description' => 'Build more reliable software with AI companion. AI is also trained to detect lazy developers who do nothing and just complain on Twitter.',
                'primaryAction' => 'Book a demo',
                'secondaryAction' => 'Purchase a license',
            ],
        ]);
    }
}
