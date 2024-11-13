<x-mantine-layouts.base>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        {{-- Based on https://ui.mantine.dev/category/error-pages --}}
        @livewire(\App\Livewire\Layouts\ServerOverload::class)
    </div>
</x-mantine-layouts.base>
