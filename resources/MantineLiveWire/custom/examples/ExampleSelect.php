<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleSelect extends Component
{
    public $value = '';
    public $searchValue = '';
    public $dropdownOpened = false;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-select
                    label="Your favorite library"
                    placeholder="Pick value"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="value"
                />

                <!-- With clearable -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Your favorite library"
                        placeholder="Pick value"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :clearable="true"
                        wire:model="value"
                        :clear-button-props="['aria-label' => 'Clear selection']"
                    />
                </div>

                <!-- With allow deselect -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Option can NOT be deselected"
                        placeholder="Pick value"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :allow-deselect="false"
                        wire:model="value"
                    />

                    <x-mantine-select
                        label="Option can be deselected"
                        description="This is default behavior, click selected option to deselect"
                        placeholder="Pick value"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :allow-deselect="true"
                        wire:model="value"
                        class="mt-4"
                    />
                </div>

                <!-- With search -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Your favorite library"
                        placeholder="Pick value"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :searchable="true"
                        wire:model="value"
                        :search-value="$searchValue"
                        :on-search-change="fn($value) => $this->searchValue = $value"
                        nothing-found-message="Nothing found..."
                    />
                </div>

                <!-- With custom filter -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Your country"
                        placeholder="Pick value"
                        :data="['Great Britain', 'Russian Federation', 'United States']"
                        :filter="function ($options, $search) {
                            $splittedSearch = strtolower(trim($search));
                            return array_filter($options, function ($option) use ($splittedSearch) {
                                $words = explode(' ', strtolower(trim($option)));
                                return array_reduce(explode(' ', $splittedSearch), function ($carry, $searchWord) use ($words) {
                                    return $carry && array_reduce($words, function ($found, $word) use ($searchWord) {
                                        return $found || str_contains($word, $searchWord);
                                    }, false);
                                }, true);
                            });
                        }"
                        :searchable="true"
                        wire:model="value"
                    />
                </div>

                <!-- With groups -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Your favorite library"
                        placeholder="Pick value"
                        :data="[
                            ['group' => 'Frontend', 'items' => ['React', 'Angular']],
                            ['group' => 'Backend', 'items' => ['Express', 'Django']],
                        ]"
                        wire:model="value"
                    />
                </div>

                <!-- With disabled options -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Your favorite library"
                        placeholder="Pick value"
                        :data="[
                            ['value' => 'react', 'label' => 'React'],
                            ['value' => 'ng', 'label' => 'Angular'],
                            ['value' => 'vue', 'label' => 'Vue', 'disabled' => true],
                            ['value' => 'svelte', 'label' => 'Svelte', 'disabled' => true],
                        ]"
                        wire:model="value"
                    />
                </div>

                <!-- With custom render option -->
                <div class="mt-4">
                    @php
                        $icons = [
                            'left' => '<i class="fas fa-align-left"></i>',
                            'center' => '<i class="fas fa-align-center"></i>',
                            'right' => '<i class="fas fa-align-right"></i>',
                            'justify' => '<i class="fas fa-align-justify"></i>',
                        ];
                    @endphp

                    <x-mantine-select
                        label="Select with renderOption"
                        placeholder="Select text align"
                        :data="[
                            ['value' => 'left', 'label' => 'Left'],
                            ['value' => 'center', 'label' => 'Center'],
                            ['value' => 'right', 'label' => 'Right'],
                            ['value' => 'justify', 'label' => 'Justify'],
                        ]"
                        :render-option="function ($option, $checked) use ($icons) {
                            return '<x-mantine-group flex=\"1\" gap=\"xs\">
                                ' . $icons[$option['value']] . '
                                ' . $option['label'] . '
                                ' . ($checked ? '<i class=\"fas fa-check ms-auto\"></i>' : '') . '
                            </x-mantine-group>';
                        }"
                        wire:model="value"
                    />
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-select
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        wire:model="value"
                    />

                    <x-mantine-select
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid selection"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        wire:model="value"
                        class="mt-4"
                    />
                </div>

                <!-- Disabled state -->
                <x-mantine-select
                    label="Disabled"
                    placeholder="Disabled input"
                    :disabled="true"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="value"
                    class="mt-4"
                />

                <!-- With asterisk -->
                <x-mantine-select
                    label="Required field"
                    placeholder="Required field"
                    :with-asterisk="true"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="value"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
