<?php

namespace App\View\Components;

use Livewire\Component;

class ExampleTabs extends Component
{
    public $activeTab = 'gallery';

    public function setTab($value)
    {
        $this->activeTab = $value;
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-tabs :value="$activeTab" :on-change="fn($value) => $this->setTab($value)">
                    <x-mantine-tabs-tabslist>
                        <x-mantine-tabs-tab
                            value="gallery"
                            :left-section="'<i class=\"fas fa-photo\" style=\"width: 12px; height: 12px;\"></i>'"
                        >
                            Gallery
                        </x-mantine-tabs-tab>

                        <x-mantine-tabs-tab
                            value="messages"
                            :left-section="'<i class=\"fas fa-message\" style=\"width: 12px; height: 12px;\"></i>'"
                        >
                            Messages
                        </x-mantine-tabs-tab>

                        <x-mantine-tabs-tab
                            value="settings"
                            :left-section="'<i class=\"fas fa-cog\" style=\"width: 12px; height: 12px;\"></i>'"
                        >
                            Settings
                        </x-mantine-tabs-tab>
                    </x-mantine-tabs-tabslist>

                    <x-mantine-tabs-panel value="gallery">
                        Gallery tab content
                    </x-mantine-tabs-panel>

                    <x-mantine-tabs-panel value="messages">
                        Messages tab content
                    </x-mantine-tabs-panel>

                    <x-mantine-tabs-panel value="settings">
                        Settings tab content
                    </x-mantine-tabs-panel>
                </x-mantine-tabs>

                <!-- Different variants -->
                <div class="mt-8">
                    <x-mantine-tabs variant="outline" defaultValue="gallery">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>

                    <x-mantine-tabs variant="pills" defaultValue="gallery" class="mt-4">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>
                </div>

                <!-- With custom colors -->
                <div class="mt-8">
                    <x-mantine-tabs color="teal" defaultValue="gallery">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages" color="blue">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>
                </div>

                <!-- Vertical orientation -->
                <div class="mt-8">
                    <x-mantine-tabs orientation="vertical" defaultValue="gallery">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>

                        <x-mantine-tabs-panel value="gallery">
                            Gallery tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="messages">
                            Messages tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="settings">
                            Settings tab content
                        </x-mantine-tabs-panel>
                    </x-mantine-tabs>
                </div>

                <!-- With placement -->
                <div class="mt-8">
                    <x-mantine-tabs orientation="vertical" placement="right" defaultValue="gallery">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>

                        <x-mantine-tabs-panel value="gallery">
                            Gallery tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="messages">
                            Messages tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="settings">
                            Settings tab content
                        </x-mantine-tabs-panel>
                    </x-mantine-tabs>
                </div>

                <!-- With grow -->
                <div class="mt-8">
                    <x-mantine-tabs defaultValue="gallery">
                        <x-mantine-tabs-tabslist :grow="true">
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>
                </div>

                <!-- With disabled tab -->
                <div class="mt-8">
                    <x-mantine-tabs defaultValue="gallery">
                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings" :disabled="true">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>
                </div>

                <!-- Inverted tabs -->
                <div class="mt-8">
                    <x-mantine-tabs defaultValue="gallery" :inverted="true">
                        <x-mantine-tabs-panel value="gallery">
                            Gallery tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="messages">
                            Messages tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-panel value="settings">
                            Settings tab content
                        </x-mantine-tabs-panel>

                        <x-mantine-tabs-tabslist>
                            <x-mantine-tabs-tab value="gallery">Gallery</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="messages">Messages</x-mantine-tabs-tab>
                            <x-mantine-tabs-tab value="settings">Settings</x-mantine-tabs-tab>
                        </x-mantine-tabs-tabslist>
                    </x-mantine-tabs>
                </div>
            </div>
        blade;
    }
}
