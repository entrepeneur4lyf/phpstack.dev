<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FeaturesImages extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'features-images';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FeaturesImages/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'features' => [
                'title' => 'Use cases',
                'description' => 'Its lungs contain an organ that creates electricity. The crackling sound of electricity can be heard when it exhales. Azurill\'s tail is large and bouncy. It is packed full of the nutrients this Pokémon needs to grow.',
                'items' => [
                    [
                        'image' => 'https://ui.mantine.dev/_next/static/media/auditors.32124e83.svg',
                        'title' => 'Pharmacists',
                        'description' => 'Azurill can be seen bouncing and playing on its big, rubbery tail',
                    ],
                    [
                        'image' => 'https://ui.mantine.dev/_next/static/media/lawyers.3ddb0c33.svg',
                        'title' => 'Lawyers',
                        'description' => 'Fans obsess over the particular length and angle of its arms',
                    ],
                    [
                        'image' => 'https://ui.mantine.dev/_next/static/media/accountants.ba1b4633.svg',
                        'title' => 'Bank owners',
                        'description' => 'They divvy up their prey evenly among the members of their pack',
                    ],
                    [
                        'image' => 'https://ui.mantine.dev/_next/static/media/others.0a9c7795.svg',
                        'title' => 'Others',
                        'description' => 'Phanpy uses its long nose to shower itself',
                    ],
                ],
            ],
        ]);
    }
}
