<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'password' => '',
    'confirmModalOpened' => false
]);

rules(['password' => ['required', 'string', 'current_password']]);

$deleteUser = function (Logout $logout) {
    $this->validate();

    tap(Auth::user(), $logout(...))->delete();

    $this->redirect('/', navigate: true);
};

$openConfirmModal = fn () => $this->confirmModalOpened = true;
$closeConfirmModal = fn () => $this->confirmModalOpened = false;

?>

<x-mantine-paper shadow="sm" p="lg" radius="md">
    <x-mantine-stack>
        <!-- Header -->
        <div>
            <x-mantine-title order="3" c="red">
                {{ __('Delete Account') }}
            </x-mantine-title>

            <x-mantine-text size="sm" c="dimmed" mt="xs">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </x-mantine-text>
        </div>

        <!-- Delete Button -->
        <div>
            <x-mantine-button 
                color="red" 
                variant="light"
                wire:click="openConfirmModal"
            >
                {{ __('Delete Account') }}
            </x-mantine-button>
        </div>

        <!-- Confirmation Modal -->
        <x-mantine-modal
            title="Delete Account"
            :opened="$confirmModalOpened"
            wire:model="confirmModalOpened"
            size="lg"
        >
            <form wire:submit="deleteUser">
                <x-mantine-stack>
                    <!-- Warning Message -->
                    <x-mantine-text size="sm">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </x-mantine-text>

                    <!-- Password Confirmation -->
                    <x-mantine-password-input
                        wire:model="password"
                        label="Password"
                        required
                        :error="$errors->get('password')"
                    />

                    <!-- Actions -->
                    <x-mantine-group justify="flex-end" mt="lg">
                        <x-mantine-button 
                            variant="subtle" 
                            wire:click="closeConfirmModal"
                        >
                            {{ __('Cancel') }}
                        </x-mantine-button>

                        <x-mantine-button 
                            type="submit"
                            color="red"
                        >
                            {{ __('Delete Account') }}
                        </x-mantine-button>
                    </x-mantine-group>
                </x-mantine-stack>
            </form>
        </x-mantine-modal>
    </x-mantine-stack>
</x-mantine-paper>
