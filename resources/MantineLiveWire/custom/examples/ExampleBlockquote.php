<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Blockquote Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Blockquote component.
 * It showcases different styles, icons, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic blockquote usage
 * - Different color variations
 * - Custom icon sizes
 * - Border radius options
 * - Integration with ThemeIcon
 * - Citation formatting
 *
 * @see \MantineBlade\Components\Blockquote
 * @link https://mantine.dev/core/blockquote/
 */
class ExampleBlockquote extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic blockquote with icon and citation
     * 2. Different color variations with matching icons
     * 3. Icon size variations
     * 4. Different border radius options
     * 5. Integration with ThemeIcon component
     *
     * Each example showcases different features and customization
     * options available with the Blockquote component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-blockquote
                        color="blue"
                        cite="– Forrest Gump"
                        :icon="'<i class=\"fas fa-info-circle\"></i>'"
                        mt="xl"
                    >
                        Life is like an npm install – you never know what you are going to get.
                    </x-mantine-blockquote>
                </div>

                <!-- With different colors -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-blockquote
                            color="red"
                            cite="– Developer"
                            :icon="'<i class=\"fas fa-exclamation-circle\"></i>'"
                        >
                            It's not a bug – it's an undocumented feature.
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="green"
                            cite="– Programmer"
                            :icon="'<i class=\"fas fa-check-circle\"></i>'"
                        >
                            The code works, don't touch it!
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="yellow"
                            cite="– Senior Dev"
                            :icon="'<i class=\"fas fa-lightbulb\"></i>'"
                        >
                            Sometimes the best solution is to start over.
                        </x-mantine-blockquote>
                    </x-mantine-stack>
                </div>

                <!-- With different icon sizes -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-blockquote
                            color="blue"
                            cite="– Small Icon"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            :icon-size="16"
                        >
                            This blockquote has a small icon
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="blue"
                            cite="– Medium Icon"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            :icon-size="24"
                        >
                            This blockquote has a medium icon
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="blue"
                            cite="– Large Icon"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            :icon-size="32"
                        >
                            This blockquote has a large icon
                        </x-mantine-blockquote>
                    </x-mantine-stack>
                </div>

                <!-- With different radius -->
                <div class="mt-8">
                    <x-mantine-stack>
                        <x-mantine-blockquote
                            color="blue"
                            cite="– XS Radius"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            radius="xs"
                        >
                            This blockquote has extra small radius
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="blue"
                            cite="– MD Radius"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            radius="md"
                        >
                            This blockquote has medium radius
                        </x-mantine-blockquote>

                        <x-mantine-blockquote
                            color="blue"
                            cite="– XL Radius"
                            :icon="'<i class=\"fas fa-info-circle\"></i>'"
                            radius="xl"
                        >
                            This blockquote has extra large radius
                        </x-mantine-blockquote>
                    </x-mantine-stack>
                </div>

                <!-- With ThemeIcon -->
                <div class="mt-8">
                    <x-mantine-blockquote
                        color="blue"
                        cite="– With ThemeIcon"
                        :icon="'
                            <x-mantine-theme-icon
                                size=\"24\"
                                variant=\"light\"
                                color=\"blue\"
                                radius=\"xl\"
                            >
                                <i class=\"fas fa-info\" style=\"width: 14px; height: 14px;\"></i>
                            </x-mantine-theme-icon>
                        '"
                    >
                        This blockquote uses ThemeIcon as its icon
                    </x-mantine-blockquote>
                </div>
            </div>
        blade;
    }
}
