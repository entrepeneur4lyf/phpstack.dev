<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Anchor Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Anchor component.
 * It showcases different styles, behaviors, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic link usage
 * - Different underline behaviors
 * - Gradient text styling
 * - Component transformation (button as link)
 * - Typography customization
 * - Custom styling with Tailwind
 * - Security attributes for external links
 * - Size variations
 *
 * @see \MantineBlade\Components\Anchor
 * @link https://mantine.dev/core/anchor/
 */
class ExampleAnchor extends Component
{
    /**
     * Handle button click event
     *
     * Demonstrates how to handle click events when using Anchor
     * as a button component. Dispatches a notification to provide
     * user feedback.
     *
     * @return void
     */
    public function handleClick()
    {
        $this->dispatch('notify', [
            'message' => 'Button clicked!',
            'type' => 'success'
        ]);
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic link with target attribute
     * 2. Different underline behaviors (always, hover, never)
     * 3. Gradient text styling with typography props
     * 4. Button styled as link with click handler
     * 5. Typography customization (size, weight, transform)
     * 6. Custom styling with Tailwind classes
     * 7. External link with security attributes
     * 8. Size variations (xs to xl)
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-anchor
                    href="https://mantine.dev/"
                    target="_blank"
                >
                    Anchor component
                </x-mantine-anchor>

                <!-- Different underline styles -->
                <div class="mt-4">
                    <x-mantine-group justify="center">
                        <x-mantine-anchor
                            href="https://mantine.dev/"
                            target="_blank"
                            underline="always"
                        >
                            Underline always
                        </x-mantine-anchor>

                        <x-mantine-anchor
                            href="https://mantine.dev/"
                            target="_blank"
                            underline="hover"
                        >
                            Underline hover
                        </x-mantine-anchor>

                        <x-mantine-anchor
                            href="https://mantine.dev/"
                            target="_blank"
                            underline="never"
                        >
                            Underline never
                        </x-mantine-anchor>
                    </x-mantine-group>
                </div>

                <!-- With gradient -->
                <div class="mt-4">
                    <x-mantine-anchor
                        variant="gradient"
                        :gradient="['from' => 'pink', 'to' => 'yellow']"
                        :fw="500"
                        fz="lg"
                        href="#gradient-example"
                    >
                        A link with pink to yellow gradient
                    </x-mantine-anchor>
                </div>

                <!-- With custom component -->
                <div class="mt-4">
                    <x-mantine-anchor
                        component="button"
                        :on-click="fn() => $this->handleClick()"
                    >
                        Button styled as link
                    </x-mantine-anchor>
                </div>

                <!-- With text props -->
                <div class="mt-4">
                    <x-mantine-anchor
                        href="#text-props"
                        fz="xl"
                        fw="bold"
                        tt="uppercase"
                    >
                        Large bold uppercase link
                    </x-mantine-anchor>
                </div>

                <!-- With custom styles -->
                <div class="mt-4">
                    <x-mantine-anchor
                        href="#custom-styles"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
                        underline="never"
                    >
                        Custom styled link
                    </x-mantine-anchor>
                </div>

                <!-- With rel attribute -->
                <div class="mt-4">
                    <x-mantine-anchor
                        href="https://external-site.com"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        External link with security attributes
                    </x-mantine-anchor>
                </div>

                <!-- Different sizes -->
                <div class="mt-4">
                    <x-mantine-group>
                        <x-mantine-anchor href="#" size="xs">Extra small link</x-mantine-anchor>
                        <x-mantine-anchor href="#" size="sm">Small link</x-mantine-anchor>
                        <x-mantine-anchor href="#" size="md">Medium link</x-mantine-anchor>
                        <x-mantine-anchor href="#" size="lg">Large link</x-mantine-anchor>
                        <x-mantine-anchor href="#" size="xl">Extra large link</x-mantine-anchor>
                    </x-mantine-group>
                </div>
            </div>
        blade;
    }
}
