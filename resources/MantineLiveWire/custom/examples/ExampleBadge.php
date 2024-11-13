<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Badge Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Badge component.
 * It showcases different styles, variants, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic badge usage
 * - Different visual variants
 * - Gradient styling
 * - Circular badges
 * - Section content
 * - Full width badges
 * - Auto contrast
 * - Link functionality
 *
 * @see \MantineBlade\Components\Badge
 * @link https://mantine.dev/core/badge/
 */
class ExampleBadge extends Component
{
    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic badge with color
     * 2. Different visual variants (filled, light, outline, etc.)
     * 3. Gradient badge with custom colors
     * 4. Circular number badges
     * 5. Badges with left/right sections
     * 6. Full width badge
     * 7. Auto contrast functionality
     * 8. Badge as a clickable link
     *
     * Each example showcases different features and customization
     * options available with the Badge component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-badge color="blue">
                        Badge
                    </x-mantine-badge>
                </div>

                <!-- Different variants -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-badge variant="filled" color="blue">
                            Filled
                        </x-mantine-badge>

                        <x-mantine-badge variant="light" color="blue">
                            Light
                        </x-mantine-badge>

                        <x-mantine-badge variant="outline" color="blue">
                            Outline
                        </x-mantine-badge>

                        <x-mantine-badge variant="dot" color="blue">
                            Dot
                        </x-mantine-badge>

                        <x-mantine-badge variant="transparent" color="blue">
                            Transparent
                        </x-mantine-badge>

                        <x-mantine-badge variant="white" color="blue">
                            White
                        </x-mantine-badge>
                    </x-mantine-group>
                </div>

                <!-- Gradient variant -->
                <div class="mt-8">
                    <x-mantine-badge
                        size="xl"
                        variant="gradient"
                        :gradient="[
                            'from' => 'blue',
                            'to' => 'cyan',
                            'deg' => 90,
                        ]"
                    >
                        Gradient badge
                    </x-mantine-badge>
                </div>

                <!-- Rounded badges -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-badge size="xs" :circle="true">1</x-mantine-badge>
                        <x-mantine-badge size="sm" :circle="true">7</x-mantine-badge>
                        <x-mantine-badge size="md" :circle="true">9</x-mantine-badge>
                        <x-mantine-badge size="lg" :circle="true">3</x-mantine-badge>
                        <x-mantine-badge size="xl" :circle="true">8</x-mantine-badge>
                    </x-mantine-group>
                </div>

                <!-- With sections -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-badge
                            :left-section="'<i class=\"fas fa-at\" style=\"width: 12px; height: 12px;\"></i>'"
                        >
                            With left section
                        </x-mantine-badge>

                        <x-mantine-badge
                            :right-section="'<i class=\"fas fa-at\" style=\"width: 12px; height: 12px;\"></i>'"
                        >
                            With right section
                        </x-mantine-badge>
                    </x-mantine-group>
                </div>

                <!-- Full width -->
                <div class="mt-8">
                    <x-mantine-badge :full-width="true">
                        Full width badge
                    </x-mantine-badge>
                </div>

                <!-- With auto contrast -->
                <div class="mt-8">
                    <x-mantine-group>
                        <x-mantine-badge size="lg" color="lime.4">
                            Default
                        </x-mantine-badge>

                        <x-mantine-badge :auto-contrast="true" size="lg" color="lime.4">
                            Auto contrast
                        </x-mantine-badge>
                    </x-mantine-group>
                </div>

                <!-- As a link -->
                <div class="mt-8">
                    <x-mantine-badge
                        component="a"
                        href="https://mantine.dev"
                        target="_blank"
                        variant="gradient"
                        :gradient="[
                            'from' => 'indigo',
                            'to' => 'cyan',
                        ]"
                    >
                        Click me
                    </x-mantine-badge>
                </div>
            </div>
        blade;
    }
}
