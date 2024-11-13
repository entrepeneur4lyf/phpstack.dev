<?php

namespace App\View\Components;

use Livewire\Component;

class ExamplePortal extends Component
{
    public $opened = false;

    public function toggle()
    {
        $this->opened = !$this->opened;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic Portal usage -->
                <div>
                    <x-mantine-box style="position: relative; z-index: 1">
                        <x-mantine-button wire:click="toggle">
                            {{ $opened ? 'Close' : 'Open' }} portal
                        </x-mantine-button>

                        @if($opened)
                            <x-mantine-portal>
                                <x-mantine-paper
                                    shadow="md"
                                    p="md"
                                    style="position: fixed; top: 20px; right: 20px; z-index: 1000;"
                                >
                                    This content is rendered in Portal at the end of document.body
                                </x-mantine-paper>
                            </x-mantine-portal>
                        @endif
                    </x-mantine-box>
                </div>

                <!-- Portal with target -->
                <div class="mt-8">
                    <div id="portal-target" style="padding: 20px; background: var(--mantine-color-gray-1);">
                        Target element
                    </div>

                    @if($opened)
                        <x-mantine-portal target="#portal-target">
                            <x-mantine-text c="blue">
                                This content is rendered inside #portal-target element
                            </x-mantine-text>
                        </x-mantine-portal>
                    @endif
                </div>

                <!-- OptionalPortal usage -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-optional-portal :within-portal="true">
                            <x-mantine-text>This text is rendered in Portal</x-mantine-text>
                        </x-mantine-optional-portal>

                        <x-mantine-optional-portal :within-portal="false">
                            <x-mantine-text>This text is rendered as regular child</x-mantine-text>
                        </x-mantine-optional-portal>
                    </x-mantine-stack>
                </div>

                <!-- OptionalPortal with target -->
                <div class="mt-8">
                    <div id="optional-portal-target" style="padding: 20px; background: var(--mantine-color-blue-1);">
                        Optional portal target
                    </div>

                    <x-mantine-optional-portal
                        :within-portal="true"
                        target="#optional-portal-target"
                    >
                        <x-mantine-text c="blue">
                            This content is rendered inside #optional-portal-target element
                        </x-mantine-text>
                    </x-mantine-optional-portal>
                </div>
            </div>
        blade;
    }
}
