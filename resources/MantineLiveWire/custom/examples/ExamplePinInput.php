<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePinInput extends Component
{
    public $pin = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic pin input -->
                <x-mantine-pin-input
                    wire:model="pin"
                    aria-label="Pin input"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-pin-input size="xs" aria-label="Extra small" />
                        <x-mantine-pin-input size="sm" aria-label="Small" />
                        <x-mantine-pin-input size="md" aria-label="Medium" />
                        <x-mantine-pin-input size="lg" aria-label="Large" />
                        <x-mantine-pin-input size="xl" aria-label="Extra large" />
                    </x-mantine-stack>
                </div>

                <!-- Custom length -->
                <x-mantine-pin-input
                    :length="6"
                    aria-label="Six digit pin"
                    class="mt-4"
                />

                <!-- With mask -->
                <x-mantine-pin-input
                    :mask="true"
                    aria-label="Masked pin"
                    class="mt-4"
                />

                <!-- With placeholder -->
                <x-mantine-pin-input
                    placeholder="0"
                    aria-label="With placeholder"
                    class="mt-4"
                />

                <!-- Disabled state -->
                <x-mantine-pin-input
                    :disabled="true"
                    aria-label="Disabled input"
                    class="mt-4"
                />

                <!-- With error -->
                <x-mantine-pin-input
                    error="Invalid pin"
                    aria-label="Error state"
                    class="mt-4"
                />

                <!-- With regex type -->
                <x-mantine-pin-input
                    :type="/^[0-3]*$/"
                    input-type="tel"
                    input-mode="numeric"
                    aria-label="Numbers 0-3 only"
                    class="mt-4"
                />

                <!-- One time code -->
                <x-mantine-pin-input
                    :one-time-code="true"
                    aria-label="One time code"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
