<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Accordion Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Accordion component.
 * It showcases different styles, layouts, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic accordion usage with icons
 * - Custom control labels with avatars and descriptions
 * - Icon integration in accordion controls
 * - Disabled items functionality
 * - Custom chevron implementation
 * - Multiple sections support
 *
 * @see \MantineBlade\Components\Accordion
 * @link https://mantine.dev/core/accordion/
 */
class ExampleAccordion extends Component
{
    /**
     * Sample grocery items data for basic examples
     *
     * Each item contains:
     * - emoji: Icon representation
     * - value: Unique identifier and display text
     * - description: Detailed description of the item
     *
     * @var array
     */
    public $groceries = [
        [
            'emoji' => '🍎',
            'value' => 'Apples',
            'description' => 'Crisp and refreshing fruit. Apples are known for their versatility and nutritional benefits. They come in a variety of flavors and are great for snacking, baking, or adding to salads.',
        ],
        [
            'emoji' => '🍌',
            'value' => 'Bananas',
            'description' => 'Naturally sweet and potassium-rich fruit. Bananas are a popular choice for their energy-boosting properties and can be enjoyed as a quick snack, added to smoothies, or used in baking.',
        ],
        [
            'emoji' => '🥦',
            'value' => 'Broccoli',
            'description' => 'Nutrient-packed green vegetable. Broccoli is packed with vitamins, minerals, and fiber. It has a distinct flavor and can be enjoyed steamed, roasted, or added to stir-fries.',
        ],
    ];

    /**
     * Sample character data for advanced styling example
     *
     * Each character contains:
     * - id: Unique identifier
     * - image: Avatar URL
     * - label: Display name
     * - description: Short description
     * - content: Detailed content
     *
     * @var array
     */
    public $charactersList = [
        [
            'id' => 'bender',
            'image' => 'https://img.icons8.com/clouds/256/000000/futurama-bender.png',
            'label' => 'Bender Bending Rodríguez',
            'description' => 'Fascinated with cooking, though has no sense of taste',
            'content' => "Bender Bending Rodríguez, (born September 4, 2996), designated Bending Unit 22, and commonly known as Bender, is a bending unit created by a division of MomCorp in Tijuana, Mexico, and his serial number is 2716057. His mugshot id number is 01473. He is Fry's best friend.",
        ],
        [
            'id' => 'carol',
            'image' => 'https://img.icons8.com/clouds/256/000000/futurama-mom.png',
            'label' => 'Carol Miller',
            'description' => 'One of the richest people on Earth',
            'content' => "Carol Miller (born January 30, 2880), better known as Mom, is the evil chief executive officer and shareholder of 99.7% of Momcorp, one of the largest industrial conglomerates in the universe and the source of most of Earth's robots. She is also one of the main antagonists of the Futurama series.",
        ],
        [
            'id' => 'homer',
            'image' => 'https://img.icons8.com/clouds/256/000000/homer-simpson.png',
            'label' => 'Homer Simpson',
            'description' => 'Overweight, lazy, and often ignorant',
            'content' => 'Homer Jay Simpson (born May 12) is the main protagonist and one of the five main characters of The Simpsons series(or show). He is the spouse of Marge Simpson and father of Bart, Lisa and Maggie Simpson.',
        ],
    ];

