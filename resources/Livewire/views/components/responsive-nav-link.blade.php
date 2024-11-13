@props(['active'])

<x-mantine-button
    {{ $attributes->merge([
        'variant' => $active ? 'light' : 'subtle',
        'color' => $active ? 'blue' : 'gray',
        'fullWidth' => true,
        'justify' => 'start',
        'fw' => $active ? '600' : '400'
    ]) }}
>
    {{ $slot }}
</x-mantine-button>
