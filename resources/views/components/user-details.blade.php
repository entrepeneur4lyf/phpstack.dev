<div class="p-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-mantine-text size="sm" color="dimmed">Profile</x-mantine-text>
            <x-mantine-paper shadow="sm" p="md" mt="xs" withBorder>
                <div class="flex items-center space-x-4">
                    <x-mantine-avatar
                        size="lg"
                        radius="xl"
                        :src="$user->avatar_url ?? null"
                        :alt="$user->name"
                    >
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </x-mantine-avatar>
                    <div>
                        <x-mantine-text size="lg" weight={500}>{{ $user->name }}</x-mantine-text>
                        <x-mantine-text size="sm" color="dimmed">{{ $user->email }}</x-mantine-text>
                    </div>
                </div>
            </x-mantine-paper>
        </div>

        <div>
            <x-mantine-text size="sm" color="dimmed">Settings</x-mantine-text>
            <x-mantine-paper shadow="sm" p="md" mt="xs" withBorder>
                <div class="space-y-3">
                    <div>
                        <x-mantine-text size="sm" weight={500}>Theme Preference</x-mantine-text>
                        <x-mantine-badge
                            size="lg"
                            radius="sm"
                            variant="light"
                            :color="$user->color_scheme === 'dark' ? 'dark' : ($user->color_scheme === 'auto' ? 'gray' : 'blue')"
                        >
                            {{ ucfirst($user->color_scheme) }}
                        </x-mantine-badge>
                    </div>

                    <div>
                        <x-mantine-text size="sm" weight={500}>Account Created</x-mantine-text>
                        <x-mantine-text size="sm" color="dimmed">
                            {{ $user->created_at->format('F j, Y \a\t g:i A') }}
                        </x-mantine-text>
                    </div>

                    <div>
                        <x-mantine-text size="sm" weight={500}>Last Updated</x-mantine-text>
                        <x-mantine-text size="sm" color="dimmed">
                            {{ $user->updated_at->format('F j, Y \a\t g:i A') }}
                        </x-mantine-text>
                    </div>
                </div>
            </x-mantine-paper>
        </div>
    </div>

    <div class="mt-4">
        <x-mantine-text size="sm" color="dimmed">Actions</x-mantine-text>
        <x-mantine-paper shadow="sm" p="md" mt="xs" withBorder>
            <div class="flex space-x-2">
                <x-mantine-button
                    variant="light"
                    color="blue"
                    size="sm"
                    leftIcon="edit"
                    wire:click="editUser({{ $user->id }})"
                >
                    Edit Profile
                </x-mantine-button>

                <x-mantine-button
                    variant="light"
                    color="red"
                    size="sm"
                    leftIcon="trash"
                    wire:click="deleteUser({{ $user->id }})"
                    :disabled="$user->id === 1"
                >
                    Delete Account
                </x-mantine-button>

                <x-mantine-button
                    variant="light"
                    color="gray"
                    size="sm"
                    leftIcon="key"
                    wire:click="resetPassword({{ $user->id }})"
                >
                    Reset Password
                </x-mantine-button>
            </div>
        </x-mantine-paper>
    </div>
</div>
