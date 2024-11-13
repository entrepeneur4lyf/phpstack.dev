<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFocusTrap extends Component
{
    public $active = false;
    public $modalOpened = false;

    public function toggle()
    {
        $this->active = !$this->active;
    }

    public function toggleModal()
    {
        $this->modalOpened = !$this->modalOpened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-button wire:click="toggle">
                            {{ $active ? 'Deactivate' : 'Activate' }} focus trap
                        </x-mantine-button>

                        <x-mantine-focus-trap :active="$active">
                            <div>
                                <x-mantine-text-input
                                    mt="sm"
                                    label="First input"
                                    placeholder="First input"
                                />
                                <x-mantine-text-input
                                    mt="sm"
                                    label="Second input"
                                    placeholder="Second input"
                                />
                                <x-mantine-text-input
                                    mt="sm"
                                    label="Third input"
                                    placeholder="Third input"
                                />
                            </div>
                        </x-mantine-focus-trap>
                    </x-mantine-box>
                </div>

                <!-- With initial focus -->
                <div class="mt-8">
                    <x-mantine-box maw="400" mx="auto">
                        <x-mantine-button wire:click="toggle">
                            {{ $active ? 'Deactivate' : 'Activate' }} focus trap
                        </x-mantine-button>

                        <x-mantine-focus-trap :active="$active">
                            <div>
                                <x-mantine-text-input
                                    mt="sm"
                                    label="First input"
                                    placeholder="First input"
                                />
                                <x-mantine-text-input
                                    mt="sm"
                                    label="Second input"
                                    placeholder="Second input"
                                    data-autofocus
                                />
                                <x-mantine-text-input
                                    mt="sm"
                                    label="Third input"
                                    placeholder="Third input"
                                />
                            </div>
                        </x-mantine-focus-trap>
                    </x-mantine-box>
                </div>

                <!-- With FocusTrap.InitialFocus in Modal -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$modalOpened"
                        title="Focus demo"
                        wire:click="toggleModal"
                    >
                        <x-mantine-focus-trap-initial-focus />
                        <x-mantine-text-input
                            label="First input"
                            placeholder="First input"
                        />
                        <x-mantine-text-input
                            data-autofocus
                            label="Input with initial focus"
                            placeholder="It has data-autofocus attribute"
                            mt="md"
                        />
                    </x-mantine-modal>

                    <x-mantine-button wire:click="toggleModal">
                        Open modal
                    </x-mantine-button>
                </div>
            </div>
        blade;
    }
}
