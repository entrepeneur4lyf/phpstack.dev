<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <x-mantine-provider>
        <x-mantine-container size="xs" class="min-h-screen flex items-center">
            <x-mantine-paper shadow="md" p="xl" radius="md" class="w-full">
                {{ $slot }}
            </x-mantine-paper>
        </x-mantine-container>
    </x-mantine-provider>
</body>
</html>
