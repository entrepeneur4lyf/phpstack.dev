<?php

namespace App\Livewire\Components;

/**
 * Flip component - A component that flips its content when triggered.
 *
 * The Flip component provides an animated card-flip effect between two content faces.
 * It can be used to create interactive cards, forms with multiple states, or reveal additional information.
 *
 * @see https://gfazioli.github.io/mantine-flip/
 *
 * @example Basic usage with front and back content
 * ```blade
 * <x-mantine-flip h={200} w={400}>
 *     <x-mantine-paper radius="md" withBorder p="lg">
 *         <h3>Front Content</h3>
 *         <x-mantine-flip.target>
 *             <x-mantine-button>Show Back</x-mantine-button>
 *         </x-mantine-flip.target>
 *     </x-mantine-paper>
 *     
 *     <x-mantine-paper radius="md" withBorder p="lg">
 *         <h3>Back Content</h3>
 *         <x-mantine-flip.target>
 *             <x-mantine-button>Show Front</x-mantine-button>
 *         </x-mantine-flip.target>
 *     </x-mantine-paper>
 * </x-mantine-flip>
 * ```
 *
 * @example Controlled flip state
 * ```blade
 * <x-mantine-flip h={200} w={400} :flipped="$isFlipped">
 *     <x-mantine-paper>Front content</x-mantine-paper>
 *     <x-mantine-paper>Back content</x-mantine-paper>
 * </x-mantine-flip>
 * ```
 *
 * @example With default flipped state
 * ```blade
 * <x-mantine-flip h={200} w={400} :default-flipped="true">
 *     <x-mantine-paper>Front content</x-mantine-paper>
 *     <x-mantine-paper>Back content</x-mantine-paper>
 * </x-mantine-flip>
 * ```
 *
 * @param mixed $h Height of the flip container
 * @param mixed $w Width of the flip container
 * @param mixed $flipped Controlled flip state (true shows back, false shows front)
 * @param mixed $defaultFlipped Initial flip state for uncontrolled component
 * @param mixed $direction Flip direction ('horizontal' or 'vertical')
 * @param mixed $directionFlipIn Direction for flip in animation ('positive' or 'negative')
 * @param mixed $directionFlipOut Direction for flip out animation ('positive' or 'negative')
 * @param mixed $easing Animation easing ('ease', 'ease-in', 'ease-out', 'ease-in-out', 'linear')
 * @param mixed $perspective Perspective value for 3D effect
 * @param mixed $duration Animation duration in milliseconds
 */
class Flip extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $h = null,
        public mixed $w = null,
        public mixed $flipped = null,
        public mixed $defaultFlipped = null,
        public mixed $direction = null,
        public mixed $directionFlipIn = null,
        public mixed $directionFlipOut = null,
        public mixed $easing = null,
        public mixed $perspective = null,
        public mixed $duration = null
    ) {}
}
