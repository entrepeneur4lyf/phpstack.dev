<?php

namespace App\View\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class ExampleDropzone extends Component
{
    use WithFileUploads;

    public $files = [];
    public $loading = false;
    public $fullScreenActive = false;

    public function handleDrop($files)
    {
        $this->loading = true;
        // Simulate file processing
        sleep(2);
        $this->files = array_merge($this->files, $files);
        $this->loading = false;
    }

    public function handleReject($files)
    {
        foreach ($files as $file) {
            $this->dispatch('notify', [
                'title' => 'File rejected',
                'message' => "File {$file['file']['name']} was rejected: {$file['errors'][0]['message']}",
                'color' => 'red',
            ]);
        }
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <x-mantine-dropzone
                        :accept="['image/png', 'image/jpeg', 'image/gif', 'image/webp']"
                        :max-size="5 * 1024 ** 2"
                        :loading="$loading"
                        wire:drop="handleDrop"
                        wire:reject="handleReject"
                    >
                        <x-mantine-group justify="center" gap="xl" mih="220" style="pointer-events: none">
                            <x-mantine-dropzone.accept>
                                <x-mantine-icon-upload
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-blue-6)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.accept>

                            <x-mantine-dropzone.reject>
                                <x-mantine-icon-x
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-red-6)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.reject>

                            <x-mantine-dropzone.idle>
                                <x-mantine-icon-photo
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-dimmed)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.idle>

                            <div>
                                <x-mantine-text size="xl" inline>
                                    Drag images here or click to select files
                                </x-mantine-text>

                                <x-mantine-text size="sm" c="dimmed" inline mt="7">
                                    Attach as many files as you like, each file should not exceed 5mb
                                </x-mantine-text>
                            </div>
                        </x-mantine-group>
                    </x-mantine-dropzone>

                    @if (count($files) > 0)
                        <x-mantine-simple-grid cols="{{ ['base' => 1, 'sm' => 4] }}" mt="xl">
                            @foreach ($files as $file)
                                <x-mantine-image :src="$file['url']" />
                            @endforeach
                        </x-mantine-simple-grid>
                    @endif
                </div>

                <!-- Loading state -->
                <div class="mb-8">
                    <x-mantine-dropzone :loading="true">
                        <x-mantine-text ta="center">
                            Drop images here
                        </x-mantine-text>
                    </x-mantine-dropzone>
                </div>

                <!-- Disabled state -->
                <div class="mb-8">
                    <x-mantine-dropzone :disabled="true">
                        <x-mantine-text ta="center">
                            Drop images here
                        </x-mantine-text>
                    </x-mantine-dropzone>
                </div>

                <!-- Open file browser manually -->
                <div class="mb-8">
                    @php
                        $openRef = null;
                    @endphp

                    <x-mantine-dropzone :open-ref="$openRef">
                        <x-mantine-text ta="center">
                            Drop images here
                        </x-mantine-text>
                    </x-mantine-dropzone>

                    <x-mantine-group justify="center" mt="md">
                        <x-mantine-button wire:click="$refs.openRef.click()">
                            Select files
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- Full screen dropzone -->
                <div class="mb-8">
                    <x-mantine-group justify="center">
                        <x-mantine-button
                            :color="$fullScreenActive ? 'red' : 'blue'"
                            wire:click="$toggle('fullScreenActive')"
                        >
                            {{ $fullScreenActive ? 'Deactivate' : 'Activate' }} full screen dropzone
                        </x-mantine-button>
                    </x-mantine-group>

                    <x-mantine-dropzone.full-screen
                        :active="$fullScreenActive"
                        :accept="['image/png', 'image/jpeg', 'image/gif', 'image/webp']"
                        wire:drop="handleDrop"
                    >
                        <x-mantine-group justify="center" gap="xl" mih="220" style="pointer-events: none">
                            <x-mantine-dropzone.accept>
                                <x-mantine-icon-upload
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-blue-6)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.accept>

                            <x-mantine-dropzone.reject>
                                <x-mantine-icon-x
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-red-6)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.reject>

                            <x-mantine-dropzone.idle>
                                <x-mantine-icon-photo
                                    :style="[
                                        'width' => 'rem(52)',
                                        'height' => 'rem(52)',
                                        'color' => 'var(--mantine-color-dimmed)',
                                    ]"
                                    :stroke="1.5"
                                />
                            </x-mantine-dropzone.idle>

                            <div>
                                <x-mantine-text size="xl" inline>
                                    Drag images here or click to select files
                                </x-mantine-text>

                                <x-mantine-text size="sm" c="dimmed" inline mt="7">
                                    Attach as many files as you like, each file should not exceed 5mb
                                </x-mantine-text>
                            </div>
                        </x-mantine-group>
                    </x-mantine-dropzone.full-screen>
                </div>
            </div>
        blade;
    }
}
