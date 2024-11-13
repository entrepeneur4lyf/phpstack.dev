@props(['value'])

<x-mantine-input-label {{ $attributes }}>
    {{ $value ?? $slot }}
</x-mantine-input-label>
