<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleDivider extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-text>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, officiis! Fugit minus ea,
                        perferendis eum consectetur quae vitae. Aliquid, quam reprehenderit? Maiores sed pariatur
                        aliquid commodi atque sunt officiis natus?
                    </x-mantine-text>

                    <x-mantine-divider my="md" />

                    <x-mantine-text>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, officiis! Fugit minus ea,
                        perferendis eum consectetur quae vitae. Aliquid, quam reprehenderit? Maiores sed pariatur
                        aliquid commodi atque sunt officiis natus?
                    </x-mantine-text>
                </div>

                <!-- Different variants -->
                <div class="mt-8">
                    <x-mantine-divider my="sm" />
                    <x-mantine-divider my="sm" variant="dashed" />
                    <x-mantine-divider my="sm" variant="dotted" />
                </div>

                <!-- With labels -->
                <div class="mt-8">
                    <x-mantine-divider my="xs" label="Label on the left" label-position="left" />
                    <x-mantine-divider my="xs" label="Label in the center" label-position="center" />
                    <x-mantine-divider my="xs" label="Label on the right" label-position="right" />

                    <x-mantine-divider
                        my="xs"
                        variant="dashed"
                        label-position="center"
                        :label="'
                            <x-mantine-group align=\"center\">
                                <x-mantine-icon name=\"search\" size=\"12\" />
                                <x-mantine-box ml=\"5\">Search results</x-mantine-box>
                            </x-mantine-group>
                        '"
                    />

                    <x-mantine-divider
                        my="xs"
                        :label="'
                            <x-mantine-anchor href=\"https://mantine.dev\" target=\"_blank\" inherit>
                                Link label
                            </x-mantine-anchor>
                        '"
                    />
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-divider size="xs" my="xs" />
                    <x-mantine-divider size="sm" my="xs" />
                    <x-mantine-divider size="md" my="xs" />
                    <x-mantine-divider size="lg" my="xs" />
                    <x-mantine-divider size="xl" my="xs" />
                    <x-mantine-divider :size="10" my="xs" />
                </div>

                <!-- Vertical orientation -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-text>Label</x-mantine-text>
                        <x-mantine-divider orientation="vertical" />
                        <x-mantine-text>Label</x-mantine-text>
                        <x-mantine-divider size="sm" orientation="vertical" />
                        <x-mantine-text>Label</x-mantine-text>
                        <x-mantine-divider size="md" orientation="vertical" />
                        <x-mantine-text>Label</x-mantine-text>
                        <x-mantine-divider size="lg" orientation="vertical" />
                        <x-mantine-text>Label</x-mantine-text>
                        <x-mantine-divider size="xl" orientation="vertical" />
                        <x-mantine-text>Label</x-mantine-text>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
