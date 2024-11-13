@props(['active'])

<x-mantine-anchor
    {{ $attributes->merge([
        'variant' => $active ? 'filled' : 'subtle',
        'fw' => $active ? '600' : '400'
    ]) }}
>
    {{ $slot }}
</x-mantine-anchor>
