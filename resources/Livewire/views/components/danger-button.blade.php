@props(['type' => 'submit'])

<x-mantine-button
    type="{{ $type }}"
    color="red"
    {{ $attributes }}
>
    {{ $slot }}
</x-mantine-button>
