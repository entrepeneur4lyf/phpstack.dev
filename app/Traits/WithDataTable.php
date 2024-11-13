<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use InvalidArgumentException;

trait WithDataTable
{
    /**
     * Current page number
     */
    public int $page = 1;

    /**
     * Records per page
     */
    public int $recordsPerPage = 10;

    /**
     * Sort status
     */
    public ?array $sortStatus = null;

    /**
     * Loading state
     */
    public bool $loading = false;

    /**
     * Records collection
     */
    protected ?Collection $records = null;

    /**
     * Total records count
     */
    protected ?int $totalRecords = null;

    /**
     * Allowed sort fields
     */
    protected array $allowedSortFields = [];

    /**
     * Default sort field
     */
    protected ?string $defaultSortField = null;

    /**
     * Default sort direction
     */
    protected string $defaultSortDirection = 'asc';

    /**
     * Initialize the data table.
     */
    protected function initializeWithDataTable(): void
    {
        // Set initial sort status if default sort field is provided
        if ($this->defaultSortField) {
            $this->sortStatus = [
                'columnAccessor' => $this->defaultSortField,
                'direction' => $this->defaultSortDirection,
            ];
        }

        // Load initial data
        $this->loadData();
    }

    /**
     * Set the current page.
     */
    public function setPage(int $page): void
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page number must be greater than 0');
        }

        $this->page = $page;
        $this->loadData();
    }

    /**
     * Set the sort status.
     */
    public function setSortStatus(array $sortStatus): void
    {
        // Validate sort field
        if (!empty($this->allowedSortFields) && !in_array($sortStatus['columnAccessor'], $this->allowedSortFields)) {
            throw new InvalidArgumentException('Invalid sort field');
        }

        // Validate sort direction
        if (!in_array($sortStatus['direction'], ['asc', 'desc'])) {
            throw new InvalidArgumentException('Invalid sort direction');
        }

        $this->sortStatus = $sortStatus;
        $this->loadData();
    }

    /**
     * Apply sorting to query.
     */
    protected function applySorting(Builder $query): Builder
    {
        if ($this->sortStatus) {
            return $query->orderBy(
                $this->sortStatus['columnAccessor'],
                $this->sortStatus['direction']
            );
        }

        if ($this->defaultSortField) {
            return $query->orderBy(
                $this->defaultSortField,
                $this->defaultSortDirection
            );
        }

        return $query;
    }

    /**
     * Apply pagination to query.
     */
    protected function applyPagination(Builder $query): Builder
    {
        return $query->forPage($this->page, $this->recordsPerPage);
    }

    /**
     * Get records for the current page.
     */
    protected function getRecords(): Collection
    {
        return $this->records ?? collect();
    }

    /**
     * Get total records count.
     */
    protected function getTotalRecords(): int
    {
        return $this->totalRecords ?? 0;
    }

    /**
     * Load data based on current page and sort status.
     * Override this method in your component to implement data loading logic.
     */
    protected function loadData(): void
    {
        $this->loading = true;

        try {
            // Your data loading logic here
            // Example:
            // $query = YourModel::query();
            // $query = $this->applySorting($query);
            // $this->totalRecords = $query->count();
            // $this->records = $this->applyPagination($query)->get();
        } catch (\Exception $e) {
            // Log the error and set empty results
            logger()->error('DataTable load error: ' . $e->getMessage());
            $this->records = collect();
            $this->totalRecords = 0;
        } finally {
            $this->loading = false;
        }
    }

    /**
     * Get data table props for the React component.
     */
    protected function getDataTableProps(): array
    {
        return [
            'records' => $this->getRecords()->toArray(),
            'totalRecords' => $this->getTotalRecords(),
            'recordsPerPage' => $this->recordsPerPage,
            'page' => $this->page,
            'sortStatus' => $this->sortStatus,
            'loading' => $this->loading,
        ];
    }
}
