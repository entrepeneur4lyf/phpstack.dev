<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleModal extends Component
{
    public $opened = false;
    public $noTransitionOpened = false;
    public $slowTransitionOpened = false;

    public function open()
    {
        $this->opened = true;
    }

    public function close()
    {
        $this->opened = false;
    }

    public function openNoTransition()
    {
        $this->noTransitionOpened = true;
    }

    public function closeNoTransition()
    {
        $this->noTransitionOpened = false;
    }

    public function openSlowTransition()
    {
        $this->slowTransitionOpened = true;
    }

    public function closeSlowTransition()
    {
        $this->slowTransitionOpened = false;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                    >
                        <x-mantine-text-input
                            label="Email"
                            placeholder="your@email.com"
                            class="mb-4"
                        />
                        <x-mantine-text-input
                            label="Password"
                            type="password"
                            placeholder="Your password"
                        />
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open modal
                    </x-mantine-button>
                </div>

                <!-- Centered modal -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                        :centered="true"
                    >
                        Modal content
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open centered Modal
                    </x-mantine-button>
                </div>

                <!-- Without header -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        :with-close-button="false"
                    >
                        Modal without header, press escape or click on overlay to close
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Modal
                    </x-mantine-button>
                </div>

                <!-- Fullscreen modal -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="This is a fullscreen modal"
                        :full-screen="true"
                        :radius="0"
                        :transition-props="[
                            'transition' => 'fade',
                            'duration' => 200,
                        ]"
                    >
                        Fullscreen modal content
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open Modal
                    </x-mantine-button>
                </div>

                <!-- With custom overlay -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Authentication"
                        :overlay-props="[
                            'backgroundOpacity' => 0.55,
                            'blur' => 3,
                        ]"
                    >
                        Modal content
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open modal
                    </x-mantine-button>
                </div>

                <!-- With transitions -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$slowTransitionOpened"
                        :on-close="fn() => $this->closeSlowTransition()"
                        title="Please consider this"
                        :transition-props="[
                            'transition' => 'rotate-left',
                        ]"
                    >
                        rotate-left transition
                    </x-mantine-modal>

                    <x-mantine-modal
                        :opened="$noTransitionOpened"
                        :on-close="fn() => $this->closeNoTransition()"
                        title="Please consider this"
                        :transition-props="[
                            'transition' => 'fade',
                            'duration' => 600,
                            'timingFunction' => 'linear',
                        ]"
                    >
                        fade transition 600ms linear transition
                    </x-mantine-modal>

                    <x-mantine-group justify="center">
                        <x-mantine-button
                            :on-click="fn() => $this->openSlowTransition()"
                            variant="default"
                        >
                            Rotate left transition
                        </x-mantine-button>
                        <x-mantine-button
                            :on-click="fn() => $this->openNoTransition()"
                            variant="default"
                        >
                            Fade transition
                        </x-mantine-button>
                    </x-mantine-group>
                </div>

                <!-- With initial focus -->
                <div class="mt-8">
                    <x-mantine-modal
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                        title="Focus demo"
                    >
                        <x-mantine-text-input
                            label="First input"
                            placeholder="First input"
                        />
                        <x-mantine-text-input
                            data-autofocus
                            label="Input with initial focus"
                            placeholder="It has data-autofocus attribute"
                            mt="md"
                        />
                    </x-mantine-modal>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open modal
                    </x-mantine-button>
                </div>

                <!-- Using compound components -->
                <div class="mt-8">
                    <x-mantine-modal-root
                        :opened="$opened"
                        :on-close="fn() => $this->close()"
                    >
                        <x-mantine-modal-overlay />
                        <x-mantine-modal-content>
                            <x-mantine-modal-header>
                                <x-mantine-modal-title>
                                    Modal title
                                </x-mantine-modal-title>
                                <x-mantine-modal-close-button />
                            </x-mantine-modal-header>
                            <x-mantine-modal-body>
                                Modal content
                            </x-mantine-modal-body>
                        </x-mantine-modal-content>
                    </x-mantine-modal-root>

                    <x-mantine-button :on-click="fn() => $this->open()">
                        Open modal
                    </x-mantine-button>
                </div>
            </div>
        blade;
    }
}
