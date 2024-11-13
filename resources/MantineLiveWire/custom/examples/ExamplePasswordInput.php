<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePasswordInput extends Component
{
    public $password = '';
    public $confirmPassword = '';
    public $visible = false;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic password input -->
                <x-mantine-password-input
                    label="Password"
                    placeholder="Enter your password"
                    wire:model="password"
                />

                <!-- With visibility toggle sync -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-password-input
                            label="Password"
                            :default-value="'secret'"
                            :visible="$visible"
                            wire:visibility-change="visible"
                        />
                        <x-mantine-password-input
                            label="Confirm password"
                            :default-value="'secret'"
                            :visible="$visible"
                            wire:visibility-change="visible"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With custom visibility toggle icon -->
                <x-mantine-password-input
                    label="Custom toggle icon"
                    placeholder="Enter password"
                    :visibility-toggle-icon='function ($reveal) {
                        return $reveal
                            ? "<svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M3 3l18 18M12 7c3.312 0 6 2.688 6 6m-6-3v3\"/></svg>"
                            : "<svg width=\"16\" height=\"16\" viewBox=\"0 0 24 24\"><path d=\"M12 5c3.312 0 6 2.688 6 6m-6-3v3\"/></svg>";
                    }'
                    class="mt-4"
                />

                <!-- Password strength meter -->
                <div class="mt-4">
                    <x-mantine-popover :width="'target'" transition="pop">
                        <x-mantine-popover-target>
                            <div x-on:focus="$wire.set('showStrength', true)" x-on:blur="$wire.set('showStrength', false)">
                                <x-mantine-password-input
                                    label="Password with strength meter"
                                    placeholder="Enter strong password"
                                    wire:model.live="password"
                                    :with-asterisk="true"
                                />
                            </div>
                        </x-mantine-popover-target>

                        <x-mantine-popover-dropdown>
                            <x-mantine-progress
                                :color="$this->getStrengthColor()"
                                :value="$this->getStrengthValue()"
                                size="5"
                                class="mb-2"
                            />
                            <x-mantine-text size="sm" :c="$this->meetsLength() ? 'teal' : 'red'" class="flex items-center">
                                <x-mantine-icon
                                    :name="$this->meetsLength() ? 'check' : 'x'"
                                    :size="14"
                                    class="mr-2"
                                />
                                Includes at least 6 characters
                            </x-mantine-text>
                            @foreach($this->requirements as $requirement)
                                <x-mantine-text size="sm" :c="$requirement['meets'] ? 'teal' : 'red'" class="flex items-center mt-2">
                                    <x-mantine-icon
                                        :name="$requirement['meets'] ? 'check' : 'x'"
                                        :size="14"
                                        class="mr-2"
                                    />
                                    {{ $requirement['label'] }}
                                </x-mantine-text>
                            @endforeach
                        </x-mantine-popover-dropdown>
                    </x-mantine-popover>
                </div>

                <!-- With sections -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-password-input
                            label="With left section"
                            :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                            :left-section-pointer-events="'none'"
                        />
                        <x-mantine-password-input
                            label="With right section"
                            :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                            :right-section-pointer-events="'none'"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-password-input
                            label="With error"
                            error="Password is required"
                            placeholder="Error state"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Disabled state -->
                <x-mantine-password-input
                    label="Disabled input"
                    :disabled="true"
                    placeholder="Cannot type here"
                    class="mt-4"
                />
            </div>
        blade;
    }

    protected function requirements()
    {
        return [
            ['re' => '/[0-9]/', 'label' => 'Includes number'],
            ['re' => '/[a-z]/', 'label' => 'Includes lowercase letter'],
            ['re' => '/[A-Z]/', 'label' => 'Includes uppercase letter'],
            ['re' => '/[$&+,:;=?@#|\'<>.^*()%!-]/', 'label' => 'Includes special symbol'],
        ];
    }

    public function meetsLength()
    {
        return strlen($this->password) > 5;
    }

    public function getStrengthValue()
    {
        $multiplier = $this->meetsLength() ? 0 : 1;

        foreach ($this->requirements as $requirement) {
            if (!preg_match($requirement['re'], $this->password)) {
                $multiplier++;
            }
        }

        return max(100 - (100 / (count($this->requirements) + 1)) * $multiplier, 10);
    }

    public function getStrengthColor()
    {
        $strength = $this->getStrengthValue();
        return $strength === 100 ? 'teal' : ($strength > 50 ? 'yellow' : 'red');
    }
}
