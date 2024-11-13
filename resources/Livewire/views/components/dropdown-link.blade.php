@props(['component' => 'a'])

<x-mantine-menu-item
    component="{{ $component }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-mantine-menu-item>
