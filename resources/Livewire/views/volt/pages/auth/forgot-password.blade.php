<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink(
        $this->only('email')
    );

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="400">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Forgot password</x-mantine-title>
            <x-mantine-text c="dimmed" size="sm">
                Enter your email to get a reset link
            </x-mantine-text>

            <!-- Session Status -->
            @if (session('status'))
                <x-mantine-alert color="blue" variant="light">
                    {{ session('status') }}
                </x-mantine-alert>
            @endif

            <form wire:submit="sendPasswordResetLink">
                <!-- Email Address -->
                <x-mantine-text-input
                    wire:model="email"
                    type="email"
                    label="Email"
                    placeholder="your@email.com"
                    required
                    :error="$errors->get('email')"
                />

                <x-mantine-group position="apart" mt="lg">
                    <x-mantine-anchor href="{{ route('login') }}" wire:navigate size="sm">
                        Back to login
                    </x-mantine-anchor>

                    <x-mantine-button type="submit">
                        Send reset link
                    </x-mantine-button>
                </x-mantine-group>
            </form>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
