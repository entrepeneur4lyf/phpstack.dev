<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFileButton extends Component
{
    public $file = null;
    public $files = [];

    public function handleFileSelect($fileData)
    {
        $this->file = $fileData;
    }

    public function handleMultipleFiles($filesData)
    {
        $this->files = $filesData;
    }

    public function resetFile()
    {
        $this->file = null;
    }

    public function resetFiles()
    {
        $this->files = [];
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-group justify="center">
                    <x-mantine-file-button
                        :on-change="fn($file) => $this->handleFileSelect($file)"
                        accept="image/png,image/jpeg"
                    >
                        (props) => (
                            <x-mantine-button v-bind="props">
                                Upload image
                            </x-mantine-button>
                        )
                    </x-mantine-file-button>
                </x-mantine-group>

                @if($file)
                    <x-mantine-text size="sm" ta="center" mt="sm">
                        Picked file: {{ $file['name'] }}
                    </x-mantine-text>
                @endif

                <!-- Multiple files -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-file-button
                            :on-change="fn($files) => $this->handleMultipleFiles($files)"
                            accept="image/png,image/jpeg"
                            :multiple="true"
                        >
                            (props) => (
                                <x-mantine-button v-bind="props">
                                    Upload multiple images
                                </x-mantine-button>
                            )
                        </x-mantine-file-button>
                    </x-mantine-group>

                    @if(count($files) > 0)
                        <x-mantine-text size="sm" mt="sm">
                            Picked files:
                        </x-mantine-text>

                        <ul>
                            @foreach($files as $file)
                                <li>{{ $file['name'] }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- With reset functionality -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-file-button
                            :on-change="fn($file) => $this->handleFileSelect($file)"
                            accept="image/png,image/jpeg"
                            reset-ref="resetFileInput"
                        >
                            (props) => (
                                <x-mantine-button v-bind="props">
                                    Upload image
                                </x-mantine-button>
                            )
                        </x-mantine-file-button>

                        <x-mantine-button
                            :disabled="!$file"
                            color="red"
                            :on-click="fn() => $this->resetFile()"
                        >
                            Reset
                        </x-mantine-button>
                    </x-mantine-group>

                    @if($file)
                        <x-mantine-text size="sm" ta="center" mt="sm">
                            Picked file: {{ $file['name'] }}
                        </x-mantine-text>
                    @endif
                </div>

                <!-- Disabled state -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-file-button
                            :on-change="fn($file) => $this->handleFileSelect($file)"
                            accept="image/png,image/jpeg"
                            :disabled="true"
                        >
                            (props) => (
                                <x-mantine-button v-bind="props">
                                    Upload image (Disabled)
                                </x-mantine-button>
                            )
                        </x-mantine-file-button>
                    </x-mantine-group>
                </div>

                <!-- With custom button styles -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-file-button
                            :on-change="fn($file) => $this->handleFileSelect($file)"
                            accept="image/png,image/jpeg"
                        >
                            (props) => (
                                <x-mantine-button
                                    v-bind="props"
                                    variant="gradient"
                                    :gradient="['from' => 'teal', 'to' => 'blue', 'deg' => 60]"
                                >
                                    Upload with gradient
                                </x-mantine-button>
                            )
                        </x-mantine-file-button>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
