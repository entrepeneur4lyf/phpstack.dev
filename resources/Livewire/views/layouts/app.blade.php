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
            <!-- Navigation -->
            <x-slot name="header">
                <livewire:layout.navigation />
            </x-slot>

            <!-- Page Heading -->
            @if (isset($header))
                <x-mantine-container size="xl">
                    <x-mantine-paper shadow="sm" p="lg" radius="md" mt="lg">
                        {{ $header }}
                    </x-mantine-paper>
                </x-mantine-container>
            @endif

            <!-- Page Content -->
            <x-mantine-container size="xl" py="xl">
                {{ $slot }}
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
