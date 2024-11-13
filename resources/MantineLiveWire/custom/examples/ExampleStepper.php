<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleStepper extends Component
{
    public $active = 1;
    public $highestStepVisited = 1;

    public function nextStep()
    {
        if ($this->active < 3) {
            $this->active++;
            $this->highestStepVisited = max($this->highestStepVisited, $this->active);
        }
    }

    public function prevStep()
    {
        if ($this->active > 0) {
            $this->active--;
        }
    }

    public function setStep($step)
    {
        if ($step >= 0 && $step <= 3) {
            $this->active = $step;
            $this->highestStepVisited = max($this->highestStepVisited, $step);
        }
    }

    public function shouldAllowSelectStep($step)
    {
        return $this->highestStepVisited >= $step && $this->active !== $step;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-stepper :active="$active" :on-step-click="fn($step) => $this->setStep($step)">
                    <x-mantine-stepper-step
                        label="First step"
                        description="Create an account"
                    >
                        Step 1 content: Create an account
                    </x-mantine-stepper-step>

                    <x-mantine-stepper-step
                        label="Second step"
                        description="Verify email"
                    >
                        Step 2 content: Verify email
                    </x-mantine-stepper-step>

                    <x-mantine-stepper-step
                        label="Final step"
                        description="Get full access"
                    >
                        Step 3 content: Get full access
                    </x-mantine-stepper-step>

                    <x-mantine-stepper-completed>
                        Completed, click back button to get to previous step
                    </x-mantine-stepper-completed>
                </x-mantine-stepper>

                <x-mantine-group justify="center" mt="xl">
                    <x-mantine-button
                        variant="default"
                        :on-click="fn() => $this->prevStep()"
                    >
                        Back
                    </x-mantine-button>

                    <x-mantine-button :on-click="fn() => $this->nextStep()">
                        Next step
                    </x-mantine-button>
                </x-mantine-group>

                <!-- With step selection control -->
                <div class="mt-8">
                    <x-mantine-stepper :active="$active" :on-step-click="fn($step) => $this->setStep($step)">
                        <x-mantine-stepper-step
                            label="First step"
                            description="Create an account"
                            :allow-step-select="$this->shouldAllowSelectStep(0)"
                        >
                            Step 1 content: Create an account
                        </x-mantine-stepper-step>

                        <x-mantine-stepper-step
                            label="Second step"
                            description="Verify email"
                            :allow-step-select="$this->shouldAllowSelectStep(1)"
                        >
                            Step 2 content: Verify email
                        </x-mantine-stepper-step>

                        <x-mantine-stepper-step
                            label="Final step"
                            description="Get full access"
                            :allow-step-select="$this->shouldAllowSelectStep(2)"
                        >
                            Step 3 content: Get full access
                        </x-mantine-stepper-step>
                    </x-mantine-stepper>
                </div>

                <!-- With custom icons -->
                <div class="mt-8">
                    <x-mantine-stepper
                        :active="$active"
                        :completed-icon="'<i class=\"fas fa-check\" style=\"width: 18px; height: 18px;\"></i>'"
                    >
                        <x-mantine-stepper-step
                            :icon="'<i class=\"fas fa-user-check\" style=\"width: 18px; height: 18px;\"></i>'"
                            label="Step 1"
                            description="Create an account"
                        />

                        <x-mantine-stepper-step
                            :icon="'<i class=\"fas fa-envelope-open\" style=\"width: 18px; height: 18px;\"></i>'"
                            label="Step 2"
                            description="Verify email"
                        />

                        <x-mantine-stepper-step
                            :icon="'<i class=\"fas fa-shield-alt\" style=\"width: 18px; height: 18px;\"></i>'"
                            label="Step 3"
                            description="Get full access"
                        />
                    </x-mantine-stepper>
                </div>

                <!-- Vertical orientation -->
                <div class="mt-8">
                    <x-mantine-stepper
                        :active="$active"
                        orientation="vertical"
                        :on-step-click="fn($step) => $this->setStep($step)"
                    >
                        <x-mantine-stepper-step
                            label="Step 1"
                            description="Create an account"
                        />

                        <x-mantine-stepper-step
                            label="Step 2"
                            description="Verify email"
                        />

                        <x-mantine-stepper-step
                            label="Step 3"
                            description="Get full access"
                        />
                    </x-mantine-stepper>
                </div>

                <!-- With loading state -->
                <div class="mt-8">
                    <x-mantine-stepper :active="1">
                        <x-mantine-stepper-step
                            label="Step 1"
                            description="Create an account"
                        />

                        <x-mantine-stepper-step
                            label="Step 2"
                            description="Verify email"
                            :loading="true"
                        />

                        <x-mantine-stepper-step
                            label="Step 3"
                            description="Get full access"
                        />
                    </x-mantine-stepper>
                </div>

                <!-- With error state -->
                <div class="mt-8">
                    <x-mantine-stepper :active="2">
                        <x-mantine-stepper-step
                            label="Step 1"
                            description="Create an account"
                        />

                        <x-mantine-stepper-step
                            label="Step 2"
                            description="Verify email"
                            color="red"
                            :completed-icon="'<i class=\"fas fa-times-circle\" style=\"width: 20px; height: 20px;\"></i>'"
                        />

                        <x-mantine-stepper-step
                            label="Step 3"
                            description="Get full access"
                        />
                    </x-mantine-stepper>
                </div>
            </div>
        blade;
    }
}
