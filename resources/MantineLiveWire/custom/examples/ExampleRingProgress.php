<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleRingProgress extends Component
{
    public $hoveredSection = -1;

    public function setHoveredSection($section)
    {
        $this->hoveredSection = $section;
    }

    public function resetHoveredSection()
    {
        $this->hoveredSection = -1;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-ring-progress
                    :label="'<x-mantine-text size=\"xs\" ta=\"center\">Application data usage</x-mantine-text>'"
                    :sections="[
                        ['value' => 40, 'color' => 'cyan'],
                        ['value' => 15, 'color' => 'orange'],
                        ['value' => 15, 'color' => 'grape'],
                    ]"
                />

                <!-- With size, thickness & rounded caps -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :size="120"
                        :thickness="12"
                        :round-caps="true"
                        :sections="[
                            ['value' => 40, 'color' => 'cyan'],
                            ['value' => 15, 'color' => 'orange'],
                            ['value' => 15, 'color' => 'grape'],
                        ]"
                    />
                </div>

                <!-- With tooltips -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :size="170"
                        :thickness="16"
                        :label="'<x-mantine-text size=\"xs\" ta=\"center\" px=\"xs\" style=\"pointer-events: none\">Hover sections to see tooltips</x-mantine-text>'"
                        :sections="[
                            ['value' => 40, 'color' => 'cyan', 'tooltip' => 'Documents – 40 Gb'],
                            ['value' => 25, 'color' => 'orange', 'tooltip' => 'Apps – 25 Gb'],
                            ['value' => 15, 'color' => 'grape', 'tooltip' => 'Other – 15 Gb'],
                        ]"
                    />
                </div>

                <!-- With root color -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :sections="[['value' => 40, 'color' => 'yellow']]"
                        root-color="red"
                    />
                </div>

                <!-- With section events -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :size="140"
                        :sections="[
                            [
                                'value' => 40,
                                'color' => 'cyan',
                                'onMouseEnter' => fn() => \$this->setHoveredSection(0),
                                'onMouseLeave' => fn() => \$this->resetHoveredSection(),
                            ],
                            [
                                'value' => 20,
                                'color' => 'blue',
                                'onMouseEnter' => fn() => \$this->setHoveredSection(1),
                                'onMouseLeave' => fn() => \$this->resetHoveredSection(),
                            ],
                            [
                                'value' => 15,
                                'color' => 'indigo',
                                'onMouseEnter' => fn() => \$this->setHoveredSection(2),
                                'onMouseLeave' => fn() => \$this->resetHoveredSection(),
                            ],
                        ]"
                    />
                    <x-mantine-text>
                        Hovered section: {{ $hoveredSection === -1 ? 'none' : $hoveredSection }}
                    </x-mantine-text>
                </div>

                <!-- With custom label -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :sections="[['value' => 40, 'color' => 'blue']]"
                        :label="'<x-mantine-text c=\"blue\" fw=\"700\" ta=\"center\" size=\"xl\">40%</x-mantine-text>'"
                    />
                </div>

                <!-- With icon label -->
                <div class="mt-4">
                    <x-mantine-ring-progress
                        :sections="[['value' => 100, 'color' => 'teal']]"
                        :label="'
                            <x-mantine-center>
                                <x-mantine-action-icon color=\"teal\" variant=\"light\" radius=\"xl\" size=\"xl\">
                                    <i class=\"fas fa-check\" style=\"width: 22px; height: 22px;\"></i>
                                </x-mantine-action-icon>
                            </x-mantine-center>
                        '"
                    />
                </div>
            </div>
        blade;
    }
}
