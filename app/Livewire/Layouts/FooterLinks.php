<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class FooterLinks extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'footer-links';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/FooterLinks/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'description' => 'Build fully functional accessible web applications faster than ever',
            'data' => [
                [
                    'title' => 'About',
                    'links' => [
                        ['label' => 'Features', 'href' => '#'],
                        ['label' => 'Pricing', 'href' => '#'],
                        ['label' => 'Support', 'href' => '#'],
                        ['label' => 'Forums', 'href' => '#'],
                    ],
                ],
                [
                    'title' => 'Project',
                    'links' => [
                        ['label' => 'Contribute', 'href' => '#'],
                        ['label' => 'Media assets', 'href' => '#'],
                        ['label' => 'Changelog', 'href' => '#'],
                        ['label' => 'Releases', 'href' => '#'],
                    ],
                ],
                [
                    'title' => 'Community',
                    'links' => [
                        ['label' => 'Join Discord', 'href' => '#'],
                        ['label' => 'Follow on Twitter', 'href' => '#'],
                        ['label' => 'Email newsletter', 'href' => '#'],
                        ['label' => 'GitHub discussions', 'href' => '#'],
                    ],
                ],
            ],
        ]);
    }
}
