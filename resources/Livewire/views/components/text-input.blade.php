@props(['disabled' => false])

<x-mantine-text-input
    {{ $attributes->merge(['disabled' => $disabled]) }}
/>
