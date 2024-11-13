<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class BadgeCard extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'badge-card';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/BadgeCard/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'card' => [
                'image' => 'https://images.unsplash.com/photo-1437719417032-8595fd9e9dc6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80',
                'title' => 'Verudela Beach',
                'country' => 'Croatia',
                'description' => 'Completely renovated for the season 2020, Arena Verudela Bech Apartments are fully equipped and modernly furnished 4-star self-service apartments located on the Adriatic coastline by one of the most beautiful beaches in Pula.',
                'features' => [
                    '☀️ Sunny weather',
                    '🦓 Onsite zoo',
                    '🌊 Sea',
                    '🌲 Nature',
                    '🤽 Water sports',
                ],
            ],
        ]);
    }
}
