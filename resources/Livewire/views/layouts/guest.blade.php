<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'phpStack') }}</title>

        <!-- Scripts -->
        @stack('scripts')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-mantine-app-shell>
            <!-- Header -->
            <x-slot name="header">
                <x-mantine-header height="60">
                    <x-mantine-container size="xl" h="100%">
                        <x-mantine-group justify="space-between" h="100%">
                            <a href="/" wire:navigate>
                                <x-mantine-text size="xl" fw="700">phpStack</x-mantine-text>
                            </a>

                            @if (Route::has('login'))
                                <x-mantine-group>
                                    @auth
                                        <x-mantine-button 
                                            component="a" 
                                            href="{{ route('dashboard') }}" 
                                            wire:navigate
                                            variant="subtle"
                                        >
                                            Dashboard
                                        </x-mantine-button>
                                    @else
                                        <x-mantine-button 
                                            component="a" 
                                            href="{{ route('login') }}" 
                                            wire:navigate
                                            variant="subtle"
                                        >
                                            Log in
                                        </x-mantine-button>

                                        @if (Route::has('register'))
                                            <x-mantine-button 
                                                component="a" 
                                                href="{{ route('register') }}" 
                                                wire:navigate
                                            >
                                                Register
                                            </x-mantine-button>
                                        @endif
                                    @endauth
                                </x-mantine-group>
                            @endif
                        </x-mantine-group>
                    </x-mantine-container>
                </x-mantine-header>
            </x-slot>

            <!-- Main Content -->
            <x-mantine-container size="sm" py="xl">
                <x-mantine-paper shadow="md" p="xl" radius="md">
                    {{ $slot }}
                </x-mantine-paper>
            </x-mantine-container>

            <!-- Footer -->
            <x-slot name="footer">
                <x-mantine-footer height="60">
                    <x-mantine-container size="xl" h="100%">
                        <x-mantine-group justify="space-between" h="100%">
                            <x-mantine-text size="sm" c="dimmed">
                                © {{ date('Y') }} phpStack. All rights reserved.
                            </x-mantine-text>
                            <x-mantine-group>
                                <x-mantine-anchor href="https://github.com/your-repo" target="_blank" size="sm">
                                    GitHub
                                </x-mantine-anchor>
                                <x-mantine-anchor href="/docs" size="sm">
                                    Documentation
                                </x-mantine-anchor>
                            </x-mantine-group>
                        </x-mantine-group>
                    </x-mantine-container>
                </x-mantine-footer>
            </x-slot>
        </x-mantine-app-shell>
    </body>
</html>