    /**
     * Render the component
     *
     * Demonstrates multiple accordion configurations:
     * 1. Basic usage with emoji icons
     * 2. Custom control labels with avatars and descriptions
     * 3. FontAwesome icon integration
     * 4. Disabled items demonstration
     * 5. Custom chevron implementation
     * 6. Multiple sections support
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-accordion default-value="Apples">
                        @foreach($groceries as $item)
                            <x-mantine-accordion-item :value="$item['value']">
                                <x-mantine-accordion-control :icon="$item['emoji']">
                                    {{ $item['value'] }}
                                </x-mantine-accordion-control>
                                <x-mantine-accordion-panel>
                                    {{ $item['description'] }}
                                </x-mantine-accordion-panel>
                            </x-mantine-accordion-item>
                        @endforeach
                    </x-mantine-accordion>
                </div>

                <!-- Custom control label -->
                <div class="mt-8">
                    <x-mantine-accordion
                        chevron-position="right"
                        variant="contained"
                    >
                        @foreach($charactersList as $item)
                            <x-mantine-accordion-item :value="$item['id']">
                                <x-mantine-accordion-control>
                                    <x-mantine-group wrap="nowrap">
                                        <x-mantine-avatar
                                            :src="$item['image']"
                                            radius="xl"
                                            size="lg"
                                        />
                                        <div>
                                            <x-mantine-text>{{ $item['label'] }}</x-mantine-text>
                                            <x-mantine-text
                                                size="sm"
                                                c="dimmed"
                                                fw="400"
                                            >
                                                {{ $item['description'] }}
                                            </x-mantine-text>
                                        </div>
                                    </x-mantine-group>
                                </x-mantine-accordion-control>
                                <x-mantine-accordion-panel>
                                    <x-mantine-text size="sm">
                                        {{ $item['content'] }}
                                    </x-mantine-text>
                                </x-mantine-accordion-panel>
                            </x-mantine-accordion-item>
                        @endforeach
                    </x-mantine-accordion>
                </div>

                <!-- With icons -->
                <div class="mt-8">
                    <x-mantine-accordion variant="contained">
                        <x-mantine-accordion-item value="photos">
                            <x-mantine-accordion-control
                                :icon="'<i class=\"fas fa-image\" style=\"color: var(--mantine-color-red-6); width: 20px; height: 20px;\"></i>'"
                            >
                                Recent photos
                            </x-mantine-accordion-control>
                            <x-mantine-accordion-panel>Content</x-mantine-accordion-panel>
                        </x-mantine-accordion-item>

                        <x-mantine-accordion-item value="print">
                            <x-mantine-accordion-control
                                :icon="'<i class=\"fas fa-print\" style=\"color: var(--mantine-color-blue-6); width: 20px; height: 20px;\"></i>'"
                            >
                                Print photos
                            </x-mantine-accordion-control>
                            <x-mantine-accordion-panel>Content</x-mantine-accordion-panel>
                        </x-mantine-accordion-item>

                        <x-mantine-accordion-item value="camera">
                            <x-mantine-accordion-control
                                :icon="'<i class=\"fas fa-camera\" style=\"color: var(--mantine-color-teal-6); width: 20px; height: 20px;\"></i>'"
                            >
                                Camera settings
                            </x-mantine-accordion-control>
                            <x-mantine-accordion-panel>Content</x-mantine-accordion-panel>
                        </x-mantine-accordion-item>
                    </x-mantine-accordion>
                </div>

                <!-- With disabled items -->
                <div class="mt-8">
                    <x-mantine-accordion maw="400" default-value="Apples">
                        @foreach($groceries as $item)
                            <x-mantine-accordion-item :value="$item['value']">
                                <x-mantine-accordion-control
                                    :icon="$item['emoji']"
                                    :disabled="$item['value'] === 'Bananas'"
                                >
                                    {{ $item['value'] }}
                                </x-mantine-accordion-control>
                                <x-mantine-accordion-panel>
                                    {{ $item['description'] }}
                                </x-mantine-accordion-panel>
                            </x-mantine-accordion-item>
                        @endforeach
                    </x-mantine-accordion>
                </div>

                <!-- With custom chevron -->
                <div class="mt-8">
                    <x-mantine-accordion
                        default-value="Apples"
                        :chevron="'<i class=\"fas fa-plus\"></i>'"
                    >
                        @foreach($groceries as $item)
                            <x-mantine-accordion-item :value="$item['value']">
                                <x-mantine-accordion-control :icon="$item['emoji']">
                                    {{ $item['value'] }}
                                </x-mantine-accordion-control>
                                <x-mantine-accordion-panel>
                                    {{ $item['description'] }}
                                </x-mantine-accordion-panel>
                            </x-mantine-accordion-item>
                        @endforeach
                    </x-mantine-accordion>
                </div>

                <!-- Multiple sections -->
                <div class="mt-8">
                    <x-mantine-accordion :multiple="true" default-value="['Apples', 'Bananas']">
                        @foreach($groceries as $item)
                            <x-mantine-accordion-item :value="$item['value']">
                                <x-mantine-accordion-control :icon="$item['emoji']">
                                    {{ $item['value'] }}
                                </x-mantine-accordion-control>
                                <x-mantine-accordion-panel>
                                    {{ $item['description'] }}
                                </x-mantine-accordion-panel>
                            </x-mantine-accordion-item>
                        @endforeach
                    </x-mantine-accordion>
                </div>
            </div>
        blade;
    }
}
