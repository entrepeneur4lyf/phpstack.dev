<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleMultiSelect extends Component
{
    public $values = [];
    public $searchValue = '';
    public $dropdownOpened = false;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic multiselect -->
                <x-mantine-multi-select
                    label="Your favorite libraries"
                    placeholder="Pick values"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="values"
                />

                <!-- With search -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Pick values"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :searchable="true"
                        wire:model="values"
                        :search-value="$searchValue"
                        :on-search-change="fn($value) => $this->searchValue = $value"
                        nothing-found-message="Nothing found..."
                    />
                </div>

                <!-- With clearable -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Pick values"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :clearable="true"
                        wire:model="values"
                        :clear-button-props="['aria-label' => 'Clear selection']"
                    />
                </div>

                <!-- With max values -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Select up to 2 libraries"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :max-values="2"
                        wire:model="values"
                    />
                </div>

                <!-- With hide picked options -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Pick values"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :hide-picked-options="true"
                        wire:model="values"
                    />
                </div>

                <!-- With groups -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Pick values"
                        :data="[
                            ['group' => 'Frontend', 'items' => ['React', 'Angular']],
                            ['group' => 'Backend', 'items' => ['Express', 'Django']],
                        ]"
                        wire:model="values"
                    />
                </div>

                <!-- With custom filter -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="What countries have you visited?"
                        placeholder="Pick values"
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
                        wire:model="values"
                    />
                </div>

                <!-- With custom render option -->
                <div class="mt-4">
                    @php
                        $userData = [
                            'Emily Johnson' => [
                                'image' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-7.png',
                                'email' => 'emily92@gmail.com',
                            ],
                            'Ava Rodriguez' => [
                                'image' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-8.png',
                                'email' => 'ava_rose@gmail.com',
                            ],
                            // ... other user data
                        ];
                    @endphp

                    <x-mantine-multi-select
                        :data="['Emily Johnson', 'Ava Rodriguez']"
                        :render-option="function ($option) use ($userData) {
                            return '<x-mantine-group gap=\"sm\">
                                <x-mantine-avatar :src=\"' . $userData[$option]['image'] . '\" size=\"36\" radius=\"xl\" />
                                <div>
                                    <x-mantine-text size=\"sm\">' . $option . '</x-mantine-text>
                                    <x-mantine-text size=\"xs\" opacity=\"0.5\">' . $userData[$option]['email'] . '</x-mantine-text>
                                </div>
                            </x-mantine-group>';
                        }"
                        :max-dropdown-height="300"
                        label="Employees of the month"
                        placeholder="Search for employees"
                        wire:model="values"
                    />
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        wire:model="values"
                    />

                    <x-mantine-multi-select
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid selection"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        wire:model="values"
                        class="mt-4"
                    />
                </div>

                <!-- Disabled state -->
                <x-mantine-multi-select
                    label="Disabled"
                    placeholder="Disabled input"
                    :disabled="true"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="values"
                    class="mt-4"
                />

                <!-- With asterisk -->
                <x-mantine-multi-select
                    label="Required field"
                    placeholder="Required field"
                    :with-asterisk="true"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="values"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
