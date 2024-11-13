<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePill extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic pill -->
                <x-mantine-pill>React</x-mantine-pill>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-pill size="xs">Extra small</x-mantine-pill>
                        <x-mantine-pill size="sm">Small</x-mantine-pill>
                        <x-mantine-pill size="md">Medium</x-mantine-pill>
                        <x-mantine-pill size="lg">Large</x-mantine-pill>
                        <x-mantine-pill size="xl">Extra large</x-mantine-pill>
                    </x-mantine-stack>
                </div>

                <!-- With remove button -->
                <div class="mt-4">
                    <x-mantine-pill
                        :with-remove-button="true"
                        :on-remove="fn() => $this->removePill()"
                        :remove-button-props="['aria-label' => 'Remove pill']"
                    >
                        Removable pill
                    </x-mantine-pill>
                </div>

                <!-- Inside inputs -->
                <div class="mt-4">
                    <x-mantine-input-base component="div" :multiline="true">
                        <x-mantine-pill-group>
                            @foreach(range(0, 9) as $index)
                                <x-mantine-pill :with-remove-button="true">
                                    Item {{ $index }}
                                </x-mantine-pill>
                            @endforeach
                        </x-mantine-pill-group>
                    </x-mantine-input-base>
                </div>

                <!-- Inside MultiSelect -->
                <div class="mt-4">
                    <x-mantine-multi-select
                        label="Your favorite libraries"
                        placeholder="Pick values"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        wire:model="values"
                    >
                        <x-mantine-pill-group>
                            @foreach($values ?? [] as $value)
                                <x-mantine-pill :with-remove-button="true">
                                    {{ $value }}
                                </x-mantine-pill>
                            @endforeach
                        </x-mantine-pill-group>
                    </x-mantine-multi-select>
                </div>
            </div>
        blade;
    }

    public function removePill()
    {
        // Handle pill removal
    }
}
