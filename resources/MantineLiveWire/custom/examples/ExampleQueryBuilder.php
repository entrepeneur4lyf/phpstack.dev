<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example QueryBuilder Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade QueryBuilder component.
 * It showcases different query configurations, custom operators, and validation scenarios.
 *
 * Features demonstrated:
 * - Basic query builder setup
 * - Custom operators and combinators
 * - Field validation
 * - Complex nested queries
 * - Disabled state handling
 *
 * @see \MantineBlade\Components\QueryBuilder
 * @link https://react-querybuilder.js.org/
 */
class ExampleQueryBuilder extends Component
{
    /**
     * Sample fields configuration
     *
     * @var array
     */
    public $fields = [
        [
            'name' => 'firstName',
            'label' => 'First Name',
            'type' => 'text',
        ],
        [
            'name' => 'lastName',
            'label' => 'Last Name',
            'type' => 'text',
        ],
        [
            'name' => 'age',
            'label' => 'Age',
            'type' => 'number',
            'validators' => [
                'min' => 0,
                'max' => 120,
            ],
        ],
        [
            'name' => 'birthDate',
            'label' => 'Birth Date',
            'type' => 'date',
        ],
        [
            'name' => 'isActive',
            'label' => 'Active Status',
            'type' => 'boolean',
        ],
    ];

    /**
     * Custom operators configuration
     *
     * @var array
     */
    public $operators = [
        [
            'name' => 'equals',
            'label' => 'Equal to',
        ],
        [
            'name' => 'notEquals',
            'label' => 'Not equal to',
        ],
        [
            'name' => 'contains',
            'label' => 'Contains',
        ],
        [
            'name' => 'beginsWith',
            'label' => 'Begins with',
        ],
        [
            'name' => 'endsWith',
            'label' => 'Ends with',
        ],
    ];

    /**
     * Sample initial query
     *
     * @var array
     */
    public $initialQuery = [
        'combinator' => 'and',
        'rules' => [
            [
                'field' => 'firstName',
                'operator' => 'contains',
                'value' => 'John',
            ],
            [
                'field' => 'age',
                'operator' => 'equals',
                'value' => 30,
            ],
        ],
    ];

    /**
     * Render the component
     *
     * Demonstrates multiple query builder configurations:
     * 1. Basic usage with default settings
     * 2. Custom operators and validation
     * 3. Complex nested query example
     * 4. Disabled state demonstration
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div class="mb-8">
                    <x-mantine-title order="2">Basic Query Builder</x-mantine-title>
                    <x-mantine-query-builder
                        :fields="$fields"
                        :default-query="['combinator' => 'and', 'rules' => []]"
                    />
                </div>

                <!-- With custom operators -->
                <div class="mb-8">
                    <x-mantine-title order="2">Custom Operators</x-mantine-title>
                    <x-mantine-query-builder
                        :fields="$fields"
                        :operators="$operators"
                        :default-query="$initialQuery"
                    />
                </div>

                <!-- Complex nested query -->
                <div class="mb-8">
                    <x-mantine-title order="2">Nested Query Groups</x-mantine-title>
                    <x-mantine-query-builder
                        :fields="$fields"
                        :operators="$operators"
                        :default-query="[
                            'combinator' => 'or',
                            'rules' => [
                                [
                                    'combinator' => 'and',
                                    'rules' => [
                                        ['field' => 'firstName', 'operator' => 'equals', 'value' => 'John'],
                                        ['field' => 'lastName', 'operator' => 'equals', 'value' => 'Doe'],
                                    ],
                                ],
                                [
                                    'combinator' => 'and',
                                    'rules' => [
                                        ['field' => 'age', 'operator' => 'equals', 'value' => 25],
                                        ['field' => 'isActive', 'operator' => 'equals', 'value' => true],
                                    ],
                                ],
                            ],
                        ]"
                        :show-clone-buttons="true"
                        :show-lock-buttons="true"
                    />
                </div>

                <!-- Disabled state -->
                <div class="mb-8">
                    <x-mantine-title order="2">Disabled Query Builder</x-mantine-title>
                    <x-mantine-query-builder
                        :fields="$fields"
                        :operators="$operators"
                        :default-query="$initialQuery"
                        :disabled="true"
                    />
                </div>
            </div>
        blade;
    }
}
