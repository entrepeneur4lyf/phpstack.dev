<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'current_password' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'current_password' => ['required', 'string', 'current_password'],
    'password' => ['required', 'string', Password::defaults(), 'confirmed'],
]);

$updatePassword = function () {
    try {
        $validated = $this->validate();
    } catch (ValidationException $e) {
        $this->reset('current_password', 'password', 'password_confirmation');

        throw $e;
    }

    Auth::user()->update([
        'password' => Hash::make($validated['password']),
    ]);

    $this->reset('current_password', 'password', 'password_confirmation');

    $this->dispatch('password-updated');
};

?>

<x-mantine-paper shadow="sm" p="lg" radius="md">
    <x-mantine-stack>
        <!-- Header -->
        <div>
            <x-mantine-title order="3">
                {{ __('Update Password') }}
            </x-mantine-title>

            <x-mantine-text size="sm" c="dimmed" mt="xs">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </x-mantine-text>
        </div>

        <form wire:submit="updatePassword">
            <x-mantine-stack>
                <!-- Current Password -->
                <x-mantine-password-input
                    wire:model="current_password"
                    label="Current Password"
                    required
                    :error="$errors->get('current_password')"
                />

                <!-- New Password -->
                <x-mantine-password-input
                    wire:model="password"
                    label="New Password"
                    required
                    :error="$errors->get('password')"
                />

                <!-- Confirm Password -->
                <x-mantine-password-input
                    wire:model="password_confirmation"
                    label="Confirm Password"
                    required
                    :error="$errors->get('password_confirmation')"
                />

                <!-- Actions -->
                <x-mantine-group justify="flex-end" mt="lg">
                    @if (session('status') === 'password-updated')
                        <x-mantine-text size="sm" c="dimmed">
                            {{ __('Saved.') }}
                        </x-mantine-text>
                    @endif

                    <x-mantine-button type="submit">
                        {{ __('Save') }}
                    </x-mantine-button>
                </x-mantine-group>
            </x-mantine-stack>
        </form>
    </x-mantine-stack>
</x-mantine-paper>
