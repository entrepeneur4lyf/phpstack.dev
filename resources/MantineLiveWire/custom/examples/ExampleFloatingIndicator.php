<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleFloatingIndicator extends Component
{
    public $active = 0;
    public $tabValue = '1';
    public $rootRef = null;
    public $controlsRefs = [];

    public function setActive($index)
    {
        $this->active = $index;
    }

    public function setTabValue($value)
    {
        $this->tabValue = $value;
    }

    public function render()
    {
        $frameworks = ['React', 'Vue', 'Angular', 'Svelte'];

        return <<<'blade'
            <div>
                <!-- Basic segmented control -->
                <div>
                    <div class="relative bg-gray-100 p-2 rounded-lg" x-ref="root">
                        <div class="flex gap-2">
                            @foreach($frameworks as $index => $framework)
                                <x-mantine-unstyled-button
                                    class="flex-1 px-3 py-2 rounded relative"
                                    :data-active="$active === $index"
                                    x-ref="control{{ $index }}"
                                    :on-click="fn() => $this->setActive($index)"
                                >
                                    <span class="relative z-10">{{ $framework }}</span>
                                </x-mantine-unstyled-button>
                            @endforeach
                        </div>

                        <x-mantine-floating-indicator
                            :target="'$refs.control' . $active"
                            :parent="'$refs.root'"
                            class="absolute bg-white rounded shadow transition-all duration-200"
                            style="inset: 4px auto auto 4px"
                        />
                    </div>
                </div>

                <!-- Custom tabs with floating indicator -->
                <div class="mt-8">
                    <x-mantine-tabs
                        variant="none"
                        :value="$tabValue"
                        :on-change="fn($value) => $this->setTabValue($value)"
                    >
                        <div class="relative border-b" x-ref="tabsRoot">
                            <x-mantine-tabs-list>
                                <x-mantine-tabs-tab
                                    value="1"
                                    x-ref="tab1"
                                    class="px-4 py-2"
                                >
                                    First tab
                                </x-mantine-tabs-tab>

                                <x-mantine-tabs-tab
                                    value="2"
                                    x-ref="tab2"
                                    class="px-4 py-2"
                                >
                                    Second tab
                                </x-mantine-tabs-tab>

                                <x-mantine-tabs-tab
                                    value="3"
                                    x-ref="tab3"
                                    class="px-4 py-2"
                                >
                                    Third tab
                                </x-mantine-tabs-tab>

                                <x-mantine-floating-indicator
                                    :target="'$refs.tab' . $tabValue"
                                    :parent="'$refs.tabsRoot'"
                                    class="absolute bottom-0 h-0.5 bg-blue-500 transition-all duration-200"
                                    style="left: 0; right: 0"
                                />
                            </x-mantine-tabs-list>
                        </div>

                        <x-mantine-tabs-panel value="1" class="p-4">
                            First tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="2" class="p-4">
                            Second tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="3" class="p-4">
                            Third tab content
                        </x-mantine-tabs-panel>
                    </x-mantine-tabs>
                </div>

                <!-- Multiple rows with floating indicator -->
                <div class="mt-8">
                    <div class="relative p-4 bg-gray-100 rounded-lg" x-ref="gridRoot">
                        <div class="grid grid-cols-3 gap-2">
                            @foreach(['up-left', 'up', 'up-right', 'left', 'center', 'right', 'down-left', 'down', 'down-right'] as $position)
                                <x-mantine-unstyled-button
                                    class="aspect-square flex items-center justify-center rounded relative"
                                    :data-active="$active === $position"
                                    x-ref="gridControl{{ $position }}"
                                    :on-click="fn() => $this->setActive($position)"
                                >
                                    <span class="relative z-10">
                                        @switch($position)
                                            @case('up-left')
                                                <i class="fas fa-arrow-up-left text-xl"></i>
                                                @break
                                            @case('up')
                                                <i class="fas fa-arrow-up text-xl"></i>
                                                @break
                                            @case('up-right')
                                                <i class="fas fa-arrow-up-right text-xl"></i>
                                                @break
                                            @case('left')
                                                <i class="fas fa-arrow-left text-xl"></i>
                                                @break
                                            @case('center')
                                                <i class="fas fa-circle text-xl"></i>
                                                @break
                                            @case('right')
                                                <i class="fas fa-arrow-right text-xl"></i>
                                                @break
                                            @case('down-left')
                                                <i class="fas fa-arrow-down-left text-xl"></i>
                                                @break
                                            @case('down')
                                                <i class="fas fa-arrow-down text-xl"></i>
                                                @break
                                            @case('down-right')
                                                <i class="fas fa-arrow-down-right text-xl"></i>
                                                @break
                                        @endswitch
                                    </span>
                                </x-mantine-unstyled-button>
                            @endforeach
                        </div>

                        <x-mantine-floating-indicator
                            :target="'$refs.gridControl' . $active"
                            :parent="'$refs.gridRoot'"
                            class="absolute bg-white rounded shadow transition-all duration-200"
                            style="inset: 16px auto auto 16px"
                        />
                    </div>
                </div>
            </div>
        blade;
    }
}
