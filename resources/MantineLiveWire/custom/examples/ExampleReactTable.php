<?php

namespace MantineBlade\Examples;

use Livewire\Component;

/**
 * Example ReactTable Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade ReactTable component.
 * It showcases different features and customization options through practical examples.
 *
 * Features demonstrated:
 * - Basic table with data and columns
 * - Column filtering and sorting
 * - Pagination configuration
 * - Row selection handling
 * - State management
 * - Custom column definitions
 * - Advanced features enablement
 *
 * @see \MantineBlade\Components\ReactTable
 * @link https://v2.mantine-react-table.com/
 */
class ExampleReactTable extends Component
{
    /**
     * Handle row selection change event
     *
     * Demonstrates how to handle selection changes in the table.
     * Dispatches a notification with the selected row count.
     *
     * @param array $selectedRows
     * @return void
     */
    public function handleSelectionChange($selectedRows)
    {
        $this->dispatch('notify', [
            'message' => count($selectedRows) . ' rows selected',
            'type' => 'info'
        ]);
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic table with sample data
     * 2. Column configuration with different data types
     * 3. Feature enablement (filtering, sorting, pagination)
     * 4. Row selection with event handling
     * 5. State management for pagination and sorting
     * 6. Different column configurations
     * 7. Advanced features usage
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <x-mantine-react-table
                    :data="[
                        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
                        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
                        ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'role' => 'Editor']
                    ]"
                    :columns="[
                        ['accessorKey' => 'id', 'header' => 'ID'],
                        ['accessorKey' => 'name', 'header' => 'Name'],
                        ['accessorKey' => 'email', 'header' => 'Email'],
                        ['accessorKey' => 'role', 'header' => 'Role']
                    ]"
                />

                <!-- Advanced features enabled -->
                <div class="mt-8">
                    <x-mantine-react-table
                        :data="[
                            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'status' => 'Active'],
                            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'status' => 'Pending'],
                            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'status' => 'Inactive']
                        ]"
                        :columns="[
                            ['accessorKey' => 'id', 'header' => 'ID', 'enableSorting' => true],
                            ['accessorKey' => 'name', 'header' => 'Name', 'enableColumnFilter' => true],
                            ['accessorKey' => 'email', 'header' => 'Email', 'enableColumnFilter' => true],
                            ['accessorKey' => 'status', 'header' => 'Status', 'enableColumnFilter' => true]
                        ]"
                        :enable-column-filtering="true"
                        :enable-sorting="true"
                        :enable-pagination="true"
                        :enable-row-selection="true"
                        :on-row-selection-change="fn($rows) => $this->handleSelectionChange($rows)"
                    />
                </div>

                <!-- With controlled state -->
                <div class="mt-8">
                    <x-mantine-react-table
                        :data="[
                            ['id' => 1, 'name' => 'Alice Cooper', 'department' => 'Sales', 'salary' => 75000],
                            ['id' => 2, 'name' => 'Bob Dylan', 'department' => 'Engineering', 'salary' => 85000],
                            ['id' => 3, 'name' => 'Carol Smith', 'department' => 'Marketing', 'salary' => 70000]
                        ]"
                        :columns="[
                            ['accessorKey' => 'name', 'header' => 'Employee'],
                            ['accessorKey' => 'department', 'header' => 'Department'],
                            ['accessorKey' => 'salary', 'header' => 'Salary']
                        ]"
                        :enable-column-ordering="true"
                        :enable-column-pinning="true"
                        :state="[
                            'pagination' => ['pageIndex' => 0, 'pageSize' => 5],
                            'sorting' => [['id' => 'name', 'desc' => false]]
                        ]"
                    />
                </div>
            </div>
        blade;
    }
}
