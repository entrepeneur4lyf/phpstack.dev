<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FeaturesCard extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'features-card';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FeaturesCard/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'card' => [
                'image' => 'https://i.imgur.com/ZL52Q2D.png',
                'title' => 'Tesla Model S',
                'description' => 'Free recharge at any station',
                'badge' => '25% off',
                'features' => [
                    [
                        'label' => '4 passengers',
                        'icon' => 'users',
                    ],
                    [
                        'label' => '100 km/h in 4 seconds',
                        'icon' => 'gauge',
                    ],
                    [
                        'label' => 'Automatic gearbox',
                        'icon' => 'manual-gearbox',
                    ],
                    [
                        'label' => 'Electric',
                        'icon' => 'gas-station',
                    ],
                ],
                'price' => '$168.00',
                'period' => 'per day',
                'actionLabel' => 'Rent now',
            ],
        ]);
    }
}
