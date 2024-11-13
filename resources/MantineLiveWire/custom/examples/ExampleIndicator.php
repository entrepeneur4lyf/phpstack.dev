<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleIndicator extends Component
{
    public $visible = true;

    public function toggleIndicator()
    {
        $this->visible = !$this->visible;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-indicator>
                        <x-mantine-avatar
                            size="lg"
                            radius="sm"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-1.png"
                        />
                    </x-mantine-indicator>
                </div>

                <!-- With label -->
                <div class="mt-8">
                    <x-mantine-indicator inline label="New" size="16">
                        <x-mantine-avatar
                            size="lg"
                            radius="sm"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-2.png"
                        />
                    </x-mantine-indicator>
                </div>

                <!-- With offset and border -->
                <div class="mt-8">
                    <x-mantine-indicator
                        inline
                        size="16"
                        :offset="7"
                        position="bottom-end"
                        color="red"
                        :with-border="true"
                    >
                        <x-mantine-avatar
                            size="lg"
                            radius="xl"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-3.png"
                        />
                    </x-mantine-indicator>
                </div>

                <!-- With processing animation -->
                <div class="mt-8">
                    <x-mantine-indicator inline :processing="true" color="red" size="12">
                        <x-mantine-avatar
                            size="lg"
                            radius="sm"
                            src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-4.png"
                        />
                    </x-mantine-indicator>
                </div>

                <!-- With disabled state -->
                <div class="mt-8">
                    <x-mantine-stack align="center">
                        <x-mantine-indicator
                            inline
                            :disabled="!$visible"
                            color="red"
                            size="12"
                        >
                            <x-mantine-avatar
                                size="lg"
                                radius="sm"
                                src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-5.png"
                            />
                        </x-mantine-indicator>

                        <x-mantine-button :on-click="fn() => $this->toggleIndicator()">
                            Toggle indicator
                        </x-mantine-button>
                    </x-mantine-stack>
                </div>

                <!-- Different positions -->
                <div class="mt-8">
                    <x-mantine-group>
                        @foreach(['top-start', 'top-center', 'top-end', 'middle-start', 'middle-center', 'middle-end', 'bottom-start', 'bottom-center', 'bottom-end'] as $position)
                            <x-mantine-indicator
                                inline
                                position="{{ $position }}"
                                color="blue"
                                size="12"
                            >
                                <x-mantine-avatar
                                    size="lg"
                                    radius="sm"
                                    src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-1.png"
                                />
                            </x-mantine-indicator>
                        @endforeach
                    </x-mantine-group>
                </div>

                <!-- Different sizes and radius -->
                <div class="mt-8">
                    <x-mantine-group>
                        @foreach(['xs', 'sm', 'md', 'lg', 'xl'] as $size)
                            <x-mantine-indicator
                                inline
                                size="{{ $size }}"
                                radius="{{ $size }}"
                                color="grape"
                            >
                                <x-mantine-avatar
                                    size="lg"
                                    radius="sm"
                                    src="https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-1.png"
                                />
                            </x-mantine-indicator>
                        @endforeach
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
