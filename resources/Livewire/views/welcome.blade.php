<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>phpStack Starter Kit - Modern Laravel Full Stack Solution</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <x-mantine-app-shell>
            <x-mantine-header height="60">
                <x-mantine-container size="lg" h="100%">
                    <x-mantine-group justify="space-between" h="100%">
                        <x-mantine-group>
                            <x-mantine-title order="3" c="blue">phpStack.dev</x-mantine-title>
                        </x-mantine-group>

                        <x-mantine-group>
                            @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
                            <x-mantine-action-icon variant="default" size="lg">
                                <i class="fas fa-sun"></i>
                            </x-mantine-action-icon>
                        </x-mantine-group>
                    </x-mantine-group>
                </x-mantine-container>
            </x-mantine-header>

            <x-mantine-container size="lg">
                <!-- Hero Section -->
                <x-mantine-stack align="center" mt="xl" spacing="xl">
                    <x-mantine-badge size="lg" radius="sm" variant="dot">Production Ready</x-mantine-badge>

                    <x-mantine-title ta="center" order="1" size="h1">
                        The Modern Laravel<br/>Full Stack Solution
                    </x-mantine-title>

                    <x-mantine-text size="lg" c="dimmed" maw="800" ta="center">
                        phpStack Starter Kit combines Laravel, Livewire 3, and Mantine UI to provide
                        a complete solution for building modern web applications. Start your next
                        project with a powerful, type-safe foundation.
                    </x-mantine-text>

                    <x-mantine-group>
                        <x-mantine-button size="lg" component="a" href="/docs/getting-started">
                            Get started
                        </x-mantine-button>
                        <x-mantine-button size="lg" variant="default" component="a" href="https://github.com/your-repo">
                            <x-mantine-group gap="xs">
                                <i class="fab fa-github"></i>
                                <span>GitHub</span>
                            </x-mantine-group>
                        </x-mantine-button>
                    </x-mantine-group>
                </x-mantine-stack>

                <!-- Features Grid -->
                <x-mantine-simple-grid cols={{ 3 }} spacing="xl" mt={100}>
                    <x-mantine-paper shadow="md" p="xl" radius="md">
                        <x-mantine-stack>
                            <x-mantine-action-icon size="xl" radius="md" variant="light" c="blue">
                                <i class="fas fa-bolt"></i>
                            </x-mantine-action-icon>
                            <x-mantine-title order="4">Full Stack Solution</x-mantine-title>
                            <x-mantine-text size="sm">
                                Everything you need to build modern web apps: Laravel 10,
                                Livewire 3, Mantine UI, and TypeScript support out of the box.
                            </x-mantine-text>
                        </x-mantine-stack>
                    </x-mantine-paper>

                    <x-mantine-paper shadow="md" p="xl" radius="md">
                        <x-mantine-stack>
                            <x-mantine-action-icon size="xl" radius="md" variant="light" c="violet">
                                <i class="fas fa-cubes"></i>
                            </x-mantine-action-icon>
                            <x-mantine-title order="4">Production Ready</x-mantine-title>
                            <x-mantine-text size="sm">
                                Authentication, dark mode, form handling, and other essential
                                features ready to use in production environments.
                            </x-mantine-text>
                        </x-mantine-stack>
                    </x-mantine-paper>

                    <x-mantine-paper shadow="md" p="xl" radius="md">
                        <x-mantine-stack>
                            <x-mantine-action-icon size="xl" radius="md" variant="light" c="pink">
                                <i class="fas fa-code"></i>
                            </x-mantine-action-icon>
                            <x-mantine-title order="4">Developer Experience</x-mantine-title>
                            <x-mantine-text size="sm">
                                Type safety, hot reloading, and modern tooling for the best
                                possible development experience.
                            </x-mantine-text>
                        </x-mantine-stack>
                    </x-mantine-paper>
                </x-mantine-simple-grid>

                <!-- Quick Start -->
                <x-mantine-stack mt={100} spacing="xl">
                    <x-mantine-title order="2" ta="center">Quick Start</x-mantine-title>

                    <x-mantine-paper shadow="md" p="xl" radius="md">
                        <x-mantine-code-highlight language="bash">
# Create new project
composer create-project phpstack/starter-kit my-app

