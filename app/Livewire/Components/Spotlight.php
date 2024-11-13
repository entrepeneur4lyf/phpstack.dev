<?php

namespace App\Livewire\Components;

/**
 * Spotlight component for command center and search functionality.
 *
 * The Spotlight component creates a command center interface that can be triggered with keyboard shortcuts.
 * It provides search functionality and customizable actions, making it easy for users to quickly find and
 * execute commands or navigate through content.
 *
 * @see https://mantine.dev/core/spotlight/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-spotlight
 *     :actions="[
 *         ['title' => 'Home', 'description' => 'Get to home page', 'onTrigger' => fn() => redirect('/')]
 *         ['title' => 'Search', 'description' => 'Search documentation', 'onTrigger' => fn() => redirect('/search')]
 *     ]"
 *     shortcut="mod + K"
 *     placeholder="Search..."
 * />
 * ```
 *
 * @example With custom search behavior
 * ```blade
 * <x-mantine-spotlight
 *     :highlight-query="true"
 *     :limit="5"
 *     :nothing-found="No results found"
 *     :search-props="['placeholder' => 'Type to search...']"
 * >
 *     {{ $searchContent }}
 * </x-mantine-spotlight>
 * ```
 *
 * @example With scrollable results
 * ```blade
 * <x-mantine-spotlight
 *     :scrollable="true"
 *     :max-height="400"
 *     :actions="$actions"
 *     :store="$store"
 * />
 * ```
 */
class Spotlight extends MantineComponent
{
    /**
     * Create a new Spotlight component instance.
     *
     * @param array|null $actions Array of action objects with title, description, and onTrigger properties
     * @param string|null $shortcut Keyboard shortcut to trigger spotlight (e.g., 'mod + K')
     * @param array|null $searchProps Props to pass to the search input component
     * @param string|null $nothingFound Content displayed when no results are found
     * @param bool|null $highlightQuery Whether to highlight matching query in results
     * @param int|null $limit Maximum number of actions displayed at a time
     * @param bool|null $scrollable Whether the actions list should be scrollable
     * @param int|null $maxHeight Maximum height of actions list in pixels when scrollable
     * @param string|null $query Controlled search query value
     * @param mixed|null $onQueryChange Function to handle search query changes
     * @param mixed|null $store Spotlight store instance for state management
     * @param array|null $classNames Object of class names for subcomponents
     * @param array|null $styles Object of styles for subcomponents
     */
    public function __construct(
        public mixed $actions = null,
        public mixed $shortcut = null,
        public mixed $searchProps = null,
        public mixed $nothingFound = null,
        public mixed $highlightQuery = null,
        public mixed $limit = null,
        public mixed $scrollable = null,
        public mixed $maxHeight = null,
        public mixed $query = null,
        public mixed $onQueryChange = null,
        public mixed $store = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'actions' => $actions,
            'shortcut' => $shortcut,
            'searchProps' => $searchProps,
            'nothingFound' => $nothingFound,
            'highlightQuery' => $highlightQuery,
            'limit' => $limit,
            'scrollable' => $scrollable,
            'maxHeight' => $maxHeight,
            'query' => $query,
            'onQueryChange' => $onQueryChange,
            'store' => $store,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
