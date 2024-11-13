<x-mantine-app-shell>
    <x-mantine-container size="lg" py="xl">
        <x-mantine-title order="2" mb="lg">
            {{ __('Dashboard') }}
        </x-mantine-title>

        <x-mantine-paper shadow="sm" radius="md" p="lg">
            <x-mantine-text>
                {{ __("You're logged in!") }}
            </x-mantine-text>
        </x-mantine-paper>
    </x-mantine-container>
</x-mantine-app-shell>
