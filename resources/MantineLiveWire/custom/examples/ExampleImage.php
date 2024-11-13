<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleImage extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-image
                        radius="md"
                        src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                        alt="Random image"
                    />
                </div>

                <!-- With fixed height -->
                <div class="mt-8">
                    <x-mantine-image
                        radius="md"
                        height="200"
                        src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-10.png"
                        alt="Random image"
                    />
                </div>

                <!-- With contain fit -->
                <div class="mt-8">
                    <x-mantine-image
                        radius="md"
                        height="200"
                        width="auto"
                        fit="contain"
                        src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-9.png"
                        alt="Random image"
                    />
                </div>

                <!-- With fallback image -->
                <div class="mt-8">
                    <x-mantine-image
                        radius="md"
                        height="200"
                        :src="null"
                        fallback-src="https://placehold.co/600x400?text=Placeholder"
                        alt="Fallback image"
                    />
                </div>

                <!-- With different radius -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-image
                            radius="xs"
                            height="100"
                            width="100"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="XS radius"
                        />
                        <x-mantine-image
                            radius="sm"
                            height="100"
                            width="100"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="SM radius"
                        />
                        <x-mantine-image
                            radius="md"
                            height="100"
                            width="100"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="MD radius"
                        />
                        <x-mantine-image
                            radius="lg"
                            height="100"
                            width="100"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="LG radius"
                        />
                        <x-mantine-image
                            radius="xl"
                            height="100"
                            width="100"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                            alt="XL radius"
                        />
                    </x-mantine-group>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-image
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        radius="md"
                        height="200"
                        src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/images/bg-7.png"
                        alt="Click me"
                    />
                </div>
            </div>
        blade;
    }
}
