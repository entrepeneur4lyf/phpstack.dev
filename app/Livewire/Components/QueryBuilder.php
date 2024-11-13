<?php

namespace App\Livewire\Components;

/**
 * QueryBuilder Component
 *
 * A visual query builder component that allows users to create complex queries through
 * a drag-and-drop interface. Based on @react-querybuilder/mantine.
 *
 * @link https://react-querybuilder.js.org/
 * @link https://www.npmjs.com/package/@react-querybuilder/mantine
 *
 * @property array $fields Array of field definitions
 * @property mixed $query Current query state
 * @property mixed $defaultQuery Default initial query
 * @property mixed $onQueryChange Callback fired when query changes
 * @property mixed $operators Custom operators configuration
 * @property mixed $combinators Available combinators (AND/OR)
 * @property mixed $controlElements Custom control elements
 * @property mixed $showNotToggle Show NOT toggle for rules
 * @property mixed $showCloneButtons Show clone buttons for rules/groups
 * @property mixed $showLockButtons Show lock buttons for rules/groups
 * @property mixed $resetOnFieldChange Reset rule values when field changes
 * @property mixed $disabled Disable the entire query builder
 * @property mixed $validator Custom validation function
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-query-builder
 *     :fields="[
 *         ['name' => 'firstName', 'label' => 'First Name'],
 *         ['name' => 'lastName', 'label' => 'Last Name'],
 *     ]"
 *     :default-query="['combinator' => 'and', 'rules' => []]"
 * />
 * ```
 *
 * @example With Custom Operators
 * ```blade
 * <x-mantine-query-builder
 *     :fields="$fields"
 *     :operators="[
 *         ['name' => 'equals', 'label' => 'Equal to'],
 *         ['name' => 'contains', 'label' => 'Contains'],
 *     ]"
 *     :default-query="$query"
 * />
 * ```
 */
class QueryBuilder extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param array|null $fields Field definitions
     * @param mixed $query Current query state
     * @param mixed $defaultQuery Default initial query
     * @param mixed $onQueryChange Query change callback
     * @param mixed $operators Custom operators
     * @param mixed $combinators Available combinators
     * @param mixed $controlElements Custom controls
     * @param mixed $showNotToggle Show NOT toggle
     * @param mixed $showCloneButtons Show clone buttons
     * @param mixed $showLockButtons Show lock buttons
     * @param mixed $resetOnFieldChange Reset on field change
     * @param mixed $disabled Disable component
     * @param mixed $validator Custom validator
     */
    public function __construct(
        public ?array $fields = null,
        public mixed $query = null,
        public mixed $defaultQuery = null,
        public mixed $onQueryChange = null,
        public mixed $operators = null,
        public mixed $combinators = null,
        public mixed $controlElements = null,
        public mixed $showNotToggle = null,
        public mixed $showCloneButtons = null,
        public mixed $showLockButtons = null,
        public mixed $resetOnFieldChange = null,
        public mixed $disabled = null,
        public mixed $validator = null,
    ) {
        parent::__construct();

        $this->props = [
            'fields' => $fields,
            'query' => $query,
            'defaultQuery' => $defaultQuery,
            'onQueryChange' => $onQueryChange,
            'operators' => $operators,
            'combinators' => $combinators,
            'controlElements' => $controlElements,
            'showNotToggle' => $showNotToggle,
            'showCloneButtons' => $showCloneButtons,
            'showLockButtons' => $showLockButtons,
            'resetOnFieldChange' => $resetOnFieldChange,
            'disabled' => $disabled,
            'validator' => $validator,
        ];
    }
}
