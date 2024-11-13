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
        <x-mantine-app-shell
            header="{{ config('app.name') }}"
            :navbar="[
                ['label' => 'Dashboard', 'icon' => 'home', 'href' => '/'],
                ['label' => 'Users', 'icon' => 'users', 'href' => '/users'],
                ['label' => 'Settings', 'icon' => 'settings', 'href' => '/settings'],
            ]"
        >
            {{ $slot }}
        </x-mantine-app-shell>
    </x-mantine-provider>
</body>
</html>
