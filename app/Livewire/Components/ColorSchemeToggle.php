<?php

namespace App\Livewire\Components;

use App\Traits\WithColorScheme;

class ColorSchemeToggle extends MantineComponent
{
    use WithColorScheme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $size = 'md',
        public ?string $variant = 'subtle',
        public bool $lightHidden = false,
        public bool $darkHidden = false,
    ) {
        parent::__construct();
        
        $this->props = [
            'size' => $size,
            'variant' => $variant,
            'lightHidden' => $lightHidden,
            'darkHidden' => $darkHidden,
        ];
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->initializeWithColorScheme();
    }

    /**
     * Toggle between light, dark, and auto modes.
     */
    public function cycleColorScheme(): void
    {
        $currentScheme = $this->getCurrentColorScheme();
        
        // Cycle through modes: light -> dark -> auto -> light
        $newScheme = match($currentScheme) {
            'light' => 'dark',
            'dark' => 'auto',
            'auto' => 'light',
            default => 'light'
        };

        $this->setColorScheme($newScheme);
    }

    /**
     * Get the data to be passed to the React component.
     */
    public function mingleData(): array
    {
        return array_merge(parent::mingleData(), [
            'colorScheme' => $this->getCurrentColorScheme(),
            'config' => $this->getColorSchemeConfig(),
        ]);
    }

    /**
     * Get the path to the React component.
     */
    public function component(): string
    {
        return 'resources/MantineLiveWire/custom/react/components/ColorSchemeToggle/index.js';
    }
}
