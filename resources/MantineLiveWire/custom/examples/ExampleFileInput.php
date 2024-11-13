<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFileInput extends Component
{
    public $file = null;
    public $files = [];

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic file input -->
                <x-mantine-file-input
                    label="Upload file"
                    placeholder="Pick file"
                    wire:model="file"
                />

                <!-- Multiple files -->
                <x-mantine-file-input
                    label="Upload multiple files"
                    placeholder="Pick files"
                    :multiple="true"
                    wire:model="files"
                    class="mt-4"
                />

                <!-- With accept -->
                <x-mantine-file-input
                    label="Upload images"
                    placeholder="Pick images"
                    accept="image/png,image/jpeg"
                    class="mt-4"
                />

                <!-- Clearable -->
                <x-mantine-file-input
                    label="Clearable input"
                    placeholder="Pick file"
                    :clearable="true"
                    class="mt-4"
                />

                <!-- Custom value component -->
                <x-mantine-file-input
                    label="With custom display"
                    placeholder="Pick files"
                    :multiple="true"
                    :value-component="'
                        function ValueComponent({ value }) {
                            if (!value) return null;
                            return Array.isArray(value) 
                                ? value.map((file, i) => (
                                    <x-mantine-pill key={i}>{file.name}</x-mantine-pill>
                                ))
                                : <x-mantine-pill>{value.name}</x-mantine-pill>;
                        }
                    '"
                    class="mt-4"
                />

                <!-- With error -->
                <x-mantine-file-input
                    label="With error"
                    placeholder="Pick file"
                    error="Invalid file type"
                    class="mt-4"
                />

                <!-- Disabled -->
                <x-mantine-file-input
                    label="Disabled input"
                    placeholder="Cannot upload"
                    :disabled="true"
                    class="mt-4"
                />

                <!-- With sections -->
                <x-mantine-file-input
                    label="With icon"
                    placeholder="Upload CV"
                    :left-section='<svg width="14" height="14" viewBox="0 0 24 24"><path d="M12 2L2 12l10 10 10-10z"/></svg>'
                    :left-section-pointer-events="'none'"
                    class="mt-4"
                />
            </div>
        blade;
    }
}
