@props(['messages'])

@if ($messages)
    <x-mantine-text size="sm" c="red" mt="xs">
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </x-mantine-text>
@endif
