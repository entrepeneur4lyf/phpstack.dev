<?php

namespace App\Livewire\Components\Scripts;

use Illuminate\View\Component;

class ColorSchemeScript extends Component
{
    public function render()
    {
        return <<<'blade'
<script>
    // Check if user prefers dark mode
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Get stored color scheme or use system preference
    const colorScheme = localStorage.getItem('mantine-color-scheme') || (prefersDark ? 'dark' : 'light');
    
    // Apply color scheme
    document.documentElement.setAttribute('data-mantine-color-scheme', colorScheme);
</script>
blade;
    }
}
