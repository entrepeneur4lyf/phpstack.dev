<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFieldset extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic fieldset -->
                <x-mantine-fieldset legend="Personal information">
                    <x-mantine-text-input
                        label="Your name"
                        placeholder="Your name"
                    />
                    <x-mantine-text-input
                        label="Email"
                        placeholder="Email"
                        class="mt-4"
                    />
                </x-mantine-fieldset>

                <!-- Disabled fieldset -->
                <x-mantine-fieldset legend="Personal information" :disabled="true" class="mt-4">
                    <x-mantine-text-input
                        label="Your name"
                        placeholder="Your name"
                    />
                    <x-mantine-text-input
                        label="Email"
                        placeholder="Email"
                        class="mt-4"
                    />
                    <x-mantine-group justify="flex-end" class="mt-4">
                        <x-mantine-button>Submit</x-mantine-button>
                    </x-mantine-group>
                </x-mantine-fieldset>

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-fieldset legend="Default variant">
                            <x-mantine-text-input placeholder="Default input" />
                        </x-mantine-fieldset>

                        <x-mantine-fieldset legend="Filled variant" variant="filled">
                            <x-mantine-text-input placeholder="Filled input" />
                        </x-mantine-fieldset>

                        <x-mantine-fieldset legend="Unstyled variant" variant="unstyled">
                            <x-mantine-text-input placeholder="Unstyled input" />
                        </x-mantine-fieldset>
                    </x-mantine-stack>
                </div>

                <!-- Different radius -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-fieldset legend="Extra small radius" radius="xs">
                            <x-mantine-text-input placeholder="Input" />
                        </x-mantine-fieldset>

                        <x-mantine-fieldset legend="Large radius" radius="lg">
                            <x-mantine-text-input placeholder="Input" />
                        </x-mantine-fieldset>
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
