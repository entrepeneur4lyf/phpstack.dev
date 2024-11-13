<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleModalsProvider extends Component
{
    public function openConfirmModal()
    {
        $this->dispatch('openConfirmModal', [
            'title' => 'Please confirm your action',
            'children' => 'This action is so important that you are required to confirm it with a modal. Please click one of these buttons to proceed.',
            'labels' => ['confirm' => 'Confirm', 'cancel' => 'Cancel'],
            'onCancel' => 'handleCancel',
            'onConfirm' => 'handleConfirm',
        ]);
    }

    public function openDeleteModal()
    {
        $this->dispatch('openConfirmModal', [
            'title' => 'Delete your profile',
            'centered' => true,
            'children' => 'Are you sure you want to delete your profile? This action is destructive and you will have to contact support to restore your data.',
            'labels' => ['confirm' => 'Delete account', 'cancel' => "No don't delete it"],
            'confirmProps' => ['color' => 'red'],
            'onCancel' => 'handleCancel',
            'onConfirm' => 'handleDelete',
        ]);
    }

    public function openContextModal()
    {
        $this->dispatch('openContextModal', [
            'modal' => 'demonstration',
            'title' => 'Test modal from context',
            'innerProps' => [
                'modalBody' => 'This modal was defined in ModalsProvider, you can open it anywhere in your app',
            ],
        ]);
    }

    public function openContentModal()
    {
        $this->dispatch('openModal', [
            'title' => 'Subscribe to newsletter',
            'children' => [
                'component' => 'text-input',
                'props' => [
                    'label' => 'Your email',
                    'placeholder' => 'Your email',
                    'data-autofocus' => true,
                ],
            ],
            'buttons' => [
                [
                    'label' => 'Submit',
                    'color' => 'blue',
                    'fullWidth' => true,
                    'onClick' => 'handleSubmit',
                ],
            ],
        ]);
    }

    public function openMultiStepModal()
    {
        $this->dispatch('openConfirmModal', [
            'title' => 'Please confirm your action',
            'closeOnConfirm' => false,
            'labels' => ['confirm' => 'Next modal', 'cancel' => 'Close modal'],
            'children' => 'This action is so important that you are required to confirm it with a modal. Please click one of these buttons to proceed.',
            'onConfirm' => 'handleFirstStep',
        ]);
    }

    public function handleFirstStep()
    {
        $this->dispatch('openConfirmModal', [
            'title' => 'This is modal at second layer',
            'labels' => ['confirm' => 'Close all modals', 'cancel' => 'Back'],
            'closeOnConfirm' => false,
            'children' => 'When this modal is closed modals state will revert to first modal',
            'onConfirm' => 'closeAllModals',
        ]);
    }

    public function closeAllModals()
    {
        $this->dispatch('closeAll');
    }

    public function handleCancel()
    {
        // Handle cancel action
    }

    public function handleConfirm()
    {
        // Handle confirm action
    }

    public function handleDelete()
    {
        // Handle delete action
    }

    public function handleSubmit()
    {
        // Handle submit action
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Setup ModalsProvider with context modals -->
                <x-mantine-modals-provider
                    :modals="[
                        'demonstration' => [
                            'component' => 'test-modal',
                            'props' => [
                                'modalBody' => 'This modal was defined in ModalsProvider',
                            ],
                        ],
                    ]"
                    :labels="['confirm' => 'Submit', 'cancel' => 'Cancel']"
                >
                    <!-- Basic confirm modal -->
                    <div class="mb-8">
                        <x-mantine-button wire:click="openConfirmModal">
                            Open confirm modal
                        </x-mantine-button>
                    </div>

                    <!-- Delete confirmation modal -->
                    <div class="mb-8">
                        <x-mantine-button wire:click="openDeleteModal" color="red">
                            Delete account
                        </x-mantine-button>
                    </div>

                    <!-- Context modal -->
                    <div class="mb-8">
                        <x-mantine-button wire:click="openContextModal">
                            Open demonstration context modal
                        </x-mantine-button>
                    </div>

                    <!-- Content modal -->
                    <div class="mb-8">
                        <x-mantine-button wire:click="openContentModal">
                            Open content modal
                        </x-mantine-button>
                    </div>

                    <!-- Multiple steps modal -->
                    <div>
                        <x-mantine-button wire:click="openMultiStepModal">
                            Open multiple steps modal
                        </x-mantine-button>
                    </div>
                </x-mantine-modals-provider>
            </div>
        blade;
    }
}
