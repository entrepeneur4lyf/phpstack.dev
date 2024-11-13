<?php

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use function Livewire\Volt\state;

state([
    'name' => fn () => auth()->user()->name,
    'email' => fn () => auth()->user()->email
]);

$updateProfileInformation = function () {
    $user = Auth::user();

    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
    ]);

    $user->fill($validated);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    $this->dispatch('profile-updated', name: $user->name);
};

$sendVerification = function () {
    $user = Auth::user();

    if ($user->hasVerifiedEmail()) {
        $this->redirectIntended(default: route('dashboard', absolute: false));

        return;
    }

    $user->sendEmailVerificationNotification();

    Session::flash('status', 'verification-link-sent');
};

?>

<x-mantine-paper shadow="sm" p="lg" radius="md">
    <x-mantine-stack>
        <!-- Header -->
        <div>
            <x-mantine-title order="3">
                {{ __('Profile Information') }}
            </x-mantine-title>

            <x-mantine-text size="sm" c="dimmed" mt="xs">
                {{ __("Update your account's profile information and email address.") }}
            </x-mantine-text>
        </div>

        <form wire:submit="updateProfileInformation">
            <x-mantine-stack>
                <!-- Name -->
                <x-mantine-text-input
                    wire:model="name"
                    label="Name"
                    placeholder="Your name"
                    required
                    :error="$errors->get('name')"
                />

                <!-- Email -->
                <div>
                    <x-mantine-text-input
                        wire:model="email"
                        type="email"
                        label="Email"
                        placeholder="your@email.com"
                        required
                        :error="$errors->get('email')"
                    />

                    @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                        <x-mantine-alert color="yellow" variant="light" mt="sm">
                            <x-mantine-group justify="space-between" align="center">
                                {{ __('Your email address is unverified.') }}

                                <x-mantine-button 
                                    wire:click.prevent="sendVerification"
                                    variant="light"
                                    size="xs"
                                >
                                    {{ __('Resend verification email') }}
                                </x-mantine-button>
                            </x-mantine-group>
                        </x-mantine-alert>

                        @if (session('status') === 'verification-link-sent')
                            <x-mantine-alert color="green" variant="light" mt="sm">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </x-mantine-alert>
                        @endif
                    @endif
                </div>

                <!-- Actions -->
                <x-mantine-group justify="flex-end" mt="lg">
                    @if (session('status') === 'profile-updated')
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
