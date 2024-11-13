<?php

namespace App\Livewire\Components;

/**
 * Kbd Component
 *
 * The Kbd component is used to display keyboard shortcuts or key combinations.
 * It provides styling to make the text appear as a keyboard key.
 *
 * @link https://mantine.dev/core/kbd/
 *
 * @property mixed $size Size of the keyboard key ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $classNames Custom class names for the component
 * @property mixed $styles Custom styles for the component
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-kbd>Ctrl + C</x-mantine-kbd>
 * ```
 *
 * @example With Custom Size
 * ```blade
 * <x-mantine-kbd size="lg">Ctrl + V</x-mantine-kbd>
 * ```
 */
class Kbd extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $size Size of the keyboard key
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $size = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
