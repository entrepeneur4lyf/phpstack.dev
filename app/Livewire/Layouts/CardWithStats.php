<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class CardWithStats extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'card-with-stats';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/CardWithStats/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'card' => [
                'image' => 'https://images.unsplash.com/photo-1581889470536-467bdbe30cd0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=720&q=80',
                'title' => 'Running challenge',
                'completionText' => '80% completed',
                'stats' => '56 km this month • 17% improvement compared to last month • 443 place in global scoreboard',
                'metrics' => [
                    [
                        'label' => 'Distance',
                        'value' => '27.4 km',
                        'progress' => false,
                    ],
                    [
                        'label' => 'Avg. speed',
                        'value' => '9.6 km/h',
                        'progress' => false,
                    ],
                    [
                        'label' => 'Score',
                        'value' => 88,
                        'progress' => true,
                    ],
                ],
            ],
        ]);
    }
}
