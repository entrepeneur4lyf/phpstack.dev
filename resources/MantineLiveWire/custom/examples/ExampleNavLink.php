<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNavLink extends Component
{
    public $active = 0;

    public function setActive($index)
    {
        $this->active = $index;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-nav-link
                    href="#"
                    label="With icon"
                    :left-section="'<i class=\"fas fa-home\" style=\"width: 1rem;\"></i>'"
                />

                <!-- With right section -->
                <x-mantine-nav-link
                    href="#"
                    label="With right section"
                    :left-section="'<i class=\"fas fa-gauge\" style=\"width: 1rem;\"></i>'"
                    :right-section="'<i class=\"fas fa-chevron-right mantine-rotate-rtl\" style=\"width: 0.8rem;\"></i>'"
                />

                <!-- Disabled state -->
                <x-mantine-nav-link
                    href="#"
                    label="Disabled"
                    :left-section="'<i class=\"fas fa-ban\" style=\"width: 1rem;\"></i>'"
                    :disabled="true"
                />

                <!-- With description -->
                <x-mantine-nav-link
                    href="#"
                    label="With description"
                    description="Additional information"
                    :left-section="'<x-mantine-badge size=\"xs\" color=\"red\" circle>3</x-mantine-badge>'"
                />

                <!-- Active states with different variants -->
                <x-mantine-nav-link
                    href="#"
                    label="Active subtle"
                    :left-section="'<i class=\"fas fa-chart-line\" style=\"width: 1rem;\"></i>'"
                    :right-section="'<i class=\"fas fa-chevron-right mantine-rotate-rtl\" style=\"width: 0.8rem;\"></i>'"
                    variant="subtle"
                    :active="true"
                />

                <x-mantine-nav-link
                    href="#"
                    label="Active light"
                    :left-section="'<i class=\"fas fa-chart-line\" style=\"width: 1rem;\"></i>'"
                    :right-section="'<i class=\"fas fa-chevron-right mantine-rotate-rtl\" style=\"width: 0.8rem;\"></i>'"
                    :active="true"
                />

                <x-mantine-nav-link
                    href="#"
                    label="Active filled"
                    :left-section="'<i class=\"fas fa-chart-line\" style=\"width: 1rem;\"></i>'"
                    :right-section="'<i class=\"fas fa-chevron-right mantine-rotate-rtl\" style=\"width: 0.8rem;\"></i>'"
                    variant="filled"
                    :active="true"
                />

                <!-- Interactive example -->
                <div class="mt-4" style="width: 220px;">
                    @php
                        $items = [
                            [
                                'icon' => 'fas fa-gauge',
                                'label' => 'Dashboard',
                                'description' => 'Item with description'
                            ],
                            [
                                'icon' => 'fas fa-fingerprint',
                                'label' => 'Security',
                                'rightSection' => '<i class="fas fa-chevron-right" style="width: 1rem;"></i>'
                            ],
                            [
                                'icon' => 'fas fa-chart-line',
                                'label' => 'Activity'
                            ],
                        ];
                    @endphp

                    @foreach($items as $index => $item)
                        <x-mantine-nav-link
                            href="#"
                            :label="$item['label']"
                            :description="$item['description'] ?? null"
                            :left-section="'<i class=\"' . $item['icon'] . '\" style=\"width: 1rem;\"></i>'"
                            :right-section="$item['rightSection'] ?? null"
                            :active="$active === $index"
                            :on-click="fn() => $this->setActive($index)"
                        />
                    @endforeach
                </div>

                <!-- Nested navigation -->
                <div class="mt-4">
                    <x-mantine-nav-link
                        href="#"
                        label="First parent link"
                        :left-section="'<i class=\"fas fa-gauge\" style=\"width: 1rem;\"></i>'"
                        :children-offset="28"
                    >
                        <x-mantine-nav-link href="#" label="First child link" />
                        <x-mantine-nav-link href="#" label="Second child link" />
                        <x-mantine-nav-link
                            href="#"
                            label="Nested parent link"
                            :children-offset="28"
                        >
                            <x-mantine-nav-link href="#" label="First child link" />
                            <x-mantine-nav-link href="#" label="Second child link" />
                            <x-mantine-nav-link href="#" label="Third child link" />
                        </x-mantine-nav-link>
                    </x-mantine-nav-link>

                    <x-mantine-nav-link
                        href="#"
                        label="Second parent link"
                        :left-section="'<i class=\"fas fa-fingerprint\" style=\"width: 1rem;\"></i>'"
                        :children-offset="28"
                        :default-opened="true"
                    >
                        <x-mantine-nav-link href="#" label="First child link" />
                        <x-mantine-nav-link href="#" label="Second child link" />
                        <x-mantine-nav-link href="#" label="Third child link" />
                    </x-mantine-nav-link>
                </div>
            </div>
        blade;
    }
}
