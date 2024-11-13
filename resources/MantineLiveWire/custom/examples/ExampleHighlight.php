<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleHighlight extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-highlight highlight="this">
                        Highlight This, definitely THIS and also this!
                    </x-mantine-highlight>
                </div>

                <!-- Multiple highlights -->
                <div class="mt-8">
                    <x-mantine-highlight :highlight="['this', 'that']">
                        Highlight this and also that
                    </x-mantine-highlight>
                </div>

                <!-- With custom highlight styles -->
                <div class="mt-8">
                    <x-mantine-highlight
                        ta="center"
                        :highlight="['highlighted', 'default']"
                        :highlight-styles="[
                            'backgroundImage' => 'linear-gradient(45deg, var(--mantine-color-cyan-5), var(--mantine-color-indigo-5))',
                            'fontWeight' => 700,
                            'WebkitBackgroundClip' => 'text',
                            'WebkitTextFillColor' => 'transparent',
                        ]"
                    >
                        You can change styles of highlighted part if you do not like default styles
                    </x-mantine-highlight>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-highlight
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        highlight="mantine"
                        fw="500"
                        c="var(--mantine-color-anchor)"
                    >
                        Mantine website
                    </x-mantine-highlight>
                </div>

                <!-- With different colors -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-highlight highlight="important" color="red">
                            This is an important message!
                        </x-mantine-highlight>

                        <x-mantine-highlight highlight="success" color="green">
                            This operation was a success!
                        </x-mantine-highlight>

                        <x-mantine-highlight highlight="warning" color="yellow">
                            This is a warning message!
                        </x-mantine-highlight>

                        <x-mantine-highlight highlight="info" color="blue">
                            This is an info message!
                        </x-mantine-highlight>
                    </x-mantine-stack>
                </div>

                <!-- With multiple words in different colors -->
                <div class="mt-8">
                    <x-mantine-highlight
                        :highlight="['first', 'second', 'third']"
                        :highlight-styles="[
                            'first' => ['color' => 'var(--mantine-color-red-6)'],
                            'second' => ['color' => 'var(--mantine-color-blue-6)'],
                            'third' => ['color' => 'var(--mantine-color-green-6)'],
                        ]"
                    >
                        This is the first word, followed by the second word, and ending with the third word.
                    </x-mantine-highlight>
                </div>

                <!-- With gradient background -->
                <div class="mt-8">
                    <x-mantine-highlight
                        highlight="gradient"
                        :highlight-styles="[
                            'background' => 'linear-gradient(45deg, var(--mantine-color-pink-5), var(--mantine-color-violet-5))',
                            'padding' => '0 5px',
                            'borderRadius' => '4px',
                            'color' => 'white',
                        ]"
                    >
                        This text has a gradient highlight effect!
                    </x-mantine-highlight>
                </div>
            </div>
        blade;
    }
}
