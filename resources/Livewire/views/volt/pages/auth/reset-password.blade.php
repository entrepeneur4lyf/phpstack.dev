<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state('token')->locked();

state([
    'email' => fn () => request()->string('email')->value(),
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'token' => ['required'],
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$resetPassword = function () {
    $this->validate();

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $status = Password::reset(
        $this->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) {
            $user->forceFill([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    if ($status != Password::PASSWORD_RESET) {
        $this->addError('email', __($status));

        return;
    }

    Session::flash('status', __($status));

    $this->redirectRoute('login', navigate: true);
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Reset password</x-mantine-title>
            <x-mantine-text c="dimmed" size="sm">
                Enter your new password
            </x-mantine-text>

            <form wire:submit="resetPassword">
                <!-- Email Address -->
                <x-mantine-text-input
                    wire:model="email"
                    type="email"
                    label="Email"
                    placeholder="your@email.com"
                    required
                    :error="$errors->get('email')"
                />

                <!-- Password -->
                <x-mantine-password-input
                    wire:model="password"
                    label="New Password"
                    placeholder="Your new password"
                    required
                    mt="md"
                    :error="$errors->get('password')"
                />

                <!-- Confirm Password -->
                <x-mantine-password-input
                    wire:model="password_confirmation"
                    label="Confirm Password"
                    placeholder="Confirm your new password"
                    required
                    mt="md"
                    :error="$errors->get('password_confirmation')"
                />

                <x-mantine-group justify="flex-end" mt="xl">
                    <x-mantine-button type="submit">
                        Reset password
                    </x-mantine-button>
                </x-mantine-group>
            </form>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
