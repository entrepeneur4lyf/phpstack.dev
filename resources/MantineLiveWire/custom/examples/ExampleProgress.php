<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleProgress extends Component
{
    public $value = 50;
    public $password = '';

    public function setRandomValue()
    {
        $this->value = rand(0, 100);
    }

    public function getPasswordStrength()
    {
        $requirements = [
            '/[0-9]/',          // Includes number
            '/[a-z]/',          // Includes lowercase letter
            '/[A-Z]/',          // Includes uppercase letter
            '/[$&+,:;=?@#|\'<>.^*()%!-]/', // Includes special symbol
        ];

        if (strlen($this->password) < 5) {
            return 10;
        }

        $multiplier = strlen($this->password) > 5 ? 0 : 1;

        foreach ($requirements as $requirement) {
            if (!preg_match($requirement, $this->password)) {
                $multiplier++;
            }
        }

        return max(100 - (100 / (count($requirements) + 1)) * $multiplier, 10);
    }

    public function getStrengthColor($strength)
    {
        if ($strength < 30) return 'red';
        if ($strength < 50) return 'orange';
        if ($strength < 70) return 'yellow';
        return 'teal';
    }

    public function render()
    {
        $strength = $this->getPasswordStrength();
        $color = $this->getStrengthColor($strength);

        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-progress :value="$value" />

                <!-- With different styles -->
                <div class="mt-4">
                    <x-mantine-progress
                        :value="75"
                        size="xl"
                        radius="xl"
                        color="grape"
                        :striped="true"
                        :animated="true"
                    />
                </div>

                <!-- With transition -->
                <div class="mt-4">
                    <x-mantine-progress
                        :value="$value"
                        size="lg"
                        :transition-duration="200"
                    />
                    <x-mantine-button
                        :on-click="fn() => $this->setRandomValue()"
                        class="mt-4"
                    >
                        Set random value
                    </x-mantine-button>
                </div>

                <!-- Compound usage with sections -->
                <div class="mt-4">
                    <x-mantine-progress-root size="xl">
                        <x-mantine-progress-section value="35" color="cyan">
                            <x-mantine-progress-label>
                                Documents
                            </x-mantine-progress-label>
                        </x-mantine-progress-section>

                        <x-mantine-progress-section value="28" color="pink">
                            <x-mantine-progress-label>
                                Photos
                            </x-mantine-progress-label>
                        </x-mantine-progress-section>

                        <x-mantine-progress-section value="15" color="orange">
                            <x-mantine-progress-label>
                                Other
                            </x-mantine-progress-label>
                        </x-mantine-progress-section>
                    </x-mantine-progress-root>
                </div>

                <!-- With tooltips -->
                <div class="mt-4">
                    <x-mantine-progress-root :size="40">
                        <x-mantine-tooltip label="Documents – 33Gb">
                            <x-mantine-progress-section value="33" color="cyan">
                                <x-mantine-progress-label>
                                    Documents
                                </x-mantine-progress-label>
                            </x-mantine-progress-section>
                        </x-mantine-tooltip>

                        <x-mantine-tooltip label="Photos – 28Gb">
                            <x-mantine-progress-section value="28" color="pink">
                                <x-mantine-progress-label>
                                    Photos
                                </x-mantine-progress-label>
                            </x-mantine-progress-section>
                        </x-mantine-tooltip>

                        <x-mantine-tooltip label="Other – 15Gb">
                            <x-mantine-progress-section value="15" color="orange">
                                <x-mantine-progress-label>
                                    Other
                                </x-mantine-progress-label>
                            </x-mantine-progress-section>
                        </x-mantine-tooltip>
                    </x-mantine-progress-root>
                </div>

                <!-- Password strength example -->
                <div class="mt-4">
                    <x-mantine-password-input
                        wire:model.live="password"
                        placeholder="Enter password"
                        label="Enter password"
                    />

                    <x-mantine-group grow gap="5" mt="xs">
                        <x-mantine-progress
                            size="xs"
                            :color="$color"
                            :value="strlen($password) > 0 ? 100 : 0"
                            :transition-duration="0"
                        />
                        <x-mantine-progress
                            size="xs"
                            :color="$color"
                            :transition-duration="0"
                            :value="$strength < 30 ? 0 : 100"
                        />
                        <x-mantine-progress
                            size="xs"
                            :color="$color"
                            :transition-duration="0"
                            :value="$strength < 50 ? 0 : 100"
                        />
                        <x-mantine-progress
                            size="xs"
                            :color="$color"
                            :transition-duration="0"
                            :value="$strength < 70 ? 0 : 100"
                        />
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
