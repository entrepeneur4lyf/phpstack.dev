<?php

namespace App\Livewire\Components;

use App\Traits\WithColorScheme;

class ThemeDemo extends MantineComponent
{
    use WithColorScheme;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $lightHidden = false,
        public bool $darkHidden = false,
    ) {
        parent::__construct();
        
        $this->props = [
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
        return 'resources/MantineLiveWire/custom/react/components/ThemeDemo/index.js';
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return <<<'blade'
            <div>
                {{ parent() }}
            </div>
        blade;
    }
}
