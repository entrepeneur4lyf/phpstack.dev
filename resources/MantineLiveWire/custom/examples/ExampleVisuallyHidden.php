<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleVisuallyHidden extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage with ActionIcon -->
                <div>
                    <x-mantine-action-icon>
                        <x-mantine-icon-heart />
                        <x-mantine-visually-hidden>Like post</x-mantine-visually-hidden>
                    </x-mantine-action-icon>
                </div>

                <!-- With navigation -->
                <div class="mt-8">
                    <nav>
                        <x-mantine-visually-hidden>Main navigation</x-mantine-visually-hidden>
                        <x-mantine-group>
                            <x-mantine-button component="a" href="#home">Home</x-mantine-button>
                            <x-mantine-button component="a" href="#about">About</x-mantine-button>
                            <x-mantine-button component="a" href="#contact">Contact</x-mantine-button>
                        </x-mantine-group>
                    </nav>
                </div>

                <!-- With form fields -->
                <div class="mt-8">
                    <form>
                        <x-mantine-visually-hidden>
                            <label for="search">Search the website</label>
                        </x-mantine-visually-hidden>
                        <x-mantine-text-input
                            id="search"
                            placeholder="Search..."
                            aria-label="Search"
                        />
                    </form>
                </div>

                <!-- With icon buttons -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-action-icon>
                            <x-mantine-icon-settings />
                            <x-mantine-visually-hidden>Settings</x-mantine-visually-hidden>
                        </x-mantine-action-icon>

                        <x-mantine-action-icon>
                            <x-mantine-icon-bell />
                            <x-mantine-visually-hidden>Notifications</x-mantine-visually-hidden>
                        </x-mantine-action-icon>

                        <x-mantine-action-icon>
                            <x-mantine-icon-user />
                            <x-mantine-visually-hidden>User profile</x-mantine-visually-hidden>
                        </x-mantine-action-icon>
                    </x-mantine-group>
                </div>

                <!-- With skip link -->
                <div class="mt-8">
                    <x-mantine-visually-hidden>
                        <a href="#main-content" class="skip-link">
                            Skip to main content
                        </a>
                    </x-mantine-visually-hidden>

                    <main id="main-content">
                        <x-mantine-text>Main content starts here</x-mantine-text>
                    </main>
                </div>
            </div>
        blade;
    }
}
