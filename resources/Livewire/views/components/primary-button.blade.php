@props(['type' => 'submit'])

<x-mantine-button
    type="{{ $type }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-mantine-button>
