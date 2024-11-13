<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSkeleton extends Component
{
    public $loading = true;

    public function toggleLoading()
    {
        $this->loading = !$this->loading;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-skeleton :height="50" :circle="true" mb="xl" />
                    <x-mantine-skeleton height="8" radius="xl" />
                    <x-mantine-skeleton height="8" mt="6" radius="xl" />
                    <x-mantine-skeleton height="8" mt="6" width="70%" radius="xl" />
                </div>

                <!-- With content -->
                <div class="mt-8">
                    <x-mantine-skeleton :visible="$loading">
                        <div class="space-y-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi dolor nihil 
                                amet tempore magnam optio, numquam nostrum inventore tempora assumenda 
                                saepe, aut repellat. Temporibus aspernatur aperiam magnam debitis facere odio?
                            </p>
                            <p>
                                Laborum fuga quam voluptas aut pariatur delectus repudiandae commodi tempora 
                                debitis dolores vero cumque magni cum, deserunt, ad tempore consectetur 
                                libero molestias similique nemo eum! Dolore maxime voluptate inventore atque.
                            </p>
                        </div>
                    </x-mantine-skeleton>

                    <x-mantine-button
                        :on-click="fn() => $this->toggleLoading()"
                        class="mt-4"
                    >
                        Toggle Skeleton
                    </x-mantine-button>
                </div>

                <!-- Different shapes -->
                <div class="mt-8">
                    <x-mantine-group>
                        <!-- Circle -->
                        <x-mantine-skeleton :height="50" :circle="true" />
                        
                        <!-- Rectangle -->
                        <x-mantine-skeleton :height="50" :width="100" />
                        
                        <!-- Rounded -->
                        <x-mantine-skeleton :height="50" :width="100" radius="md" />
                    </x-mantine-group>
                </div>

                <!-- Without animation -->
                <div class="mt-8">
                    <x-mantine-skeleton :height="50" :animate="false" />
                </div>

                <!-- Loading card example -->
                <div class="mt-8">
                    <x-mantine-paper p="md" radius="md">
                        <div class="flex items-center space-x-4">
                            <x-mantine-skeleton :height="50" :circle="true" />
                            <div class="flex-1">
                                <x-mantine-skeleton height="20" radius="md" mb="xs" />
                                <x-mantine-skeleton height="14" radius="md" width="70%" />
                            </div>
                        </div>
                    </x-mantine-paper>
                </div>

                <!-- Loading article example -->
                <div class="mt-8">
                    <x-mantine-skeleton height="200" radius="md" mb="md" />
                    <x-mantine-skeleton height="24" radius="md" mb="md" />
                    <x-mantine-skeleton height="14" radius="md" mb="xs" />
                    <x-mantine-skeleton height="14" radius="md" mb="xs" />
                    <x-mantine-skeleton height="14" radius="md" width="80%" />
                </div>
            </div>
        blade;
    }
}
