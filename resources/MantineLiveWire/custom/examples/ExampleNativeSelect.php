<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNativeSelect extends Component
{
    public ?string $value = null;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic select with array data -->
                <x-mantine-native-select
                    label="Choose framework"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    wire:model="value"
                />

                <!-- With object data -->
                <x-mantine-native-select
                    label="With object data"
                    :data="[
                        ['label' => 'React', 'value' => 'react'],
                        ['label' => 'Angular', 'value' => 'angular'],
                        ['label' => 'Svelte', 'value' => 'svelte', 'disabled' => true],
                        ['label' => 'Vue', 'value' => 'vue'],
                    ]"
                    class="mt-4"
                />

                <!-- With grouped data -->
                <x-mantine-native-select
                    label="Grouped options"
                    :data="[
                        [
                            'group' => 'Frontend libraries',
                            'items' => [
                                ['label' => 'React', 'value' => 'react'],
                                ['label' => 'Angular', 'value' => 'angular'],
                                ['label' => 'Vue', 'value' => 'vue', 'disabled' => true],
                            ],
                        ],
                        [
                            'group' => 'Backend libraries',
                            'items' => [
                                ['label' => 'Express', 'value' => 'express'],
                                ['label' => 'Koa', 'value' => 'koa'],
                                ['label' => 'Django', 'value' => 'django'],
                            ],
                        ],
                    ]"
                    class="mt-4"
                />

                <!-- With children options -->
                <x-mantine-native-select
                    label="With children options"
                    class="mt-4"
                >
                    <optgroup label="Frontend libraries">
                        <option value="react">React</option>
                        <option value="angular">Angular</option>
                        <option value="vue" disabled>Vue</option>
                    </optgroup>

                    <optgroup label="Backend libraries">
                        <option value="express">Express</option>
                        <option value="koa">Koa</option>
                        <option value="django">Django</option>
                    </optgroup>
                </x-mantine-native-select>

                <!-- With dividers -->
                <x-mantine-native-select
                    label="With dividers"
                    class="mt-4"
                >
                    <option>Select library</option>
                    <hr />
                    <optgroup label="Frontend libraries">
                        <option value="react">React</option>
                        <option value="angular">Angular</option>
                        <option value="vue">Vue</option>
                    </optgroup>
                    <hr />
                    <optgroup label="Backend libraries">
                        <option value="express">Express</option>
                        <option value="koa">Koa</option>
                        <option value="django">Django</option>
                    </optgroup>
                </x-mantine-native-select>

                <!-- With sections -->
                <x-mantine-native-select
                    label="With sections"
                    :data="['React', 'Angular', 'Vue']"
                    :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                    :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>'
                    :left-section-pointer-events="'none'"
                    class="mt-4"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-native-select
                            variant="default"
                            :data="['React', 'Angular', 'Vue']"
                            placeholder="Default variant"
                        />
                        <x-mantine-native-select
                            variant="filled"
                            :data="['React', 'Angular', 'Vue']"
                            placeholder="Filled variant"
                        />
                        <x-mantine-native-select
                            variant="unstyled"
                            :data="['React', 'Angular', 'Vue']"
                            placeholder="Unstyled variant"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-native-select
                        label="With error"
                        error="Please select an option"
                        :data="['React', 'Angular', 'Vue']"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-native-select
                        label="Disabled select"
                        :disabled="true"
                        :data="['React', 'Angular', 'Vue']"
                    />
                </div>
            </div>
        blade;
    }
}
