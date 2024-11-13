<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<div x-data="{ mobileOpen: false }">
    <x-mantine-header height="60">
        <x-mantine-container size="xl" h="100%">
            <x-mantine-group justify="space-between" h="100%">
                <x-mantine-group>
                    <!-- Logo -->
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-mantine-text size="xl" fw="700">phpStack</x-mantine-text>
                    </a>

                    <!-- Desktop Navigation Links -->
                    <x-mantine-group display={{ ['none', 'none', 'flex'] }}>
                        <x-mantine-anchor
                            href="{{ route('dashboard') }}"
                            wire:navigate
                            underline="never"
                            fw={{ request()->routeIs('dashboard') ? '600' : '400' }}
                        >
                            {{ __('Dashboard') }}
                        </x-mantine-anchor>
                    </x-mantine-group>
                </x-mantine-group>

                <!-- Desktop Menu -->
                <x-mantine-group display={{ ['none', 'none', 'flex'] }}>
                    <x-mantine-menu position="bottom-end" offset="5">
                        <x-slot name="trigger">
                            <x-mantine-button variant="subtle">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" 
                                     x-text="name" 
                                     x-on:profile-updated.window="name = $event.detail.name">
                                </div>
                            </x-mantine-button>
                        </x-slot>

                        <x-mantine-menu-item component="a" href="{{ route('profile') }}" wire:navigate>
                            {{ __('Profile') }}
                        </x-mantine-menu-item>

                        <x-mantine-menu-divider />

                        <x-mantine-menu-item wire:click="logout" color="red">
                            {{ __('Log Out') }}
                        </x-mantine-menu-item>
                    </x-mantine-menu>
                </x-mantine-group>

                <!-- Mobile Menu Button -->
                <x-mantine-burger
                    opened="{{ $mobileOpen }}"
                    @click="mobileOpen = !mobileOpen"
                    display={{ ['flex', 'flex', 'none'] }}
                />
            </x-mantine-group>
        </x-mantine-container>
    </x-mantine-header>

    <!-- Mobile Navigation Drawer -->
    <x-mantine-drawer
        opened="{{ $mobileOpen }}"
        @close="mobileOpen = false"
        position="right"
        size="xs"
        display={{ ['block', 'block', 'none'] }}
    >
        <x-mantine-stack>
            <!-- User Info -->
            <x-mantine-paper p="md" withBorder>
                <x-mantine-stack spacing="xs">
                    <x-mantine-text fw="500" size="lg" 
                        x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                        x-text="name"
                        x-on:profile-updated.window="name = $event.detail.name">
                    </x-mantine-text>
                    <x-mantine-text size="sm" c="dimmed">{{ auth()->user()->email }}</x-mantine-text>
                </x-mantine-stack>
            </x-mantine-paper>

            <!-- Navigation Links -->
            <x-mantine-stack spacing="xs">
                <x-mantine-button
                    variant="subtle"
                    fullWidth
                    component="a"
                    href="{{ route('dashboard') }}"
                    wire:navigate
                    fw={{ request()->routeIs('dashboard') ? '600' : '400' }}
                >
                    {{ __('Dashboard') }}
                </x-mantine-button>

                <x-mantine-button
                    variant="subtle"
                    fullWidth
                    component="a"
                    href="{{ route('profile') }}"
                    wire:navigate
                >
                    {{ __('Profile') }}
                </x-mantine-button>

                <x-mantine-divider my="sm" />

                <x-mantine-button
                    variant="light"
                    color="red"
                    fullWidth
                    wire:click="logout"
                >
                    {{ __('Log Out') }}
                </x-mantine-button>
            </x-mantine-stack>
        </x-mantine-stack>
    </x-mantine-drawer>
</div>