# Start development server
cd my-app
php artisan serve</x-mantine-code-highlight>
                    </x-mantine-paper>
                </x-mantine-stack>

                <!-- Built-in Features -->
                <x-mantine-stack mt={100} spacing="xl">
                    <x-mantine-title order="2" ta="center">Everything You Need</x-mantine-title>
                    
                    <x-mantine-simple-grid cols={{ 4 }} spacing="lg">
                        <x-mantine-paper shadow="md" p="lg" radius="md">
                            <x-mantine-stack align="center">
                                <x-mantine-action-icon size="xl" variant="light" c="blue">
                                    <i class="fas fa-shield-alt"></i>
                                </x-mantine-action-icon>
                                <x-mantine-text fw={700}>Authentication</x-mantine-text>
                                <x-mantine-text size="sm" c="dimmed" ta="center">
                                    Complete auth system with login, registration, and password reset
                                </x-mantine-text>
                            </x-mantine-stack>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="md" p="lg" radius="md">
                            <x-mantine-stack align="center">
                                <x-mantine-action-icon size="xl" variant="light" c="grape">
                                    <i class="fas fa-moon"></i>
                                </x-mantine-action-icon>
                                <x-mantine-text fw={700}>Dark Mode</x-mantine-text>
                                <x-mantine-text size="sm" c="dimmed" ta="center">
                                    Built-in dark mode support with system preference detection
                                </x-mantine-text>
                            </x-mantine-stack>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="md" p="lg" radius="md">
                            <x-mantine-stack align="center">
                                <x-mantine-action-icon size="xl" variant="light" c="violet">
                                    <i class="fas fa-check-circle"></i>
                                </x-mantine-action-icon>
                                <x-mantine-text fw={700}>Form Handling</x-mantine-text>
                                <x-mantine-text size="sm" c="dimmed" ta="center">
                                    Type-safe form handling with validation and error messages
                                </x-mantine-text>
                            </x-mantine-stack>
                        </x-mantine-paper>

                        <x-mantine-paper shadow="md" p="lg" radius="md">
                            <x-mantine-stack align="center">
                                <x-mantine-action-icon size="xl" variant="light" c="pink">
                                    <i class="fas fa-paint-brush"></i>
                                </x-mantine-action-icon>
                                <x-mantine-text fw={700}>UI Components</x-mantine-text>
                                <x-mantine-text size="sm" c="dimmed" ta="center">
                                    100+ Mantine components ready to use with Laravel Livewire
                                </x-mantine-text>
                            </x-mantine-stack>
                        </x-mantine-paper>
                    </x-mantine-simple-grid>
                </x-mantine-stack>

                <!-- Getting Started -->
                <x-mantine-stack mt={100} mb={100} spacing="xl">
                    <x-mantine-title order="2" ta="center">Start Building Today</x-mantine-title>
                    
                    <x-mantine-group position="center">
                        <x-mantine-button size="lg" component="a" href="/docs/getting-started">
                            Read the docs
                        </x-mantine-button>
                        <x-mantine-button size="lg" variant="default" component="a" href="https://github.com/your-repo">
                            <x-mantine-group gap="xs">
                                <i class="fab fa-github"></i>
                                <span>View on GitHub</span>
                            </x-mantine-group>
                        </x-mantine-button>
                    </x-mantine-group>
                </x-mantine-stack>

                <!-- Footer -->
                <x-mantine-footer height={60}>
                    <x-mantine-container size="lg" h="100%">
                        <x-mantine-group position="apart" h="100%">
                            <x-mantine-text size="sm" c="dimmed">
                                © {{ date('Y') }} phpStack.dev. All rights reserved.
                            </x-mantine-text>
                            <x-mantine-group>
                                <x-mantine-action-icon size="lg" variant="subtle" component="a" href="https://github.com/your-repo">
                                    <i class="fab fa-github"></i>
                                </x-mantine-action-icon>
                                <x-mantine-action-icon size="lg" variant="subtle" component="a" href="https://twitter.com/your-account">
                                    <i class="fab fa-twitter"></i>
                                </x-mantine-action-icon>
                            </x-mantine-group>
                        </x-mantine-group>
                    </x-mantine-container>
                </x-mantine-footer>
            </x-mantine-container>
        </x-mantine-app-shell>
    </body>
</html>
