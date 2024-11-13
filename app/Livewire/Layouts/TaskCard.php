<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class TaskCard extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'task-card';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/TaskCard/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'task' => [
                'daysLeft' => 12,
                'version' => '5.3 minor release (September 2022)',
                'title' => 'Form context management',
                'description' => 'Form context management, Switch, Grid and Indicator components improvements, new hook and 10+ other changes',
                'completedTasks' => 23,
                'totalTasks' => 36,
                'team' => [
                    [
                        'id' => 1,
                        'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png',
                    ],
                    [
                        'id' => 2,
                        'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-4.png',
                    ],
                    [
                        'id' => 3,
                        'avatar' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-7.png',
                    ],
                ],
                'additionalMembers' => 5,
            ],
        ]);
    }
}
