<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class FeaturesCards extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'features-cards';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FeaturesCards/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'features' => [
                'title' => 'Best company ever',
                'items' => [
                    [
                        'icon' => 'gauge',
                        'title' => 'Extreme performance',
                        'description' => 'This dust is actually a powerful poison that will even make a pro wrestler sick, Regice cloaks itself with frigid air of -328 degrees Fahrenheit',
                    ],
                    [
                        'icon' => 'user',
                        'title' => 'Privacy focused',
                        'description' => 'People say it can run at the same speed as lightning striking, Its icy body is so cold, it will not melt even if it is immersed in magma',
                    ],
                    [
                        'icon' => 'cookie',
                        'title' => 'No third parties',
                        'description' => 'They\'re popular, but they\'re rare. Trainers who show them off recklessly may be targeted by thieves',
                    ],
                    [
                        'icon' => 'lock',
                        'title' => 'Secure by default',
                        'description' => 'Although it still can\'t fly, its jumping power is outstanding, in Alola the mushrooms on Paras don\'t grow up quite right',
                    ],
                    [
                        'icon' => 'message',
                        'title' => '24/7 Support',
                        'description' => 'Rapidash usually can be seen casually cantering in the fields and plains, Skitty is known to chase around after its own tail',
                    ],
                    [
                        'icon' => 'coin',
                        'title' => 'Free for everyone',
                        'description' => 'All packages are published under MIT license, you can use Mantine in any project',
                    ],
                ],
            ],
        ]);
    }
}
