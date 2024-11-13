<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['password' => '']);

rules(['password' => ['required', 'string']]);

$confirmPassword = function () {
    $this->validate();

    if (! Auth::guard('web')->validate([
        'email' => Auth::user()->email,
        'password' => $this->password,
    ])) {
        throw ValidationException::withMessages([
            'password' => __('auth.password'),
        ]);
    }

    session(['auth.password_confirmed_at' => time()]);

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Confirm password</x-mantine-title>

            <!-- Description -->
            <x-mantine-text size="sm" c="dimmed">
                This is a secure area of the application. Please confirm your password before continuing.
            </x-mantine-text>

            <form wire:submit="confirmPassword">
                <!-- Password -->
                <x-mantine-password-input
                    wire:model="password"
                    label="Password"
                    placeholder="Your password"
                    required
                    :error="$errors->get('password')"
                />

                <x-mantine-group justify="flex-end" mt="xl">
                    <x-mantine-button type="submit">
                        Confirm
                    </x-mantine-button>
                </x-mantine-group>
            </form>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
