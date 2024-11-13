<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTagsInput extends Component
{
    public $value = [];
    public $searchValue = '';
    public $dropdownOpened = false;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-tags-input
                    label="Press Enter to submit a tag"
                    placeholder="Enter tag"
                    wire:model="value"
                />

                <!-- With clearable -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Press Enter to submit a tag"
                        placeholder="Enter tag"
                        :clearable="true"
                        wire:model="value"
                        :clear-button-props="['aria-label' => 'Clear tags']"
                    />
                </div>

                <!-- With max tags -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Press Enter to submit a tag"
                        description="Add up to 3 tags"
                        placeholder="Enter tag"
                        :max-tags="3"
                        wire:model="value"
                    />
                </div>

                <!-- Accept value on blur -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Value IS accepted on blur"
                        placeholder="Enter text, then blur the field"
                        :data="['React', 'Angular', 'Svelte']"
                        :accept-value-on-blur="true"
                        wire:model="value"
                    />

                    <x-mantine-tags-input
                        label="Value IS NOT accepted on blur"
                        placeholder="Enter text, then blur the field"
                        :data="['React', 'Angular', 'Svelte']"
                        :accept-value-on-blur="false"
                        wire:model="value"
                        class="mt-4"
                    />
                </div>

                <!-- Allow duplicates -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Press Enter to submit a tag"
                        placeholder="Duplicates are allowed"
                        :allow-duplicates="true"
                        wire:model="value"
                    />
                </div>

                <!-- Split chars -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Press Enter to submit a tag"
                        placeholder="Enter tag"
                        :split-chars="[',', ' ', '|']"
                        wire:model="value"
                    />
                </div>

                <!-- With suggestions -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Press Enter to submit a tag"
                        placeholder="Pick tag from list"
                        :data="['React', 'Angular', 'Svelte']"
                        wire:model="value"
                    />
                </div>

                <!-- With custom filter -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="What countries have you visited?"
                        placeholder="Pick value or enter anything"
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
                        wire:model="value"
                    />
                </div>

                <!-- With custom render option -->
                <div class="mt-4">
                    @php
                        $groceryData = [
                            'Apples' => [
                                'emoji' => '🍎',
                                'description' => 'Crisp and juicy snacking delight',
                            ],
                            'Bread' => [
                                'emoji' => '🍞',
                                'description' => 'Freshly baked daily essential',
                            ],
                            'Bananas' => [
                                'emoji' => '🍌',
                                'description' => 'Perfect for a healthy breakfast',
                            ],
                        ];
                    @endphp

                    <x-mantine-tags-input
                        label="Groceries"
                        placeholder="Pick tag from list or type to add new"
                        :data="array_keys($groceryData)"
                        :render-option="function ($option) use ($groceryData) {
                            return '<x-mantine-group>
                                <span style=\"font-size: 24px\">' . $groceryData[$option]['emoji'] . '</span>
                                <div>
                                    <div>' . $option . '</div>
                                    <div style=\"font-size: 12px; opacity: 0.5\">' . $groceryData[$option]['description'] . '</div>
                                </div>
                            </x-mantine-group>';
                        }"
                        :max-dropdown-height="300"
                        wire:model="value"
                    />
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-tags-input
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                        wire:model="value"
                    />

                    <x-mantine-tags-input
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid tags"
                        wire:model="value"
                        class="mt-4"
                    />
                </div>

                <!-- Disabled state -->
                <x-mantine-tags-input
                    label="Disabled"
                    placeholder="Enter tag"
                    :disabled="true"
                    wire:model="value"
                    class="mt-4"
                />

                <!-- With asterisk -->
                <x-mantine-tags-input
                    label="Required field"
                    placeholder="Required field"
                    :with-asterisk="true"
                    wire:model="value"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
