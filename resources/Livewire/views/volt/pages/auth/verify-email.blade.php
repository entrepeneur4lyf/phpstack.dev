<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;

layout('layouts.guest');

$sendVerification = function () {
    if (Auth::user()->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

        return;
    }

    Auth::user()->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<div>
    <x-mantine-paper shadow="md" p="xl" radius="md" mx="auto" maw="500">
        <x-mantine-stack>
            <!-- Header -->
            <x-mantine-title order="2" ta="center">Verify your email</x-mantine-title>

            <!-- Main Message -->
            <x-mantine-text size="sm">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </x-mantine-text>

            <!-- Verification Status -->
            @if (session('status') == 'verification-link-sent')
                <x-mantine-alert color="green" variant="light">
                    A new verification link has been sent to the email address you provided during registration.
                </x-mantine-alert>
            @endif

            <x-mantine-group position="apart" mt="lg">
                <!-- Resend Button -->
                <x-mantine-button wire:click="sendVerification">
                    Resend Verification Email
                </x-mantine-button>

                <!-- Logout Button -->
                <x-mantine-button wire:click="logout" variant="subtle" color="gray">
                    Log Out
                </x-mantine-button>
            </x-mantine-group>
        </x-mantine-stack>
    </x-mantine-paper>
</div>
