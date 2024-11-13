<?php

namespace App\Livewire\Components\Layouts;

use Livewire\Component;
use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use App\Traits\WithColorScheme;
use App\Support\ColorSchemeManager;

class BaseLayout extends Component implements HasMingles
{
    use InteractsWithMingles;
    use WithColorScheme;

    protected ColorSchemeManager $colorSchemeManager;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->colorSchemeManager = new ColorSchemeManager();
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->initializeWithColorScheme();
    }

    /**
     * Get the path to the React component.
     */
    public function component(): string
    {
        return 'resources/js/Components/Custom/BaseLayout/index.js';
    }

    /**
     * Get the data to be passed to the React component.
     */
    public function mingleData(): array
    {
        return [
            'appName' => config('app.name'),
            'colorScheme' => $this->getCurrentColorScheme(),
            'config' => $this->getColorSchemeConfig(),
            'theme' => [
                'defaultRadius' => 'md',
                'white' => '#ffffff',
                'black' => '#1a1b1e',
                'colors' => [
                    'dark' => [
                        '#C9C9C9',
                        '#B8B8B8',
                        '#828282',
                        '#696969',
                        '#424242',
                        '#3B3B3B',
                        '#2E2E2E',
                        '#242424',
                        '#1F1F1F',
                        '#141414',
                    ],
                ],
                'components' => [
                    'Button' => [
                        'defaultProps' => [
                            'size' => 'md',
                        ],
                    ],
                    'TextInput' => [
                        'defaultProps' => [
                            'size' => 'md',
                        ],
                    ],
                    'Select' => [
                        'defaultProps' => [
                            'size' => 'md',
                        ],
                    ],
                    'Modal' => [
                        'defaultProps' => [
                            'radius' => 'md',
                            'shadow' => 'md',
                        ],
                    ],
                    'Paper' => [
                        'defaultProps' => [
                            'radius' => 'md',
                            'shadow' => 'md',
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('mantinelivewire::layouts.base');
    }
}
