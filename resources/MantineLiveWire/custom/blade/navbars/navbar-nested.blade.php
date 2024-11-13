<x-mantine-layouts.base>
    <div class="flex">
        {{-- Based on https://ui.mantine.dev/category/navbars --}}
        @livewire(\App\Livewire\Layouts\NavbarNested::class)

        <main class="flex-1 p-4">
            {{ $slot }}
        </main>
    </div>
</x-mantine-layouts.base>
