<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTitle extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Different heading levels -->
                <div>
                    <x-mantine-title order="1">This is h1 title</x-mantine-title>
                    <x-mantine-title order="2">This is h2 title</x-mantine-title>
                    <x-mantine-title order="3">This is h3 title</x-mantine-title>
                    <x-mantine-title order="4">This is h4 title</x-mantine-title>
                    <x-mantine-title order="5">This is h5 title</x-mantine-title>
                    <x-mantine-title order="6">This is h6 title</x-mantine-title>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-title order="3" size="h1">
                        H3 heading with h1 font-size
                    </x-mantine-title>

                    <x-mantine-title size="h4">
                        H1 heading with h4 font-size
                    </x-mantine-title>

                    <x-mantine-title size="1rem">
                        H1 heading with 1rem size
                    </x-mantine-title>

                    <x-mantine-title size="xs">
                        H1 heading with xs size
                    </x-mantine-title>
                </div>

                <!-- Text wrap -->
                <div class="mt-8">
                    <x-mantine-title order="3" text-wrap="wrap">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi voluptatibus
                        inventore iusto cum dolore molestiae perspiciatis! Totam repudiandae impedit maxime!
                    </x-mantine-title>

                    <x-mantine-title order="3" text-wrap="balance" class="mt-4">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi voluptatibus
                        inventore iusto cum dolore molestiae perspiciatis! Totam repudiandae impedit maxime!
                    </x-mantine-title>
                </div>

                <!-- Line clamp -->
                <div class="mt-8">
                    <x-mantine-box maw="400">
                        <x-mantine-title order="2" :line-clamp="2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure doloremque
                            quas dolorum. Quo amet earum alias consequuntur quam accusamus a quae
                            beatae, odio, quod provident consectetur non repudiandae enim adipisci?
                        </x-mantine-title>
                    </x-mantine-box>
                </div>

                <!-- With other components -->
                <div class="mt-8">
                    <x-mantine-title order="3">
                        Title with
                        <x-mantine-text span c="blue" :inherit="true">
                            highlighted
                        </x-mantine-text>
                        text
                    </x-mantine-title>
                </div>
            </div>
        blade;
    }
}
