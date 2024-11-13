@props(['status'])

@if ($status)
    <x-mantine-alert color="blue" variant="light" mb="md">
        {{ $status }}
    </x-mantine-alert>
@endif
