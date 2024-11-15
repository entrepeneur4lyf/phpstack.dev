<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Livewire\Layouts\PhpStackLayout;

class Home extends Component
{
    public function render()
    {
        return view('mantinelivewire::pages.home')
            ->layout(PhpStackLayout::class);
    }

    // Brand logos for the marquee
    public function getBrandLogos()
    {
        return [
            ['name' => 'Laravel', 'logo' => 'laravel.svg'],
            ['name' => 'Livewire', 'logo' => 'livewire.svg'],
            ['name' => 'Mantine', 'logo' => 'mantine.svg'],
            ['name' => 'Alpine.js', 'logo' => 'alpine.svg'],
            ['name' => 'Tailwind CSS', 'logo' => 'tailwind.svg'],
            ['name' => 'Vite', 'logo' => 'vite.svg'],
            ['name' => 'Framer', 'logo' => 'framer.svg'],
            ['name' => 'React', 'logo' => 'react.svg'],
            ['name' => 'Motion', 'logo' => 'motion.svg'],
        ];
    }

    // Features list
    public function getFeatures()
    {
        return [
            [
                'title' => 'Modern Tech Stack',
                'description' => 'Built with Laravel, Livewire, and Mantine UI for a powerful development experience.',
                'icon' => 'stack',
            ],
            [
                'title' => 'Real-Time UI',
                'description' => 'Interactive components with real-time updates powered by Livewire and Alpine.js.',
                'icon' => 'refresh',
            ],
            [
                'title' => 'Beautiful Animations',
                'description' => 'Smooth, hardware-accelerated animations powered by Motion and Framer.',
                'icon' => 'animation',
            ],
        ];
    }

    // Process steps
    public function getSteps()
    {
        return [
            [
                'number' => '01',
                'title' => 'Quick Installation',
                'description' => 'Get started in minutes with our streamlined installation process and comprehensive documentation.',
                'image' => 'installation.svg',
            ],
            [
                'number' => '02',
                'title' => 'Component Setup',
                'description' => 'Easily integrate pre-built components into your application with simple Blade directives.',
                'image' => 'components.svg',
            ],
            [
                'number' => '03',
                'title' => 'Customization',
                'description' => 'Tailor components to your needs with extensive theming and animation options.',
                'image' => 'customization.svg',
            ],
        ];
    }

    // Tools list
    public function getTools()
    {
        return [
            [
                'title' => 'Authentication',
                'description' => 'Complete authentication system with login, registration, and password reset.',
                'icon' => 'lock',
            ],
            [
                'title' => 'Form Handling',
                'description' => 'Powerful form components with validation and real-time feedback.',
                'icon' => 'forms',
            ],
            [
                'title' => 'Data Tables',
                'description' => 'Interactive tables with sorting, filtering, and pagination capabilities.',
                'icon' => 'table',
            ],
            [
                'title' => 'Charts & Graphs',
                'description' => 'Beautiful data visualization components for your analytics needs.',
                'icon' => 'chart',
            ],
            [
                'title' => 'Animations',
                'description' => 'Hardware-accelerated animations powered by Motion and Framer.',
                'icon' => 'animation',
            ],
            [
                'title' => 'Notifications',
                'description' => 'Toast notifications and alerts for user feedback and updates.',
                'icon' => 'bell',
            ],
        ];
    }

    // FAQ items
    public function getFaqItems()
    {
        return [
            [
                'question' => 'What is PHP Stack?',
                'answer' => 'PHP Stack is a modern development starter kit that combines Laravel, Livewire, Mantine UI, and Motion animations to help you build powerful web applications faster.',
            ],
            [
                'question' => 'Do I need to know React?',
                'answer' => 'No! While our components are built with React internally, you interact with them using simple Blade components and Livewire. The animations are handled automatically.',
            ],
            [
                'question' => 'Can I customize the animations?',
                'answer' => 'Yes! All animations are fully customizable through props. You can modify durations, transitions, and behaviors to match your needs.',
            ],
            [
                'question' => 'Is documentation available?',
                'answer' => 'Yes, we provide comprehensive documentation covering installation, components, animations, and customization options.',
            ],
            [
                'question' => 'What about updates?',
                'answer' => 'We regularly update PHP Stack to incorporate new features and maintain compatibility with the latest versions of Laravel, Livewire, and Motion.',
            ],
        ];
    }
}
