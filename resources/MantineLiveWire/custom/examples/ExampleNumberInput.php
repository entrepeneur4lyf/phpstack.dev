<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNumberInput extends Component
{
    public $value = '';

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic number input -->
                <x-mantine-number-input
                    label="Basic input"
                    placeholder="Enter a number"
                    wire:model="value"
                />

                <!-- With min and max -->
                <x-mantine-number-input
                    label="Enter value between 10 and 20"
                    placeholder="Value between 10 and 20"
                    :min="10"
                    :max="20"
                    class="mt-4"
                />

                <!-- With strict clamp behavior -->
                <x-mantine-number-input
                    label="Strict clamp behavior"
                    placeholder="Cannot enter values outside range"
                    clamp-behavior="strict"
                    :min="0"
                    :max="100"
                    class="mt-4"
                />

                <!-- With prefix and suffix -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="With prefix"
                            placeholder="Dollars"
                            prefix="$"
                            :default-value="100"
                        />
                        <x-mantine-number-input
                            label="With suffix"
                            placeholder="Percents"
                            suffix="%"
                            :default-value="100"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Decimal configuration -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="No decimals allowed"
                            :allow-decimal="false"
                            placeholder="Integers only"
                        />
                        <x-mantine-number-input
                            label="Two decimal places"
                            :decimal-scale="2"
                            placeholder="Up to 2 decimals"
                        />
                        <x-mantine-number-input
                            label="Fixed decimal scale"
                            :decimal-scale="2"
                            :fixed-decimal-scale="true"
                            :default-value="2.2"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Thousand separators -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="With comma separator"
                            thousand-separator=","
                            :default-value="1000000"
                        />
                        <x-mantine-number-input
                            label="With space separator"
                            thousand-separator=" "
                            :default-value="1000000"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With sections -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="With left section"
                            :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                            :left-section-pointer-events="'none'"
                        />
                        <x-mantine-number-input
                            label="With right section"
                            :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                            :right-section-pointer-events="'none'"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Controls configuration -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="Hidden controls"
                            :hide-controls="true"
                            placeholder="No increment/decrement"
                        />
                        <x-mantine-number-input
                            label="Step on hold"
                            :step-hold-delay="500"
                            :step-hold-interval="100"
                            placeholder="Hold to increment/decrement"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-number-input
                            label="With error"
                            error="This field is required"
                            placeholder="Error state"
                        />
                    </x-mantine-stack>
                </div>

                <!-- Disabled state -->
                <x-mantine-number-input
                    label="Disabled input"
                    :disabled="true"
                    placeholder="Cannot type here"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
