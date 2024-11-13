<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class HeaderMegaMenu extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'header-mega-menu';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/HeaderMegaMenu/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'mainLinks' => [
                ['label' => 'Home', 'href' => '#'],
                ['label' => 'Learn', 'href' => '#'],
                ['label' => 'Academy', 'href' => '#'],
            ],
            'megaMenu' => [
                [
                    'title' => 'Frontend Development',
                    'icon' => 'code',
                    'description' => 'Learn modern frontend frameworks and libraries',
                    'links' => [
                        ['label' => 'React', 'href' => '#'],
                        ['label' => 'Angular', 'href' => '#'],
                        ['label' => 'Vue', 'href' => '#'],
                        ['label' => 'Next.js', 'href' => '#'],
                    ],
                ],
                [
                    'title' => 'Backend Development',
                    'icon' => 'server',
                    'description' => 'Build scalable server-side applications',
                    'links' => [
                        ['label' => 'Laravel', 'href' => '#'],
                        ['label' => 'Django', 'href' => '#'],
                        ['label' => 'Express', 'href' => '#'],
                        ['label' => 'Spring', 'href' => '#'],
                    ],
                ],
                [
                    'title' => 'Mobile Development',
                    'icon' => 'device-mobile',
                    'description' => 'Create native and cross-platform mobile apps',
                    'links' => [
                        ['label' => 'React Native', 'href' => '#'],
                        ['label' => 'Flutter', 'href' => '#'],
                        ['label' => 'Swift', 'href' => '#'],
                        ['label' => 'Kotlin', 'href' => '#'],
                    ],
                ],
                [
                    'title' => 'DevOps & Cloud',
                    'icon' => 'cloud',
                    'description' => 'Master cloud platforms and deployment',
                    'links' => [
                        ['label' => 'AWS', 'href' => '#'],
                        ['label' => 'Docker', 'href' => '#'],
                        ['label' => 'Kubernetes', 'href' => '#'],
                        ['label' => 'CI/CD', 'href' => '#'],
                    ],
                ],
            ],
            'userLinks' => [
                ['label' => 'Sign in', 'href' => '#'],
                ['label' => 'Sign up', 'href' => '#'],
            ],
        ]);
    }
}
