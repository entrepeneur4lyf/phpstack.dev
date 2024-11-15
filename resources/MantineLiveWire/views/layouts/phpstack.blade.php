<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PHP Stack') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Color Scheme Script -->
    <x-mantine-color-scheme-script />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <!-- Mantine App Shell -->
    <x-mantine-app-shell
        :header="[
            'height' => 70,
            'collapsed' => false,
            'withBorder' => true,
        ]"
        :padding="'md'"
    >
        <!-- Header -->
        <x-slot name="header">
            <x-mantine-container size="xl" h="100%">
                <x-mantine-group justify="space-between" h="100%">
                    <!-- Logo -->
                    <x-mantine-anchor href="/" underline="never">
                        <x-mantine-title order="1" size="lg">
                            PHP Stack
                        </x-mantine-title>
                    </x-mantine-anchor>

                    <!-- Navigation -->
                    <x-mantine-group gap="xl">
                        <x-mantine-anchor href="/features" underline="hover">Features</x-mantine-anchor>
                        <x-mantine-anchor href="/pricing" underline="hover">Pricing</x-mantine-anchor>
                        <x-mantine-anchor href="/blog" underline="hover">Blog</x-mantine-anchor>
                        <x-mantine-anchor href="/contact" underline="hover">Contact</x-mantine-anchor>
                    </x-mantine-group>

                    <!-- Actions -->
                    <x-mantine-group>
                        @auth
                            <x-mantine-button variant="subtle" component="a" href="/dashboard">
                                Dashboard
                            </x-mantine-button>
                        @else
                            <x-mantine-button variant="subtle" component="a" href="/login">
                                Login
                            </x-mantine-button>
                            <x-mantine-button component="a" href="/register">
                                Get Started
                            </x-mantine-button>
                        @endauth
                    </x-mantine-group>
                </x-mantine-group>
            </x-mantine-container>
        </x-slot>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-slot name="footer">
            <x-mantine-container size="xl" py="xl">
                <x-mantine-grid>
                    <!-- Brand -->
                    <x-mantine-grid-col span="4">
                        <x-mantine-stack>
                            <x-mantine-title order="1" size="lg">
                                PHP Stack
                            </x-mantine-title>
                            <x-mantine-text size="sm" c="dimmed">
                                Modern PHP development stack with Laravel, Livewire, and Mantine UI.
                            </x-mantine-text>
                        </x-mantine-stack>
                    </x-mantine-grid-col>

                    <!-- Links -->
                    <x-mantine-grid-col span="8">
                        <x-mantine-simple-grid cols="3">
                            <!-- Product -->
                            <x-mantine-stack>
                                <x-mantine-text fw="600">Product</x-mantine-text>
                                <x-mantine-anchor href="/features" underline="hover">Features</x-mantine-anchor>
                                <x-mantine-anchor href="/pricing" underline="hover">Pricing</x-mantine-anchor>
                                <x-mantine-anchor href="/docs" underline="hover">Documentation</x-mantine-anchor>
                            </x-mantine-stack>

                            <!-- Company -->
                            <x-mantine-stack>
                                <x-mantine-text fw="600">Company</x-mantine-text>
                                <x-mantine-anchor href="/about" underline="hover">About</x-mantine-anchor>
                                <x-mantine-anchor href="/blog" underline="hover">Blog</x-mantine-anchor>
                                <x-mantine-anchor href="/contact" underline="hover">Contact</x-mantine-anchor>
                            </x-mantine-stack>

                            <!-- Legal -->
                            <x-mantine-stack>
                                <x-mantine-text fw="600">Legal</x-mantine-text>
                                <x-mantine-anchor href="/privacy" underline="hover">Privacy Policy</x-mantine-anchor>
                                <x-mantine-anchor href="/terms" underline="hover">Terms of Service</x-mantine-anchor>
                            </x-mantine-stack>
                        </x-mantine-simple-grid>
                    </x-mantine-grid-col>

                    <!-- Copyright -->
                    <x-mantine-grid-col span="12">
                        <x-mantine-divider my="lg" />
                        <x-mantine-group justify="space-between" align="center">
                            <x-mantine-text size="sm" c="dimmed">
                                © {{ date('Y') }} PHP Stack. All rights reserved.
                            </x-mantine-text>
                            <x-mantine-group>
                                <x-mantine-action-icon variant="subtle" component="a" href="https://twitter.com/phpstack">
                                    <x-mantine-icon name="brand-twitter" />
                                </x-mantine-action-icon>
                                <x-mantine-action-icon variant="subtle" component="a" href="https://github.com/phpstack">
                                    <x-mantine-icon name="brand-github" />
                                </x-mantine-action-icon>
                            </x-mantine-group>
                        </x-mantine-group>
                    </x-mantine-grid-col>
                </x-mantine-grid>
            </x-mantine-container>
        </x-slot>
    </x-mantine-app-shell>

    @livewireScripts
</body>
</html>
