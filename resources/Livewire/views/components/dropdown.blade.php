@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1'
])

@php
$position = match ($align) {
    'left' => 'bottom-start',
    'right' => 'bottom-end',
    default => 'bottom'
};

$width = match ($width) {
    '48' => '200px',
    default => $width
};
@endphp

<x-mantine-menu position="{{ $position }}" width="{{ $width }}">
    <x-slot name="trigger">
        {{ $trigger }}
    </x-slot>

    {{ $content }}
</x-mantine-menu>
