<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

trait WithMantineDataTable
{
    /**
     * Selected records
     */
    public array $selectedRecords = [];

    /**
     * Last selected record ID
     */
    protected $lastSelectedId = null;

    /**
     * Current page
     */
    public int $page = 1;

    /**
     * Records per page
     */
    public int $recordsPerPage;

    /**
     * Sort status
     */
    public ?array $sortStatus = null;

    /**
     * Loading state
     */
    public bool $loading = false;

    /**
     * Total records loaded (for infinite scroll)
     */
    protected int $loadedRecords = 0;

    /**
     * Initialize the trait
     */
    public function initializeWithMantineDataTable(): void
    {
        // Set default values from config
        $this->recordsPerPage = config('mantinelivewire.datatable.features.pagination.defaultRecordsPerPage', 10);

        // Set initial sort if provided
        if (isset($this->defaultSortField)) {
            $this->sortStatus = [
                'columnAccessor' => $this->defaultSortField,
                'direction' => $this->defaultSortDirection ?? config('mantinelivewire.datatable.features.sorting.defaultDirection', 'asc'),
            ];
        }

        // Load initial data
        $this->loadData();
    }

    /**
     * Handle row action
     */
    public function handleRowAction($recordId, string $action): void
    {
        // Find the record
        $record = $this->records->first(function ($record) use ($recordId) {
            return $this->getRecordId($record) === $recordId;
        });

        if (!$record) {
            return;
        }

        // Check if action is allowed
        if (!$this->isActionAllowed($action, $record)) {
            return;
        }

        // Handle specific actions
        $method = 'handle' . Str::studly($action) . 'Action';
        if (method_exists($this, $method)) {
            $this->$method($record);
            return;
        }

        // Emit generic action event
        $this->dispatch(
            config('mantinelivewire.datatable.features.row-actions.events.onClick', 'row-action-click'),
            [
                'record' => $record,
                'action' => $action,
            ]
        );
    }

    /**
     * Check if action is allowed
     */
    protected function isActionAllowed(string $action, $record): bool
    {
        $permission = config("mantinelivewire.datatable.features.row-actions.permissions.{$action}");

        if (!$permission) {
            return true;
        }

        return is_callable($permission) ? $permission($record) : true;
    }

    /**
     * Handle view action
     */
    protected function handleViewAction($record): void
    {
        $this->dispatch(
            config('mantinelivewire.datatable.features.row-actions.events.onView', 'row-action-view'),
            [
                'record' => $record,
            ]
        );
    }

    /**
     * Handle edit action
     */
    protected function handleEditAction($record): void
    {
        $this->dispatch(
            config('mantinelivewire.datatable.features.row-actions.events.onEdit', 'row-action-edit'),
            [
                'record' => $record,
            ]
        );
    }

    /**
     * Handle delete action
     */
    protected function handleDeleteAction($record): void
    {
        $this->dispatch(
            config('mantinelivewire.datatable.features.row-actions.events.onDelete', 'row-action-delete'),
            [
                'record' => $record,
            ]
        );
    }

    /**
     * Get record ID using the configured accessor
     */
    protected function getRecordId($record): mixed
    {
        $accessor = $this->props['idAccessor'] ?? config('mantinelivewire.datatable.props.idAccessor', 'id');

        if (is_callable($accessor)) {
            return $accessor($record);
        }

        if (is_string($accessor)) {
            return Str::contains($accessor, '.')
                ? data_get($record, $accessor)
                : $record[$accessor] ?? null;
        }

        return $record['id'] ?? null;
    }

    /**
     * Handle selection change
     */
    public function selectedRecordsChange(array $selectedRecords, ?string $lastSelectedId = null): void
    {
        // Get selection config
        $config = config('mantinelivewire.datatable.features.selection', []);

        // Validate selection if needed
        if ($config['validation']['maxSelectable'] !== null && 
            count($selectedRecords) > $config['validation']['maxSelectable']) {
            return;
        }

        if ($config['validation']['minSelectable'] !== null && 
            count($selectedRecords) < $config['validation']['minSelectable']) {
            return;
        }

        // Update selection state
        $this->selectedRecords = $selectedRecords;
        $this->lastSelectedId = $lastSelectedId;

        // Emit selection change event
        $this->dispatch(
            config('mantinelivewire.datatable.features.selection.events.onChange', 'selection-change'),
            $selectedRecords
        );
    }

    /**
     * Handle all records selection change
     */
    public function allRecordsSelectionChange(bool $selected): void
    {
        $config = config('mantinelivewire.datatable.features.selection', []);

        if ($selected) {
            // Select all records up to maxSelectable
            $maxSelectable = $config['validation']['maxSelectable'];
            $records = $maxSelectable !== null 
                ? $this->records->take($maxSelectable) 
                : $this->records;

            $this->selectedRecords = $records->map(fn($record) => $this->getRecordId($record))->toArray();
        } else {
            // Deselect all records if above minSelectable
            $minSelectable = $config['validation']['minSelectable'];
            if ($minSelectable === null || count($this->selectedRecords) > $minSelectable) {
                $this->selectedRecords = [];
            }
        }

        // Emit all selection change event
        $this->dispatch(
            config('mantinelivewire.datatable.features.selection.events.onAllChange', 'all-selection-change'),
            $this->selectedRecords
        );
    }

    /**
     * Check if a record is selectable
     */
    protected function isRecordSelectable($record): bool
    {
        $config = config('mantinelivewire.datatable.features.selection', []);
        $validator = $config['validation']['isRecordSelectable'];

        if (!$validator) {
            return true;
        }

        return is_callable($validator) ? $validator($record) : true;
    }

    /**
     * Reset selection state
     */
    public function resetSelection(): void
    {
        $this->selectedRecords = [];
        $this->lastSelectedId = null;
    }

    /**
     * Get DataTable props
     */
    protected function getDataTableProps(): array
    {
        return [
            'records' => $this->records ?? collect(),
            'totalRecords' => $this->totalRecords ?? 0,
            'page' => $this->page,
            'recordsPerPage' => $this->recordsPerPage,
            'sortStatus' => $this->sortStatus,
            'loading' => $this->loading,
            'selectedRecords' => $this->selectedRecords,
            'lastSelectedId' => $this->lastSelectedId,
        ];
    }

    /**
     * Load data (must be implemented by the component)
     */
    abstract protected function loadData(): void;

    /**
     * Get the base query (can be overridden by the component)
     */
    protected function getQuery(): Builder
    {
        return $this->query ?? $this->model::query();
    }
}
