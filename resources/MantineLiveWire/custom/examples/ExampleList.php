<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleList extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-list>
                        <x-mantine-list-item>Clone or download repository from GitHub</x-mantine-list-item>
                        <x-mantine-list-item>Install dependencies with yarn</x-mantine-list-item>
                        <x-mantine-list-item>To start development server run npm start command</x-mantine-list-item>
                        <x-mantine-list-item>Run tests to make sure your changes do not break the build</x-mantine-list-item>
                        <x-mantine-list-item>Submit a pull request once you are done</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- With icons -->
                <div class="mt-8">
                    <x-mantine-list
                        spacing="xs"
                        size="sm"
                        :center="true"
                        :icon="'
                            <x-mantine-theme-icon color=\"teal\" size=\"24\" radius=\"xl\">
                                <i class=\"fas fa-check-circle\" style=\"width: 16px; height: 16px;\"></i>
                            </x-mantine-theme-icon>
                        '"
                    >
                        <x-mantine-list-item>Clone or download repository from GitHub</x-mantine-list-item>
                        <x-mantine-list-item>Install dependencies with yarn</x-mantine-list-item>
                        <x-mantine-list-item>To start development server run npm start command</x-mantine-list-item>
                        <x-mantine-list-item>Run tests to make sure your changes do not break the build</x-mantine-list-item>
                        <x-mantine-list-item
                            :icon="'
                                <x-mantine-theme-icon color=\"blue\" size=\"24\" radius=\"xl\">
                                    <i class=\"fas fa-circle-dashed\" style=\"width: 16px; height: 16px;\"></i>
                                </x-mantine-theme-icon>
                            '"
                        >
                            Submit a pull request once you are done
                        </x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Nested lists -->
                <div class="mt-8">
                    <x-mantine-list list-style-type="disc">
                        <x-mantine-list-item>First order item</x-mantine-list-item>
                        <x-mantine-list-item>First order item</x-mantine-list-item>
                        <x-mantine-list-item>
                            First order item with list
                            <x-mantine-list :with-padding="true" list-style-type="disc">
                                <x-mantine-list-item>Nested item</x-mantine-list-item>
                                <x-mantine-list-item>Nested item</x-mantine-list-item>
                                <x-mantine-list-item>
                                    Nested item with list
                                    <x-mantine-list :with-padding="true" list-style-type="disc">
                                        <x-mantine-list-item>Even more nested</x-mantine-list-item>
                                        <x-mantine-list-item>Even more nested</x-mantine-list-item>
                                    </x-mantine-list>
                                </x-mantine-list-item>
                                <x-mantine-list-item>Nested item</x-mantine-list-item>
                            </x-mantine-list>
                        </x-mantine-list-item>
                        <x-mantine-list-item>First order item</x-mantine-list-item>
                    </x-mantine-list>
                </div>

                <!-- Different types -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-list type="ordered">
                            <x-mantine-list-item>Ordered list item 1</x-mantine-list-item>
                            <x-mantine-list-item>Ordered list item 2</x-mantine-list-item>
                            <x-mantine-list-item>Ordered list item 3</x-mantine-list-item>
                        </x-mantine-list>

                        <x-mantine-list type="unordered">
                            <x-mantine-list-item>Unordered list item 1</x-mantine-list-item>
                            <x-mantine-list-item>Unordered list item 2</x-mantine-list-item>
                            <x-mantine-list-item>Unordered list item 3</x-mantine-list-item>
                        </x-mantine-list>
                    </x-mantine-stack>
                </div>

                <!-- Different sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-list size="xs">
                            <x-mantine-list-item>Extra small list item</x-mantine-list-item>
                            <x-mantine-list-item>Extra small list item</x-mantine-list-item>
                        </x-mantine-list>

                        <x-mantine-list size="sm">
                            <x-mantine-list-item>Small list item</x-mantine-list-item>
                            <x-mantine-list-item>Small list item</x-mantine-list-item>
                        </x-mantine-list>

                        <x-mantine-list size="md">
                            <x-mantine-list-item>Medium list item</x-mantine-list-item>
                            <x-mantine-list-item>Medium list item</x-mantine-list-item>
                        </x-mantine-list>

                        <x-mantine-list size="lg">
                            <x-mantine-list-item>Large list item</x-mantine-list-item>
                            <x-mantine-list-item>Large list item</x-mantine-list-item>
                        </x-mantine-list>

                        <x-mantine-list size="xl">
                            <x-mantine-list-item>Extra large list item</x-mantine-list-item>
                            <x-mantine-list-item>Extra large list item</x-mantine-list-item>
                        </x-mantine-list>
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
