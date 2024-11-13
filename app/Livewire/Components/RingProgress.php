<?php

namespace App\Livewire\Components;

/**
 * RingProgress component for displaying progress in a circular format.
 *
 * The RingProgress component creates a circular progress indicator that can display
 * multiple sections with different colors and values. It's useful for showing progress,
 * completion rates, or proportional data in a circular format.
 *
 * @see https://mantine.dev/core/ring-progress/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-ring-progress
 *     :sections="[
 *         ['value' => 40, 'color' => 'cyan'],
 *         ['value' => 20, 'color' => 'orange'],
 *         ['value' => 15, 'color' => 'grape']
 *     ]"
 * />
 * ```
 *
 * @example With label and custom size
 * ```blade
 * <x-mantine-ring-progress
 *     :size="120"
 *     :thickness="12"
 *     :sections="[['value' => 75, 'color' => 'blue']]"
 *     :label="view('components.progress-label')"
 * />
 * ```
 *
 * @example Customized appearance
 * ```blade
 * <x-mantine-ring-progress
 *     :sections="[['value' => 60, 'color' => 'teal']]"
 *     :round-caps="true"
 *     root-color="gray.4"
 *     :size="150"
 * />
 * ```
 */
class RingProgress extends MantineComponent
{
    /**
     * Create a new RingProgress component instance.
     *
     * @param array|null $sections Array of progress sections with value and color
     * @param mixed $label Content to render inside the ring
     * @param int|null $size Overall size of the progress ring in pixels
     * @param int|null $thickness Thickness of the progress ring line
     * @param bool|null $roundCaps Whether to round the line caps
     * @param string|null $rootColor Color of the unfilled part of the ring
     * @param array|null $classNames Custom class names for ring elements
     * @param array|null $styles Custom styles for ring elements
     */
    public function __construct(
        public mixed $sections = null,
        public mixed $label = null,
        public mixed $size = null,
        public mixed $thickness = null,
        public mixed $roundCaps = null,
        public mixed $rootColor = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'sections' => $sections,
            'label' => $label,
            'size' => $size,
            'thickness' => $thickness,
            'roundCaps' => $roundCaps,
            'rootColor' => $rootColor,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
