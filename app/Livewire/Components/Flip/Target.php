<?php

namespace App\Livewire\Components\Flip;

use App\Livewire\Components\MantineComponent;

/**
 * Flip.Target component - A trigger element that controls the flip state.
 *
 * The Target component is used within a Flip component to create elements that
 * trigger the flip animation when clicked. It automatically handles the flip state
 * for uncontrolled Flip components.
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-flip.target>
 *     <x-mantine-button>Flip Card</x-mantine-button>
 * </x-mantine-flip.target>
 * ```
 */
class Target extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {}
}
