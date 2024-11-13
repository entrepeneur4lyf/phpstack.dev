<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $this->redirect(route('dashboard', absolute: false), navigate: true);
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Create an account</x-mantine-title>
            <x-mantine-text c="dimmed" size="sm" ta="center">
                Already have an account? 
                <x-mantine-anchor href="{{ route('login') }}" wire:navigate>Log in</x-mantine-anchor>
            </x-mantine-text>

            <form wire:submit="register">
                <!-- Name -->
                <x-mantine-text-input
                    wire:model="name"
                    label="Name"
                    placeholder="Your name"
                    required
                    :error="$errors->get('name')"
                />

                <!-- Email Address -->
                <x-mantine-text-input
                    wire:model="email"
                    type="email"
                    label="Email"
                    placeholder="your@email.com"
                    required
                    mt="md"
                    :error="$errors->get('email')"
                />

                <!-- Password -->
                <x-mantine-password-input
                    wire:model="password"
                    label="Password"
                    placeholder="Your password"
                    required
                    mt="md"
                    :error="$errors->get('password')"
                />

                <!-- Confirm Password -->
                <x-mantine-password-input
                    wire:model="password_confirmation"
                    label="Confirm Password"
                    placeholder="Confirm your password"
                    required
                    mt="md"
                    :error="$errors->get('password_confirmation')"
                />

                <x-mantine-group justify="flex-end" mt="xl">
                    <x-mantine-button type="submit">
                        Register
                    </x-mantine-button>
                </x-mantine-group>
            </form>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
