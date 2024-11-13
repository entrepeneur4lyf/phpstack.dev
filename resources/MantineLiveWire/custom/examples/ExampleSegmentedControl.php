<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSegmentedControl extends Component
{
    public $value = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-segmented-control
                    :data="['React', 'Angular', 'Vue']"
                    wire:model="value"
                />

                <!-- With object data -->
                <x-mantine-segmented-control
                    :data="[
                        ['label' => 'React', 'value' => 'react'],
                        ['label' => 'Angular', 'value' => 'ng'],
                        ['label' => 'Vue', 'value' => 'vue'],
                        ['label' => 'Svelte', 'value' => 'svelte'],
                    ]"
                    class="mt-4"
                />

                <!-- With disabled options -->
                <div class="mt-4">
                    <x-mantine-stack align="center">
                        <div>
                            <x-mantine-text size="sm" fw="500" mb="3">Disabled control</x-mantine-text>
                            <x-mantine-segmented-control
                                :disabled="true"
                                :data="[
                                    ['value' => 'preview', 'label' => 'Preview'],
                                    ['value' => 'code', 'label' => 'Code'],
                                    ['value' => 'export', 'label' => 'Export'],
                                ]"
                            />
                        </div>

                        <div>
                            <x-mantine-text size="sm" fw="500" mb="3">Disabled option</x-mantine-text>
                            <x-mantine-segmented-control
                                :data="[
                                    ['value' => 'preview', 'label' => 'Preview', 'disabled' => true],
                                    ['value' => 'code', 'label' => 'Code'],
                                    ['value' => 'export', 'label' => 'Export'],
                                ]"
                            />
                        </div>
                    </x-mantine-stack>
                </div>

                <!-- With React nodes as labels -->
                <x-mantine-segmented-control
                    :data="[
                        [
                            'value' => 'preview',
                            'label' => '<x-mantine-center style=\"gap: 10px\">
                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z\"/></svg>
                                <span>Preview</span>
                            </x-mantine-center>'
                        ],
                        [
                            'value' => 'code',
                            'label' => '<x-mantine-center style=\"gap: 10px\">
                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z\"/></svg>
                                <span>Code</span>
                            </x-mantine-center>'
                        ],
                        [
                            'value' => 'export',
                            'label' => '<x-mantine-center style=\"gap: 10px\">
                                <svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z\"/></svg>
                                <span>Export</span>
                            </x-mantine-center>'
                        ],
                    ]"
                    class="mt-4"
                />

                <!-- Different orientations -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-segmented-control
                            orientation="horizontal"
                            :data="['React', 'Angular', 'Vue']"
                        />
                        <x-mantine-segmented-control
                            orientation="vertical"
                            :data="['React', 'Angular', 'Vue']"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Full width -->
                <x-mantine-segmented-control
                    :full-width="true"
                    :data="['React', 'Angular', 'Vue']"
                    class="mt-4"
                />

                <!-- With transitions -->
                <div class="mt-4">
                    <x-mantine-text size="sm" fw="500" mt="3">No transitions</x-mantine-text>
                    <x-mantine-segmented-control
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :transition-duration="0"
                    />

                    <x-mantine-text size="sm" fw="500" mt="md">500ms linear transition</x-mantine-text>
                    <x-mantine-segmented-control
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :transition-duration="500"
                        transition-timing-function="linear"
                    />
                </div>

                <!-- Read only -->
                <x-mantine-segmented-control
                    :read-only="true"
                    :default-value="'Angular'"
                    :data="['React', 'Angular', 'Vue']"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
