@props(['type' => 'button'])

<x-mantine-button
    type="{{ $type }}"
    variant="light"
    {{ $attributes }}
>
    {{ $slot }}
</x-mantine-button>
