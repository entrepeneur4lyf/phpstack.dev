<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Welcome back</x-mantine-title>
            <x-mantine-text c="dimmed" size="sm" ta="center">
                Don't have an account? 
                <x-mantine-anchor href="{{ route('register') }}" wire:navigate>Sign up</x-mantine-anchor>
            </x-mantine-text>

            <!-- Session Status -->
            @if (session('status'))
                <x-mantine-alert color="blue" variant="light">
                    {{ session('status') }}
                </x-mantine-alert>
            @endif

            <form wire:submit="login">
                <!-- Email Address -->
                <x-mantine-text-input
                    wire:model="form.email"
                    type="email"
                    label="Email"
                    placeholder="your@email.com"
                    required
                    :error="$errors->get('form.email')"
                />

                <!-- Password -->
                <x-mantine-password-input
                    wire:model="form.password"
                    label="Password"
                    placeholder="Your password"
                    required
                    mt="md"
                    :error="$errors->get('form.password')"
                />

                <!-- Remember Me -->
                <x-mantine-checkbox
                    wire:model="form.remember"
                    label="Remember me"
                    mt="md"
                />

                <x-mantine-group justify="space-between" mt="md">
                    @if (Route::has('password.request'))
                        <x-mantine-anchor href="{{ route('password.request') }}" wire:navigate size="sm">
                            Forgot password?
                        </x-mantine-anchor>
                    @endif

                    <x-mantine-button type="submit">
                        Log in
                    </x-mantine-button>
                </x-mantine-group>
            </form>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
