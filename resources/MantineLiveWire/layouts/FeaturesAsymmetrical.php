<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class FeaturesAsymmetrical extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'features-asymmetrical';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FeaturesAsymmetrical/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'features' => [
                'items' => [
                    [
                        'icon' => 'truck',
                        'title' => 'Free Worldwide shipping',
                        'description' => 'As electricity builds up inside its body, it becomes more aggressive. One theory is that the electricity.',
                    ],
                    [
                        'icon' => 'certificate',
                        'title' => 'Best Quality Product',
                        'description' => 'Slakoth\'s heart beats just once a minute. Whatever happens, it is content to loaf around motionless.',
                    ],
                    [
                        'icon' => 'coin',
                        'title' => 'Very Affordable Pricing',
                        'description' => 'Thought to have gone extinct, Relicanth was given a name that is a variation of the name of the person who discovered.',
                    ],
                ],
            ],
        ]);
    }
}
