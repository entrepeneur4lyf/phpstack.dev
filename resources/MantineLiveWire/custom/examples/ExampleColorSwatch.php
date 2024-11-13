<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleColorSwatch extends Component
{
    public $checked = true;

    public function toggleChecked()
    {
        $this->checked = !$this->checked;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-group>
                        <x-mantine-color-swatch color="#009790" />
                        <x-mantine-color-swatch color="rgba(234, 22, 174, 0.5)" />
                        <x-mantine-color-swatch color="var(--mantine-color-orange-5)" />
                    </x-mantine-group>
                </div>

                <!-- With shadow control -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-color-swatch
                            color="rgba(255, 255, 255, 0.7)"
                            :with-shadow="true"
                        />
                        <x-mantine-color-swatch
                            color="rgba(255, 255, 255, 0.7)"
                            :with-shadow="false"
                        />
                    </x-mantine-group>
                </div>

                <!-- As an interactive element -->
                <div class="mt-8">
                    <x-mantine-color-swatch
                        component="button"
                        color="var(--mantine-color-grape-6)"
                        :on-click="fn() => $this->toggleChecked()"
                        style="color: #fff; cursor: pointer;"
                    >
                        @if($checked)
                            <i class="fas fa-check" style="width: 12px; height: 12px;"></i>
                        @endif
                    </x-mantine-color-swatch>
                </div>

                <!-- With custom size and radius -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-color-swatch
                            color="#4287f5"
                            size="xs"
                            radius="xs"
                        />
                        <x-mantine-color-swatch
                            color="#4287f5"
                            size="sm"
                            radius="sm"
                        />
                        <x-mantine-color-swatch
                            color="#4287f5"
                            size="md"
                            radius="md"
                        />
                        <x-mantine-color-swatch
                            color="#4287f5"
                            size="lg"
                            radius="lg"
                        />
                        <x-mantine-color-swatch
                            color="#4287f5"
                            size="xl"
                            radius="xl"
                        />
                    </x-mantine-group>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-color-swatch
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        color="#e542f5"
                        size="lg"
                        radius="md"
                    />
                </div>
            </div>
        blade;
    }
}
