<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleRating extends Component
{
    public $value = 0;

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic rating -->
                <x-mantine-rating
                    wire:model="value"
                    :default-value="2"
                />

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-rating size="xs" :default-value="3" />
                        <x-mantine-rating size="sm" :default-value="3" />
                        <x-mantine-rating size="md" :default-value="3" />
                        <x-mantine-rating size="lg" :default-value="3" />
                        <x-mantine-rating size="xl" :default-value="3" />
                    </x-mantine-stack>
                </div>

                <!-- Read only -->
                <x-mantine-rating
                    :value="3.5"
                    :fractions="2"
                    :read-only="true"
                    class="mt-4"
                />

                <!-- Different fractions -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-group>
                            <div>Fractions: 2</div>
                            <x-mantine-rating :fractions="2" :default-value="1.5" />
                        </x-mantine-group>
                        <x-mantine-group>
                            <div>Fractions: 3</div>
                            <x-mantine-rating :fractions="3" :default-value="2.33333333" />
                        </x-mantine-group>
                        <x-mantine-group>
                            <div>Fractions: 4</div>
                            <x-mantine-rating :fractions="4" :default-value="3.75" />
                        </x-mantine-group>
                    </x-mantine-stack>
                </div>

                <!-- Custom symbols -->
                <x-mantine-rating
                    :empty-symbol='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                    :full-symbol='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z"/></svg>'
                    class="mt-4"
                />

                <!-- Custom symbols for each item -->
                <x-mantine-rating
                    :empty-symbol='function ($value) {
                        $style = "width: 24px; height: 24px;";
                        switch ($value) {
                            case 1:
                                return "<svg style=\"$style\" viewBox=\"0 0 24 24\"><path d=\"M12 2L2 12l10 10 10-10z\"/></svg>";
                            case 2:
                                return "<svg style=\"$style\" viewBox=\"0 0 24 24\"><path d=\"M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z\"/></svg>";
                            case 3:
                                return "<svg style=\"$style\" viewBox=\"0 0 24 24\"><path d=\"M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z\"/></svg>";
                            case 4:
                                return "<svg style=\"$style\" viewBox=\"0 0 24 24\"><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"/></svg>";
                            case 5:
                                return "<svg style=\"$style\" viewBox=\"0 0 24 24\"><path d=\"M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z\"/></svg>";
                            default:
                                return null;
                        }
                    }'
                    :full-symbol='function ($value) {
                        $style = "width: 24px; height: 24px;";
                        $colors = [
                            1 => "red",
                            2 => "orange",
                            3 => "yellow",
                            4 => "lime",
                            5 => "green"
                        ];
                        $color = $colors[$value] ?? "currentColor";
                        switch ($value) {
                            case 1:
                                return "<svg style=\"$style; color: var(--mantine-color-$color-7)\" viewBox=\"0 0 24 24\"><path d=\"M12 2L2 12l10 10 10-10z\"/></svg>";
                            case 2:
                                return "<svg style=\"$style; color: var(--mantine-color-$color-7)\" viewBox=\"0 0 24 24\"><path d=\"M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12z\"/></svg>";
                            case 3:
                                return "<svg style=\"$style; color: var(--mantine-color-$color-7)\" viewBox=\"0 0 24 24\"><path d=\"M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z\"/></svg>";
                            case 4:
                                return "<svg style=\"$style; color: var(--mantine-color-$color-7)\" viewBox=\"0 0 24 24\"><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"/></svg>";
                            case 5:
                                return "<svg style=\"$style; color: var(--mantine-color-$color-7)\" viewBox=\"0 0 24 24\"><path d=\"M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z\"/></svg>";
                            default:
                                return null;
                        }
                    }'
                    :highlight-selected-only="true"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
