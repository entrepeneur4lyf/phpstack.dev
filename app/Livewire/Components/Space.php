<?php

namespace App\Livewire\Components;

/**
 * Space component for adding whitespace between elements.
 *
 * The Space component is used to add horizontal or vertical whitespace between elements.
 * It's a utility component that helps maintain consistent spacing in layouts without
 * adding margins to components directly.
 *
 * @see https://mantine.dev/core/space/
 *
 * @example Basic vertical spacing
 * ```blade
 * <div>First element</div>
 * <x-mantine-space h="md" />
 * <div>Second element</div>
 * ```
 *
 * @example Horizontal spacing
 * ```blade
 * <div class="d-flex">
 *     <span>Left</span>
 *     <x-mantine-space w="xl" />
 *     <span>Right</span>
 * </div>
 * ```
 *
 * @example Responsive spacing
 * ```blade
 * <x-mantine-space :h="['base' => 'sm', 'md' => 'xl']" />
 * ```
 */
class Space extends MantineComponent
{
    /**
     * Create a new Space component instance.
     *
     * @param string|array|null $h Vertical spacing value from theme or responsive object
     * @param string|array|null $w Horizontal spacing value from theme or responsive object
     */
    public function __construct(
        public ?string $h = null,  // vertical spacing
        public ?string $w = null,  // horizontal spacing
    ) {
        parent::__construct();

        $this->props = [
            'h' => $h,
            'w' => $w,
        ];
    }
}
