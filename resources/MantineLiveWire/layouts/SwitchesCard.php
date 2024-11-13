<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class SwitchesCard extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'switches-card';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/SwitchesCard/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'preferences' => [
                [
                    'title' => 'Messages',
                    'description' => 'Direct messages you have received from other users',
                    'active' => false,
                ],
                [
                    'title' => 'Review requests',
                    'description' => 'Code review requests from your team members',
                    'active' => false,
                ],
                [
                    'title' => 'Comments',
                    'description' => 'Daily digest with comments on your posts',
                    'active' => false,
                ],
                [
                    'title' => 'Recommendations',
                    'description' => 'Digest with best community posts from previous week',
                    'active' => false,
                ],
            ],
        ]);
    }
}
