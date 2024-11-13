<?php

namespace App\View\Components;

use App\Traits\WithMantineTheme;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    use WithMantineTheme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = null,
        public ?string $size = 'sm',
        public ?string $padding = 'md'
    ) {}

    /**
     * Get the layout configuration.
     */
    public function layoutConfig(): array
    {
        return $this->baseLayoutConfig();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest', [
            'title' => $this->title ?? config('app.name'),
            'size' => $this->size,
            'themeConfig' => $this->themeConfig(),
            'layoutConfig' => $this->layoutConfig(),
        ]);
    }
}
