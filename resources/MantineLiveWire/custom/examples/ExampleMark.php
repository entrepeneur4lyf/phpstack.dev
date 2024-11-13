<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleMark extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-text>
                        Highlight <x-mantine-mark>this chunk</x-mantine-mark> of the text
                    </x-mantine-text>
                </div>

                <!-- With different colors -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-text>
                            This is a <x-mantine-mark color="red.4">red highlight</x-mantine-mark> in the text
                        </x-mantine-text>

                        <x-mantine-text>
                            This is a <x-mantine-mark color="blue.4">blue highlight</x-mantine-mark> in the text
                        </x-mantine-text>

                        <x-mantine-text>
                            This is a <x-mantine-mark color="green.4">green highlight</x-mantine-mark> in the text
                        </x-mantine-text>

                        <x-mantine-text>
                            This is a <x-mantine-mark color="yellow.4">yellow highlight</x-mantine-mark> in the text
                        </x-mantine-text>
                    </x-mantine-stack>
                </div>

                <!-- Multiple marks in text -->
                <div class="mt-8">
                    <x-mantine-text>
                        This text has <x-mantine-mark color="blue.4">multiple</x-mantine-mark> 
                        <x-mantine-mark color="red.4">highlighted</x-mantine-mark> 
                        <x-mantine-mark color="green.4">words</x-mantine-mark> in it
                    </x-mantine-text>
                </div>

                <!-- With custom styles -->
                <div class="mt-8">
                    <x-mantine-text>
                        <x-mantine-mark
                            :styles="[
                                'background' => 'linear-gradient(45deg, var(--mantine-color-pink-5), var(--mantine-color-violet-5))',
                                'color' => 'white',
                            ]"
                        >
                            Custom styled highlight
                        </x-mantine-mark>
                    </x-mantine-text>
                </div>

                <!-- Inside other components -->
                <div class="mt-8">
                    <x-mantine-title order="2">
                        This title has a <x-mantine-mark color="cyan.4">highlighted</x-mantine-mark> word
                    </x-mantine-title>

                    <x-mantine-blockquote
                        cite="– Famous quote"
                        :icon="'<i class=\"fas fa-quote-right\"></i>'"
                    >
                        This blockquote has a <x-mantine-mark color="grape.4">highlighted</x-mantine-mark> word
                    </x-mantine-blockquote>

                    <x-mantine-list>
                        <x-mantine-list-item>
                            This list item has a <x-mantine-mark color="orange.4">highlighted</x-mantine-mark> word
                        </x-mantine-list-item>
                    </x-mantine-list>
                </div>
            </div>
        blade;
    }
}
