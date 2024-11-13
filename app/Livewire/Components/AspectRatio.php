<?php

namespace App\Livewire\Components;

/**
 * AspectRatio Component
 *
 * The AspectRatio component maintains a specified aspect ratio for its content. It's commonly
 * used for images, videos, maps, and other media that need to preserve specific dimensions.
 *
 * @link https://mantine.dev/core/aspect-ratio/
 *
 * @property float|int|null $ratio Aspect ratio value (width/height). For example, 16/9, 4/3, 1, etc.
 * @property string|null $maw Maximum width of the container (CSS max-width property)
 * @property string|null $mx Horizontal margin (CSS margin-left and margin-right properties)
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-aspect-ratio :ratio="16/9">
 *     <img src="image.jpg" alt="Image with 16:9 aspect ratio" />
 * </x-mantine-aspect-ratio>
 * ```
 *
 * @example With Max Width
 * ```blade
 * <x-mantine-aspect-ratio
 *     :ratio="4/3"
 *     maw="400px"
 *     mx="auto"
 * >
 *     <iframe src="https://www.youtube.com/embed/video-id"></iframe>
 * </x-mantine-aspect-ratio>
 * ```
 *
 * @example Square Ratio
 * ```blade
 * <x-mantine-aspect-ratio :ratio="1">
 *     <div class="bg-blue-500">
 *         Square content
 *     </div>
 * </x-mantine-aspect-ratio>
 * ```
 */
class AspectRatio extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param float|int|null $ratio Aspect ratio value (width/height)
     * @param string|null $maw Maximum width of the container
     * @param string|null $mx Horizontal margin
     */
    public function __construct(
        public float|int|null $ratio = null,
        public ?string $maw = null,  // max-width
        public ?string $mx = null,   // margin-x
    ) {
        parent::__construct();

        $this->props = [
            'ratio' => $ratio,
            'maw' => $maw,
            'mx' => $mx,
        ];
    }
}
