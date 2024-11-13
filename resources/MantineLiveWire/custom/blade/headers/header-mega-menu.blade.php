<x-mantine-layouts.base>
    <x-mantine-container>
        {{-- Based on https://ui.mantine.dev/category/headers --}}
        <x-mantine-header height="60" mb="md">
            @livewire(\App\Livewire\Layouts\HeaderMegaMenu::class)
        </x-mantine-header>

        <x-mantine-container>
            {{ $slot }}
        </x-mantine-container>
    </x-mantine-container>
</x-mantine-layouts.base>
