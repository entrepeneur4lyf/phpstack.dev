<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class StatsRingCard extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'stats-ring-card';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/StatsRingCard/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'stats' => [
                'total' => 1887,
                'completed' => 1447,
                'inProgress' => 76,
            ],
        ]);
    }
}
