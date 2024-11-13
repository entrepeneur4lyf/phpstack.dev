<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePillsInput extends Component
{
    public $search = '';
    public $value = [];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-pills-input label="PillsInput">
                    <x-mantine-pill-group>
                        <x-mantine-pill>React</x-mantine-pill>
                        <x-mantine-pill>Vue</x-mantine-pill>
                        <x-mantine-pill>Svelte</x-mantine-pill>
                        <x-mantine-pills-input-field placeholder="Enter tags" />
                    </x-mantine-pill-group>
                </x-mantine-pills-input>

                <!-- With input props -->
                <div class="mt-4">
                    <x-mantine-pills-input
                        label="Input label"
                        description="Input description"
                        :with-asterisk="true"
                    >
                        <x-mantine-pill-group>
                            <x-mantine-pill>React</x-mantine-pill>
                            <x-mantine-pill>Vue</x-mantine-pill>
                            <x-mantine-pill>Svelte</x-mantine-pill>
                            <x-mantine-pills-input-field placeholder="Enter tags" />
                        </x-mantine-pill-group>
                    </x-mantine-pills-input>
                </div>

                <!-- Searchable select example -->
                <div class="mt-4">
                    @php
                        $groceries = ['🍎 Apples', '🍌 Bananas', '🥦 Broccoli', '🥕 Carrots', '🍫 Chocolate'];
                    @endphp

                    <x-mantine-combobox
                        :store="[
                            'onDropdownClose' => fn() => $this->resetSelectedOption(),
                            'onDropdownOpen' => fn() => $this->updateSelectedOptionIndex('active'),
                        ]"
                        :on-option-submit="fn($val) => $this->handleValueSelect($val)"
                    >
                        <x-mantine-combobox-dropdown-target>
                            <x-mantine-pills-input
                                :on-click="fn() => $this->openDropdown()"
                            >
                                <x-mantine-pill-group>
                                    @foreach($value as $item)
                                        <x-mantine-pill
                                            :with-remove-button="true"
                                            :on-remove="fn() => $this->handleValueRemove($item)"
                                        >
                                            {{ $item }}
                                        </x-mantine-pill>
                                    @endforeach

                                    <x-mantine-combobox-events-target>
                                        <x-mantine-pills-input-field
                                            :on-focus="fn() => $this->openDropdown()"
                                            :on-blur="fn() => $this->closeDropdown()"
                                            wire:model="search"
                                            placeholder="Search values"
                                            :on-key-down="fn($key) => $key === 'Backspace' && empty($search) ? $this->handleValueRemove(end($value)) : null"
                                        />
                                    </x-mantine-combobox-events-target>
                                </x-mantine-pill-group>
                            </x-mantine-pills-input>
                        </x-mantine-combobox-dropdown-target>

                        <x-mantine-combobox-dropdown>
                            <x-mantine-combobox-options>
                                @php
                                    $filteredOptions = array_filter($groceries, fn($item) => 
                                        str_contains(strtolower($item), strtolower(trim($search)))
                                    );
                                @endphp

                                @forelse($filteredOptions as $item)
                                    <x-mantine-combobox-option
                                        :value="$item"
                                        :active="in_array($item, $value)"
                                    >
                                        <x-mantine-group gap="sm">
                                            @if(in_array($item, $value))
                                                <x-mantine-icon name="check" size="12" />
                                            @endif
                                            <span>{{ $item }}</span>
                                        </x-mantine-group>
                                    </x-mantine-combobox-option>
                                @empty
                                    <x-mantine-combobox-empty>Nothing found...</x-mantine-combobox-empty>
                                @endforelse
                            </x-mantine-combobox-options>
                        </x-mantine-combobox-dropdown>
                    </x-mantine-combobox>
                </div>
            </div>
        blade;
    }

    public function handleValueSelect($val)
    {
        if (in_array($val, $this->value)) {
            $this->value = array_filter($this->value, fn($v) => $v !== $val);
        } else {
            $this->value[] = $val;
        }
    }

    public function handleValueRemove($val)
    {
        $this->value = array_filter($this->value, fn($v) => $v !== $val);
    }

    public function resetSelectedOption()
    {
        $this->dispatch('combobox-reset-selected-option');
    }

    public function updateSelectedOptionIndex($type)
    {
        $this->dispatch('combobox-update-selected-option-index', type: $type);
    }

    public function openDropdown()
    {
        $this->dispatch('combobox-open-dropdown');
    }

    public function closeDropdown()
    {
        $this->dispatch('combobox-close-dropdown');
    }
}
