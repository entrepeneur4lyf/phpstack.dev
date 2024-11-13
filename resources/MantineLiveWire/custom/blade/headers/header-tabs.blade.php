<x-mantine-layouts.base>
    <x-mantine-container>
        {{-- Based on https://ui.mantine.dev/category/headers --}}
        <x-mantine-header height="100" mb="md">
            @livewire(\App\Livewire\Layouts\HeaderTabs::class)
        </x-mantine-header>

        <x-mantine-container>
            {{ $slot }}
        </x-mantine-container>
    </x-mantine-container>
</x-mantine-layouts.base>
