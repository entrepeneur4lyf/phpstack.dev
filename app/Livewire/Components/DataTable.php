<?php

namespace App\Livewire\Components;

use App\Traits\WithColorScheme;
use App\Traits\WithMantineDataTable;
use Illuminate\Support\Collection;

class DataTable extends MantineComponent
{
    use WithColorScheme;
    use WithMantineDataTable;

    /**
     * Create a new component instance.
     */
    public function __construct(
        // Data configuration
        public array $columns = [],
        public ?array $groups = null,
        public ?Collection $records = null,
        public ?int $totalRecords = null,
        public ?array $allowedSortFields = [],
        public ?string $defaultSortField = null,
        public ?string $defaultSortDirection = null,
        public ?int $defaultRecordsPerPage = null,

        // Record identification
        public mixed $idAccessor = null,
        public ?string $idType = null,

        // Scroll configuration
        public mixed $height = null,
        public ?array $scrollAreaProps = null,
        public ?array $responsiveHeight = null,

        // Override any config defaults
        public ?array $props = [],
        public ?array $columnProps = [],
        public ?array $groupProps = [],
        public ?array $sortingConfig = [],
        public ?array $paginationConfig = []
    ) {
        parent::__construct();

        // Validate idAccessor type
        if ($idAccessor !== null && !is_string($idAccessor) && !is_callable($idAccessor)) {
            throw new \InvalidArgumentException('idAccessor must be either a string, callable, or null');
        }

        // Initialize data configuration
        $this->allowedSortFields = $allowedSortFields;
        $this->defaultSortField = $defaultSortField;
        $this->defaultSortDirection = $defaultSortDirection ?? config('mantinelivewire.datatable.sorting.defaultDirection');
        $this->recordsPerPage = $defaultRecordsPerPage ?? config('mantinelivewire.datatable.pagination.defaultRecordsPerPage');

        // Process scroll configuration
        $scrollConfig = config('mantinelivewire.datatable.scroll', []);
        $defaultScrollAreaProps = $scrollConfig['scrollArea'] ?? [];
        $defaultResponsiveHeight = $scrollConfig['responsive'] ?? [];

        // Set component props
        $this->props = array_merge(
            // Base data props
            $this->getDataTableProps(),
            
            // Default props from config
            config('mantinelivewire.datatable.props', []),
            
            // Record identification
            [
                'idAccessor' => $idAccessor ?? config('mantinelivewire.datatable.props.idAccessor'),
                'idType' => $idType ?? config('mantinelivewire.datatable.props.idType'),
            ],

            // Scroll configuration
            [
                'height' => $height ?? $scrollConfig['height'] ?? '100%',
                'scrollAreaProps' => array_merge(
                    $defaultScrollAreaProps,
                    $scrollAreaProps ?? []
                ),
                'responsiveHeight' => array_merge(
                    $defaultResponsiveHeight,
                    $responsiveHeight ?? []
                ),
            ],

            // Column/Group configuration
            [
                'columns' => !$groups ? $this->processColumns(
                    $columns, 
                    array_merge(
                        config('mantinelivewire.datatable.columns.props', []),
                        $columnProps
                    )
                ) : null,
                'groups' => $groups ? $this->processGroups(
                    $groups,
                    array_merge(
                        config('mantinelivewire.datatable.groups.props', []),
                        $groupProps
                    )
                ) : null,
            ],

            // Color scheme configuration
            [
                'colorScheme' => $this->getCurrentColorScheme(),
                'config' => $this->getColorSchemeConfig(),
            ],

            // Sorting configuration
            array_merge(
                config('mantinelivewire.datatable.sorting', []),
                $sortingConfig
            ),

            // Pagination configuration
            array_merge(
                config('mantinelivewire.datatable.pagination', []),
                $paginationConfig
            ),

            // Override with provided props
            $props
        );

        // Validate scroll type
        if (isset($this->props['scrollAreaProps']['type'])) {
            $validTypes = config('mantinelivewire.datatable.validation.scrollTypes', ['hover', 'always', 'scroll', 'auto', 'never']);
            if (!in_array($this->props['scrollAreaProps']['type'], $validTypes)) {
                $this->props['scrollAreaProps']['type'] = 'hover';
            }
        }

        // Validate size-related props
        $this->props['horizontalSpacing'] = $this->validateSize($this->props['horizontalSpacing'] ?? 'xs');
        $this->props['verticalSpacing'] = $this->validateSize($this->props['verticalSpacing'] ?? 'xs');
        $this->props['fontSize'] = $this->validateSize($this->props['fontSize'] ?? 'sm');
        $this->props['borderRadius'] = $this->validateSize($this->props['borderRadius'] ?? 'sm');
        $this->props['shadow'] = $this->validateSize($this->props['shadow'] ?? 'sm');

        // Validate alignment props
        $this->props['verticalAlign'] = $this->validateAlignment($this->props['verticalAlign'] ?? 'center');
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->initializeWithColorScheme();
        $this->initializeWithMantineDataTable();
    }

    /**
     * Get the path to the React component.
     */
    public function component(): string
    {
        return 'resources/MantineLiveWire/custom/react/components/DataTable/index.js';
    }
}
