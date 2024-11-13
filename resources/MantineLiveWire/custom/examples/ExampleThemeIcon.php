<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleThemeIcon extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-theme-icon>
                        <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                    </x-mantine-theme-icon>
                </div>

                <!-- Different variants -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-theme-icon variant="filled">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon variant="light">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon variant="outline">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon variant="default">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon variant="white">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>
                    </x-mantine-group>
                </div>

                <!-- With gradient -->
                <div class="mt-8">
                    <x-mantine-theme-icon
                        variant="gradient"
                        size="xl"
                        :gradient="[
                            'from' => 'blue',
                            'to' => 'cyan',
                            'deg' => 90,
                        ]"
                    >
                        <i class="fas fa-heart"></i>
                    </x-mantine-theme-icon>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-theme-icon size="xs">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon size="sm">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon size="md">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon size="lg">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon size="xl">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>
                    </x-mantine-group>
                </div>

                <!-- With auto contrast -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-theme-icon size="lg" color="lime.4">
                            <i class="fas fa-fingerprint" style="width: 20px; height: 20px;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon size="lg" color="lime.4" :auto-contrast="true">
                            <i class="fas fa-fingerprint" style="width: 20px; height: 20px;"></i>
                        </x-mantine-theme-icon>
                    </x-mantine-group>
                </div>

                <!-- With different radius -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-theme-icon radius="xs">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon radius="sm">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon radius="md">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon radius="lg">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>

                        <x-mantine-theme-icon radius="xl">
                            <i class="fas fa-photo" style="width: 70%; height: 70%;"></i>
                        </x-mantine-theme-icon>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
