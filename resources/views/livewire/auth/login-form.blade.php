<x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
    <x-mantine-stack>
        <!-- Header -->
        <x-mantine-title order="2" ta="center">Welcome back</x-mantine-title>
        <x-mantine-text c="dimmed" size="sm" ta="center">
            Don't have an account? 
            <x-mantine-anchor href="{{ route('register') }}" wire:navigate>Sign up</x-mantine-anchor>
        </x-mantine-text>

        <!-- Session Status -->
        @if (session('status'))
            <x-mantine-alert color="blue" variant="light">
                {{ session('status') }}
            </x-mantine-alert>
        @endif

        <!-- Login Form -->
        <div wire:ignore>
            {{ $this->mingle() }}
        </div>
    </x-mantine-stack>
</x-mantine-paper>
