<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Affix Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Affix component.
 * It showcases different positioning options, scroll-based interactions, and integration with other
 * Mantine components.
 *
 * Features demonstrated:
 * - Scroll-to-top functionality
 * - Custom positioning
 * - Z-index control
 * - Integration with notifications
 * - Fixed action buttons
 * - Transition effects
 *
 * @see \MantineBlade\Components\Affix
 * @link https://mantine.dev/core/affix/
 */
class ExampleAffix extends Component
{
    /**
     * Current vertical scroll position of the window
     *
     * Used to control the visibility of the scroll-to-top button
     * @var int
     */
    public $scrollY = 0;

    /**
     * Trigger scroll to top animation
     *
     * Dispatches an event that will be handled by JavaScript to smoothly
     * scroll the window to the top
     *
     * @return void
     */
    public function scrollToTop()
    {
        $this->dispatch('scrollToTop');
    }

    /**
     * Update the current scroll position
     *
     * Called by JavaScript scroll event listener to keep track of
     * the window's vertical scroll position
     *
     * @param int $y Vertical scroll position in pixels
     * @return void
     */
    public function updateScroll($y)
    {
        $this->scrollY = $y;
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Scroll-to-top button that appears when scrolled
     * 2. Fixed position button with custom z-index
     * 3. Fixed notification example
     * 4. Fixed action buttons group
     *
     * Each example showcases different positioning and styling options
     * available with the Affix component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage with scroll to top button -->
                <div>
                    <x-mantine-text ta="center">
                        Affix is located at the bottom of the screen, scroll to see it
                    </x-mantine-text>

                    <x-mantine-affix
                        :position="['bottom' => 20, 'right' => 20]"
                    >
                        <x-mantine-transition
                            transition="slide-up"
                            :mounted="$scrollY > 0"
                        >
                            <x-mantine-button
                                :left-section="'<i class=\"fas fa-arrow-up\" style=\"width: 16px; height: 16px;\"></i>'"
                                :on-click="fn() => $this->scrollToTop()"
                            >
                                Scroll to top
                            </x-mantine-button>
                        </x-mantine-transition>
                    </x-mantine-affix>
                </div>

                <!-- With custom z-index -->
                <div class="mt-8">
                    <x-mantine-affix
                        :position="['top' => 20, 'left' => 20]"
                        :z-index="1000"
                    >
                        <x-mantine-button>
                            Fixed at top-left
                        </x-mantine-button>
                    </x-mantine-affix>
                </div>

                <!-- With notification -->
                <div class="mt-8">
                    <x-mantine-affix
                        :position="['bottom' => 20, 'left' => 20]"
                    >
                        <x-mantine-notification
                            title="New message"
                            :with-close-button="true"
                        >
                            You have a new message in your inbox
                        </x-mantine-notification>
                    </x-mantine-affix>
                </div>

                <!-- With action buttons -->
                <div class="mt-8">
                    <x-mantine-affix
                        :position="['bottom' => 20, 'right' => 20]"
                    >
                        <x-mantine-group>
                            <x-mantine-action-icon
                                variant="filled"
                                color="blue"
                                size="lg"
                                radius="xl"
                            >
                                <i class="fas fa-message"></i>
                            </x-mantine-action-icon>
                            
                            <x-mantine-action-icon
                                variant="filled"
                                color="pink"
                                size="lg"
                                radius="xl"
                            >
                                <i class="fas fa-heart"></i>
                            </x-mantine-action-icon>
                        </x-mantine-group>
                    </x-mantine-affix>
                </div>
            </div>

            <script>
                document.addEventListener('livewire:initialized', () => {
                    // Update scroll position
                    window.addEventListener('scroll', () => {
                        @this.updateScroll(window.scrollY);
                    });

                    // Handle scroll to top
                    document.addEventListener('scrollToTop', () => {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    });
                });
            </script>
        blade;
    }
}
