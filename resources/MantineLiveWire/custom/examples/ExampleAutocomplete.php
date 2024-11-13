<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Autocomplete Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Autocomplete component.
 * It showcases different styles, behaviors, and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic autocomplete functionality
 * - Different visual variants
 * - Section customization (left/right sections)
 * - Grouped options
 * - Custom filtering
 * - Performance optimization with limits
 * - Custom option rendering
 * - Error states
 * - Controlled inputs
 * - Dropdown control
 *
 * @see \MantineBlade\Components\Autocomplete
 * @link https://mantine.dev/core/autocomplete/
 */
class ExampleAutocomplete extends Component
{
    /**
     * Value for controlled input example
     *
     * @var string
     */
    public $value = '';

    /**
     * Controls dropdown visibility in dropdown control example
     *
     * @var bool
     */
    public $dropdownOpened = false;

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic autocomplete with simple string options
     * 2. Different visual variants (default, filled, unstyled)
     * 3. Custom sections with icons
     * 4. Grouped options with categories
     * 5. Advanced filtering with custom logic
     * 6. Performance optimization for large datasets
     * 7. Rich option rendering with user data
     * 8. Error state handling
     * 9. Controlled input behavior
     * 10. Manual dropdown control
     *
     * Each example showcases different features and customization
     * options available with the Autocomplete component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic autocomplete -->
                <x-mantine-autocomplete
                    label="Your favorite library"
                    placeholder="Pick value or enter anything"
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                />

                <!-- Different variants -->
                <div class="mt-4">
                    <x-mantine-stack>
                        <x-mantine-autocomplete
                            variant="default"
                            label="Default variant"
                            placeholder="Default variant"
                            :data="['React', 'Angular', 'Vue', 'Svelte']"
                        />
                        <x-mantine-autocomplete
                            variant="filled"
                            label="Filled variant"
                            placeholder="Filled variant"
                            :data="['React', 'Angular', 'Vue', 'Svelte']"
                        />
                        <x-mantine-autocomplete
                            variant="unstyled"
                            label="Unstyled variant"
                            placeholder="Unstyled variant"
                            :data="['React', 'Angular', 'Vue', 'Svelte']"
                        />
                    </x-mantine-stack>
                </div>

                <!-- With sections -->
                <div class="mt-4">
                    <x-mantine-autocomplete
                        :left-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>'
                        left-section-pointer-events="none"
                        label="Your favorite library"
                        placeholder="Pick value or enter anything"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                    />

                    <x-mantine-autocomplete
                        mt="md"
                        :right-section='<svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>'
                        right-section-pointer-events="none"
                        label="Your favorite library"
                        placeholder="Pick value or enter anything"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        class="mt-4"
                    />
                </div>

                <!-- With groups -->
                <x-mantine-autocomplete
                    label="Your favorite library"
                    placeholder="Pick value or enter anything"
                    :data="[
                        ['group' => 'Frontend', 'items' => ['React', 'Angular']],
                        ['group' => 'Backend', 'items' => ['Express', 'Django']],
                    ]"
                    class="mt-4"
                />

                <!-- With custom filter -->
                <x-mantine-autocomplete
                    label="Your country"
                    placeholder="Pick value or enter anything"
                    :data="['Great Britain', 'Russian Federation', 'United States']"
                    :filter="function ($options, $search) {
                        $splittedSearch = strtolower(trim($search));
                        return array_filter($options, function ($option) use ($splittedSearch) {
                            $words = explode(' ', strtolower(trim($option)));
                            return array_reduce(explode(' ', $splittedSearch), function ($carry, $searchWord) use ($words) {
                                return $carry && array_reduce($words, function ($found, $word) use ($searchWord) {
                                    return $found || str_contains($word, $searchWord);
                                }, false);
                            }, true);
                        });
                    }"
                    class="mt-4"
                />

                <!-- With limit -->
                <x-mantine-autocomplete
                    label="100 000 options autocomplete"
                    placeholder="Use limit to optimize performance"
                    :limit="5"
                    :data="array_map(function($i) { return 'Option ' . $i; }, range(0, 99999))"
                    class="mt-4"
                />

                <!-- With custom render option -->
                <x-mantine-autocomplete
                    :data="['Emily Johnson', 'Ava Rodriguez', 'Olivia Chen', 'Ethan Barnes', 'Mason Taylor']"
                    :render-option="function ($option) {
                        $userData = [
                            'Emily Johnson' => [
                                'image' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-7.png',
                                'email' => 'emily92@gmail.com',
                            ],
                            'Ava Rodriguez' => [
                                'image' => 'https://raw.githubusercontent.com/mantinedev/mantine/master/.demo/avatars/avatar-8.png',
                                'email' => 'ava_rose@gmail.com',
                            ],
                            // ... other user data
                        ];
                        return '<x-mantine-group gap=\"sm\">
                            <x-mantine-avatar :src=\"' . $userData[$option]['image'] . '\" size=\"36\" radius=\"xl\" />
                            <div>
                                <x-mantine-text size=\"sm\">' . $option . '</x-mantine-text>
                                <x-mantine-text size=\"xs\" opacity=\"0.5\">' . $userData[$option]['email'] . '</x-mantine-text>
                            </div>
                        </x-mantine-group>';
                    }"
                    :max-dropdown-height="300"
                    label="Employee of the month"
                    placeholder="Search for employee"
                    class="mt-4"
                />

                <!-- Error states -->
                <div class="mt-4">
                    <x-mantine-autocomplete
                        label="Boolean error"
                        placeholder="Boolean error"
                        :error="true"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                    />

                    <x-mantine-autocomplete
                        mt="md"
                        label="With error message"
                        placeholder="With error message"
                        error="Invalid input"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        class="mt-4"
                    />
                </div>

                <!-- Controlled -->
                <x-mantine-autocomplete
                    wire:model="value"
                    label="Controlled input"
                    placeholder="Type something..."
                    :data="['React', 'Angular', 'Vue', 'Svelte']"
                    class="mt-4"
                />

                <!-- With dropdown control -->
                <div class="mt-4">
                    <x-mantine-button wire:click="$toggle('dropdownOpened')" class="mb-4">
                        Toggle dropdown
                    </x-mantine-button>

                    <x-mantine-autocomplete
                        label="Your favorite library"
                        placeholder="Pick value or enter anything"
                        :data="['React', 'Angular', 'Vue', 'Svelte']"
                        :dropdown-opened="$dropdownOpened"
                    />
                </div>
            </div>
        blade;
    }
}
