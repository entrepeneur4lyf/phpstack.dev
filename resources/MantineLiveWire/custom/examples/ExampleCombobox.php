<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleCombobox extends Component
{
    public $value = '';
    public $search = '';
    public $dropdownOpened = false;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic combobox -->
                <div class="mb-4">
                    <x-mantine-combobox
                        :store="[
                            'dropdownOpened' => $dropdownOpened,
                            'onDropdownClose' => fn() => $this->dropdownOpened = false,
                            'onDropdownOpen' => fn() => $this->dropdownOpened = true,
                        ]"
                        :on-option-submit="fn($val) => $this->value = $val"
                    >
                        <x-mantine-combobox-target>
                            <x-mantine-input-base
                                component="button"
                                type="button"
                                :pointer="true"
                                right-section-pointer-events="none"
                                :on-click="fn() => $this->dropdownOpened = !$this->dropdownOpened"
                            >
                                {{ $value ?: 'Pick value' }}
                            </x-mantine-input-base>
                        </x-mantine-combobox-target>

                        <x-mantine-combobox-dropdown>
                            <x-mantine-combobox-options>
                                <x-mantine-combobox-option value="React">React</x-mantine-combobox-option>
                                <x-mantine-combobox-option value="Angular">Angular</x-mantine-combobox-option>
                                <x-mantine-combobox-option value="Vue">Vue</x-mantine-combobox-option>
                                <x-mantine-combobox-option value="Svelte">Svelte</x-mantine-combobox-option>
                            </x-mantine-combobox-options>
                        </x-mantine-combobox-dropdown>
                    </x-mantine-combobox>
                </div>

                <!-- With search -->
                <div class="mb-4">
                    <x-mantine-combobox
                        :store="[
                            'dropdownOpened' => $dropdownOpened,
                            'onDropdownClose' => fn() => $this->dropdownOpened = false,
                            'onDropdownOpen' => fn() => $this->dropdownOpened = true,
                        ]"
                        :on-option-submit="fn($val) => $this->value = $val"
                    >
                        <x-mantine-combobox-target>
                            <x-mantine-input-base
                                component="button"
                                type="button"
                                :pointer="true"
                                right-section-pointer-events="none"
                                :on-click="fn() => $this->dropdownOpened = !$this->dropdownOpened"
                            >
                                {{ $value ?: 'Pick value' }}
                            </x-mantine-input-base>
                        </x-mantine-combobox-target>

                        <x-mantine-combobox-dropdown>
                            <x-mantine-combobox-search
                                wire:model="search"
                                placeholder="Search..."
                            />
                            <x-mantine-combobox-options>
                                @php
                                    $options = ['React', 'Angular', 'Vue', 'Svelte'];
                                    $filteredOptions = array_filter($options, fn($option) => 
                                        str_contains(strtolower($option), strtolower($search))
                                    );
                                @endphp

                                @forelse($filteredOptions as $option)
                                    <x-mantine-combobox-option :value="$option">
                                        {{ $option }}
                                    </x-mantine-combobox-option>
                                @empty
                                    <x-mantine-combobox-empty-option>
                                        Nothing found
                                    </x-mantine-combobox-empty-option>
                                @endforelse
                            </x-mantine-combobox-options>
                        </x-mantine-combobox-dropdown>
                    </x-mantine-combobox>
                </div>

                <!-- With groups -->
                <div class="mb-4">
                    <x-mantine-combobox
                        :store="[
                            'dropdownOpened' => $dropdownOpened,
                            'onDropdownClose' => fn() => $this->dropdownOpened = false,
                            'onDropdownOpen' => fn() => $this->dropdownOpened = true,
                        ]"
                        :on-option-submit="fn($val) => $this->value = $val"
                    >
                        <x-mantine-combobox-target>
                            <x-mantine-input-base
                                component="button"
                                type="button"
                                :pointer="true"
                                right-section-pointer-events="none"
                                :on-click="fn() => $this->dropdownOpened = !$this->dropdownOpened"
                            >
                                {{ $value ?: 'Pick value' }}
                            </x-mantine-input-base>
                        </x-mantine-combobox-target>

                        <x-mantine-combobox-dropdown>
                            <x-mantine-combobox-options>
                                <x-mantine-combobox-group label="Frontend">
                                    <x-mantine-combobox-option value="React">React</x-mantine-combobox-option>
                                    <x-mantine-combobox-option value="Angular">Angular</x-mantine-combobox-option>
                                    <x-mantine-combobox-option value="Vue">Vue</x-mantine-combobox-option>
                                </x-mantine-combobox-group>

                                <x-mantine-combobox-group label="Backend">
                                    <x-mantine-combobox-option value="Node">Node</x-mantine-combobox-option>
                                    <x-mantine-combobox-option value="Django">Django</x-mantine-combobox-option>
                                    <x-mantine-combobox-option value="Laravel">Laravel</x-mantine-combobox-option>
                                </x-mantine-combobox-group>
                            </x-mantine-combobox-options>
                        </x-mantine-combobox-dropdown>
                    </x-mantine-combobox>
                </div>

                <!-- With header and footer -->
                <div class="mb-4">
                    <x-mantine-combobox
                        :store="[
                            'dropdownOpened' => $dropdownOpened,
                            'onDropdownClose' => fn() => $this->dropdownOpened = false,
                            'onDropdownOpen' => fn() => $this->dropdownOpened = true,
                        ]"
                        :on-option-submit="fn($val) => $this->value = $val"
                    >
                        <x-mantine-combobox-target>
                            <x-mantine-input-base
                                component="button"
                                type="button"
                                :pointer="true"
                                right-section-pointer-events="none"
                                :on-click="fn() => $this->dropdownOpened = !$this->dropdownOpened"
                            >
                                {{ $value ?: 'Pick value' }}
                            </x-mantine-input-base>
                        </x-mantine-combobox-target>

                        <x-mantine-combobox-dropdown>
                            <x-mantine-combobox-header>
                                <div class="p-2 text-sm font-medium">Select an option</div>
                            </x-mantine-combobox-header>

                            <x-mantine-combobox-options>
                                <x-mantine-combobox-option value="React">React</x-mantine-combobox-option>
                                <x-mantine-combobox-option value="Angular">Angular</x-mantine-combobox-option>
                                <x-mantine-combobox-option value="Vue">Vue</x-mantine-combobox-option>
                            </x-mantine-combobox-options>

                            <x-mantine-combobox-footer>
                                <div class="p-2 text-sm text-gray-500">Powered by Mantine</div>
                            </x-mantine-combobox-footer>
                        </x-mantine-combobox-dropdown>
                    </x-mantine-combobox>
                </div>
            </div>
        blade;
    }
}
