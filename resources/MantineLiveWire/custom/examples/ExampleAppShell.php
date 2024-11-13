<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example AppShell Component
 *
 * This example demonstrates a responsive application shell layout with collapsible navigation
 * that adapts to both mobile and desktop viewports. It showcases common patterns for building
 * application layouts using the MantineBlade AppShell component.
 *
 * Features demonstrated:
 * - Responsive navigation drawer
 * - Mobile/desktop layout switching
 * - Header with navigation toggle
 * - Structured navbar with header, scrollable content, and footer sections
 *
 * @see \MantineBlade\Components\AppShell
 * @link https://mantine.dev/core/app-shell/
 *
 * @property bool $mobileOpened Controls the mobile navigation drawer state
 * @property bool $desktopOpened Controls the desktop navigation drawer state
 */
class ExampleAppShell extends Component
{
    /**
     * Mobile navigation state
     * @var bool
     */
    public bool $mobileOpened = false;

    /**
     * Desktop navigation state
     * @var bool
     */
    public bool $desktopOpened = true;

    /**
     * Toggle mobile navigation drawer
     *
     * @return void
     */
    public function toggleMobile()
    {
        $this->mobileOpened = !$this->mobileOpened;
    }

    /**
     * Toggle desktop navigation drawer
     *
     * @return void
     */
    public function toggleDesktop()
    {
        $this->desktopOpened = !$this->desktopOpened;
    }

    /**
     * Render the component
     *
     * The template demonstrates:
     * - Responsive header with conditional toggle buttons
     * - Collapsible navbar with different mobile/desktop states
     * - Structured navbar sections (header, scrollable content, footer)
     * - Proper usage of AppShell subcomponents
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <x-mantine-app-shell
                :header="['height' => 60]"
                :navbar="[
                    'width' => 300,
                    'breakpoint' => 'sm',
                    'collapsed' => [
                        'mobile' => !$mobileOpened,
                        'desktop' => !$desktopOpened
                    ]
                ]"
                padding="md"
            >
                <x-mantine-app-shell-header>
                    <div class="flex items-center h-full px-4">
                        <x-mantine-button
                            variant="subtle"
                            class="lg:hidden"
                            wire:click="toggleMobile"
                        >
                            ☰
                        </x-mantine-button>
                        <x-mantine-button
                            variant="subtle"
                            class="hidden lg:block"
                            wire:click="toggleDesktop"
                        >
                            ☰
                        </x-mantine-button>
                        <div class="ml-4">Logo</div>
                    </div>
                </x-mantine-app-shell-header>

                <x-mantine-app-shell-navbar>
                    <x-mantine-app-shell-section>
                        Navbar Header
                    </x-mantine-app-shell-section>
                    
                    <x-mantine-app-shell-section grow component="ScrollArea">
                        Navigation items go here
                    </x-mantine-app-shell-section>
                    
                    <x-mantine-app-shell-section>
                        Navbar Footer
                    </x-mantine-app-shell-section>
                </x-mantine-app-shell-navbar>

                <x-mantine-app-shell-main>
                    Main content goes here
                </x-mantine-app-shell-main>
            </x-mantine-app-shell>
        blade;
    }
}
