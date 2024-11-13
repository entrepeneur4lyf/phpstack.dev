<?php

namespace App\Livewire\Components\Scripts;

use Illuminate\View\Component;
use App\Support\ColorSchemeManager;

class ColorSchemeScript extends Component
{
    protected ColorSchemeManager $manager;

    public function __construct()
    {
        $this->manager = new ColorSchemeManager();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return $this->manager->getInitScript();
    }
}
