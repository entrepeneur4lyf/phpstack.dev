<?php

namespace App\View\Components;

use App\Traits\WithMantineTheme;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    use WithMantineTheme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = null,
        public bool $withNavbar = true,
        public bool $withFooter = true,
        public ?string $size = 'xl',
        public ?string $padding = 'md'
    ) {}

    /**
     * Get the layout configuration.
     */
    public function layoutConfig(): array
    {
        return array_merge($this->baseLayoutConfig(), [
            'navbar' => [
                'height' => 60,
                'width' => [
                    'base' => 300,
                    'sm' => 0,
                    'lg' => 300,
                ],
                'breakpoint' => 'sm',
            ],
        ]);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app', [
            'title' => $this->title ?? config('app.name'),
            'withNavbar' => $this->withNavbar,
            'withFooter' => $this->withFooter,
            'size' => $this->size,
            'themeConfig' => $this->themeConfig(),
            'layoutConfig' => $this->layoutConfig(),
        ]);
    }
}
