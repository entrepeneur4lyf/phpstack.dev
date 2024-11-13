<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example MantineList Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade MantineList component.
 * It showcases different list types, markers, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic list usage
 * - Ordered and unordered lists
 * - Custom markers and icons
 * - Nested lists
 * - Size variations
 * - Spacing options
 * - Center alignment
 * - Custom list styles
 *
 * @see \MantineBlade\Components\MantineList
 * @link https://mantine.dev/core/list/
 */
class ExampleMantineList extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic unordered list
     * 2. Ordered list with custom type
     * 3. List with custom icons
     * 4. Nested lists
     * 5. Different size and spacing options
     * 6. Centered items with icons
     * 7. Custom list style types
     *
     * Each example showcases different features and customization
     * options available with the MantineList component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic unordered list -->
                <x-mantine-list>
                    <x-mantine-list-item>Clone or download repository from GitHub</x-mantine-list-item>
                    <x-mantine-list-item>Install dependencies with yarn</x-mantine-list-item>
                    <x-mantine-list-item>To start development server run npm start command</x-mantine-list-item>
                </x-mantine-list>

                <!-- Ordered list -->
                <div class="mt-8">
                    <x-mantine-list type="ordered">
                        <x-mantine-list-item>Clone or download repository from GitHub</x-mantine-list-item>
                        <x-mantine-list-item>Install dependencies with yarn</x-mantine-list-item>
                        <x-mantine-list-item>To start development server run npm start command</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- With custom icon -->
                <div class="mt-8">
                    <x-mantine-list
                        :icon="'<i class=\"fas fa-check\" style=\"width: 16px; height: 16px; color: var(--mantine-color-blue-filled);\"></i>'"
                        size="lg"
                        spacing="lg"
                    >
                        <x-mantine-list-item>Clone or download repository from GitHub</x-mantine-list-item>
                        <x-mantine-list-item>Install dependencies with yarn</x-mantine-list-item>
                        <x-mantine-list-item>To start development server run npm start command</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Nested list -->
                <div class="mt-8">
                    <x-mantine-list :with-padding="true">
                        <x-mantine-list-item>
                            First level item
                            <x-mantine-list :with-padding="true">
                                <x-mantine-list-item>Second level item</x-mantine-list-item>
                                <x-mantine-list-item>Another second level item</x-mantine-list-item>
                            </x-mantine-list>
                        </x-mantine-list-item>
                        <x-mantine-list-item>Another first level item</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-list size="xl" spacing="lg">
                        <x-mantine-list-item>Extra large list item</x-mantine-list-item>
                        <x-mantine-list-item>With large spacing</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Centered with icons -->
                <div class="mt-8">
                    <x-mantine-list
                        :center="true"
                        size="md"
                        spacing="md"
                        :icon="'<i class=\"fas fa-star\" style=\"color: var(--mantine-color-yellow-filled);\"></i>'"
                    >
                        <x-mantine-list-item>Centered with star icon</x-mantine-list-item>
                        <x-mantine-list-item :icon="'<i class=\"fas fa-heart\" style=\"color: var(--mantine-color-red-filled);\"></i>'">
                            With custom heart icon
                        </x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Custom list style -->
                <div class="mt-8">
                    <x-mantine-list list-style-type="lower-alpha">
                        <x-mantine-list-item>First item</x-mantine-list-item>
                        <x-mantine-list-item>Second item</x-mantine-list-item>
                        <x-mantine-list-item>Third item</x-mantine-list-item>
                    </x-mantine-list>
                </div>
            </div>
        blade;
    }
} 