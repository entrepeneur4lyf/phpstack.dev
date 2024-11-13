<x-mantine-group justify="flex-end">
    @auth
        <x-mantine-button
            component="a"
            href="{{ url('/dashboard') }}"
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
