<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleNumberFormatter extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-number-formatter
                        prefix="$ "
                        :value="1000000"
                        :thousand-separator="true"
                    />
                </div>

                <!-- With prefix and suffix -->
                <div class="mt-8">
                    <div>
                        With prefix:
                        <x-mantine-number-formatter
                            prefix="$ "
                            :value="100"
                        />
                    </div>

                    <div>
                        With suffix:
                        <x-mantine-number-formatter
                            :value="100"
                            suffix=" RUB"
                        />
                    </div>
                </div>

                <!-- With different separators -->
                <div class="mt-8">
                    <div>
                        With default separator:
                        <x-mantine-number-formatter
                            :thousand-separator="true"
                            :value="1000000"
                        />
                    </div>

                    <div>
                        With custom separator:
                        <x-mantine-number-formatter
                            thousand-separator="."
                            decimal-separator=","
                            :value="1000000"
                        />
                    </div>
                </div>

                <!-- With decimal scale -->
                <div class="mt-8">
                    <x-mantine-number-formatter
                        :value="5/3"
                        :decimal-scale="2"
                    />
                </div>

                <!-- With different grouping styles -->
                <div class="mt-8">
                    <div>
                        Thousand style:
                        <x-mantine-number-formatter
                            :thousand-separator="true"
                            thousands-group-style="thousand"
                            :value="1234567890"
                        />
                    </div>

                    <div>
                        Lakh style:
                        <x-mantine-number-formatter
                            :thousand-separator="true"
                            thousands-group-style="lakh"
                            :value="1234567890"
                        />
                    </div>

                    <div>
                        Wan style:
                        <x-mantine-number-formatter
                            :thousand-separator="true"
                            thousands-group-style="wan"
                            :value="1234567890"
                        />
                    </div>
                </div>

                <!-- Currency formatting -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-number-formatter
                            prefix="$ "
                            :thousand-separator="true"
                            :decimal-scale="2"
                            :value="1234.5678"
                        />

                        <x-mantine-number-formatter
                            prefix="€ "
                            :thousand-separator="true"
                            decimal-separator=","
                            thousand-separator="."
                            :decimal-scale="2"
                            :value="1234.5678"
                        />

                        <x-mantine-number-formatter
                            suffix=" ¥"
                            :thousand-separator="true"
                            :decimal-scale="0"
                            :value="1234.5678"
                        />
                    </x-mantine-stack>
                </div>
            </div>
        blade;
    }
}
