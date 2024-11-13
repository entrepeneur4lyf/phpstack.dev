<x-mantine-layouts.base>
    <div class="min-h-screen flex flex-col">
        <main class="flex-1">
            {{ $slot }}
        </main>

        {{-- Based on https://ui.mantine.dev/category/footers --}}
        @livewire(\App\Livewire\Layouts\FooterCentered::class)
    </div>
</x-mantine-layouts.base>
