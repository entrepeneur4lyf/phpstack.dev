<x-mantine-app-shell>
    <x-mantine-container size="lg" py="xl">
        <x-mantine-title order="2" mb="xl">
            {{ __('Profile') }}
        </x-mantine-title>

        <x-mantine-stack spacing="lg">
            <x-mantine-paper shadow="sm" radius="md" p="lg" maw="600">
                <livewire:profile.update-profile-information-form />
            </x-mantine-paper>

            <x-mantine-paper shadow="sm" radius="md" p="lg" maw="600">
                <livewire:profile.update-password-form />
            </x-mantine-paper>

            <x-mantine-paper shadow="sm" radius="md" p="lg" maw="600">
                <livewire:profile.delete-user-form />
            </x-mantine-paper>
        </x-mantine-stack>
    </x-mantine-container>
</x-mantine-app-shell>
