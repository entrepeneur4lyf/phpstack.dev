<?php

namespace App\Livewire\Components;

class Icon extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string|int $size = '1rem',
        public float|int $stroke = 1.5,
        public ?string $color = null,
        public ?string $class = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        // Convert size to pixels if it's in rem
        $size = str_contains($this->size, 'rem') 
            ? (float) $this->size * 16 
            : $this->size;

        // Build attributes
        $attributes = $this->attributes->merge([
            'width' => $size,
            'height' => $size,
            'stroke-width' => $this->stroke,
            'class' => $this->class,
        ]);

        // Use blade-tabler-icons component
        return view('components.dynamic-component', [
            'component' => "tabler-{$this->name}",
            'attributes' => $attributes,
        ]);
    }
}
