<?php

namespace Resources\Examples\DataTable;

use App\Facades\DataTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UsersTable extends \App\Livewire\Components\DataTable
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Register the table configuration
        DataTable::configure('users', [
            // Default column properties for all columns
            'defaultColumnProps' => [
                'textAlignment' => 'left',
                'noWrap' => true,
                'ellipsis' => true,
                'titleStyle' => fn($theme) => ['color' => $theme['colors']['blue'][6]],
                'cellsStyle' => fn($record) => $record['is_admin'] 
                    ? ['fontWeight' => 500, 'color' => 'var(--mantine-color-red-6)']
                    : null,
                'footerStyle' => fn($theme) => ['color' => $theme['colors']['gray'][6]],
            ],

            // Default column renderer
            'defaultColumnRender' => fn($record, $index, $accessor) => 
                is_bool($record[$accessor])
                    ? ($record[$accessor] ? 'Yes' : 'No')
                    : (is_array($record[$accessor])
                        ? json_encode($record[$accessor])
                        : $record[$accessor]),

            // Column groups with their own defaults
            'groups' => [
                [
                    'id' => 'basic-info',
                    'title' => 'Basic Information',
                    'style' => fn($theme) => ['color' => $theme['colors']['blue'][6]],
                    'columns' => [
                        [
                            'accessor' => 'id',
                            'width' => 80,
                            'textAlignment' => 'right',
                            'render' => fn($record) => "#{$record['id']}",
                            'footer' => fn(Collection $records) => "{$records->count()} users",
                        ],
                        [
                            'accessor' => 'name',
                            'width' => 200,
                            'cellsStyle' => fn($record) => [
                                'fontWeight' => 500,
                                'color' => $record['is_admin'] ? 'var(--mantine-color-blue-6)' : null,
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'contact-info',
                    'title' => 'Contact Information',
                    'textAlignment' => 'center',
                    'style' => fn($theme) => ['color' => $theme['colors']['green'][6]],
                    'columns' => [
                        [
                            'accessor' => 'email',
                            'filter' => [
                                'type' => 'select',
                                'options' => [
                                    ['value' => 'gmail', 'label' => 'Gmail'],
                                    ['value' => 'yahoo', 'label' => 'Yahoo'],
                                    ['value' => 'hotmail', 'label' => 'Hotmail'],
                                ],
                            ],
                            'filterFn' => fn($value, $filter) => str_contains($value, "@{$filter}.com"),
                        ],
                        [
                            'accessor' => 'profile.department',
                            'width' => 150,
                            'footer' => fn(Collection $records) => 
                                $records->pluck('profile.department')->unique()->count() . ' departments',
                        ],
                        [
                            'accessor' => 'profile.company',
                            'width' => 150,
                            'visibleMediaQuery' => fn($theme) => "(min-width: {$theme['breakpoints']['sm']})",
                        ],
                    ],
                ],
                [
                    'id' => 'account-settings',
                    'title' => 'Account Settings',
                    'style' => fn($theme) => ['color' => $theme['colors']['orange'][6]],
                    'columns' => [
                        [
                            'accessor' => 'color_scheme',
                            'width' => 120,
                            'render' => 'ColorSchemeBadge',
                            'cellsStyle' => null,
                            'titleStyle' => null,
                        ],
                        [
                            'accessor' => 'is_admin',
                            'title' => 'Role',
                            'width' => 100,
                            'render' => fn($record) => $record['is_admin'] ? 'Admin' : 'User',
                            'cellsStyle' => fn($record) => array_merge(
                                $this->defaultColumnProps['cellsStyle']($record) ?? [],
                                ['fontStyle' => 'italic']
                            ),
                        ],
                        [
                            'accessor' => 'email_verified',
                            'title' => 'Verified',
                            'width' => 100,
                            'render' => fn($record) => $record['email_verified'] 
                                ? '<span class="text-green-600">✓</span>' 
                                : '<span class="text-red-600">✗</span>',
                            'html' => true,
                        ],
                    ],
                ],
                [
                    'id' => 'system-info',
                    'title' => 'System Information',
                    'style' => fn($theme) => ['color' => $theme['colors']['gray'][6]],
                    'columns' => [
                        [
                            'accessor' => 'created_at',
                            'title' => 'Created',
                            'width' => 160,
                            'render' => 'DateTime',
                            'visibleMediaQuery' => fn($theme) => "(min-width: {$theme['breakpoints']['md']})",
                        ],
                        [
                            'accessor' => 'updated_at',
                            'title' => 'Updated',
                            'width' => 160,
                            'render' => [
                                'type' => 'relative',
                                'format' => 'MMM D, YYYY',
                            ],
                            'visibleMediaQuery' => fn($theme) => "(min-width: {$theme['breakpoints']['md']})",
                            'footerStyle' => fn($theme) => ['fontStyle' => 'italic'],
                        ],
                        [
                            'accessor' => 'last_login',
                            'title' => 'Last Login',
                            'width' => 160,
                            'render' => [
                                'type' => 'datetime',
                                'relative' => true,
                            ],
                        ],
                    ],
                ],
                [
                    'id' => 'stats',
                    'title' => 'Statistics',
                    'style' => fn($theme) => ['color' => $theme['colors']['violet'][6]],
                    'columns' => [
                        [
                            'accessor' => 'login_count',
                            'title' => 'Logins',
                            'width' => 100,
                            'render' => [
                                'type' => 'number',
                                'locale' => 'en-US',
                                'style' => 'decimal',
                            ],
                        ],
                        [
                            'accessor' => 'success_rate',
                            'title' => 'Success',
                            'width' => 100,
                            'render' => [
                                'type' => 'percent',
                                'minimumFractionDigits' => 1,
                                'maximumFractionDigits' => 1,
                            ],
                        ],
                        [
                            'accessor' => 'account_balance',
                            'title' => 'Balance',
                            'width' => 120,
                            'render' => [
                                'type' => 'currency',
                                'currency' => 'USD',
                                'locale' => 'en-US',
                            ],
                        ],
                    ],
                ],
            ],

            // Table styling
            'props' => [
                'striped' => true,
                'highlightOnHover' => true,
                'withTableBorder' => true,
                'shadow' => 'md',
                'borderRadius' => 'md',
            ],

            // Sorting configuration
            'sortingConfig' => [
                'allowMultiple' => false,
                'defaultField' => 'created_at',
                'defaultDirection' => 'desc',
            ],

            // Pagination configuration
            'paginationConfig' => [
                'defaultRecordsPerPage' => 15,
                'recordsPerPageOptions' => [15, 30, 50, 100],
            ],
        ]);

        // Initialize with registered configuration
        parent::__construct(
            // Get the registered configuration
            ...DataTable::get('users')->props,

            // Override or add specific options
            allowedSortFields: [
                'id', 'name', 'email', 'profile.department', 
                'profile.company', 'color_scheme', 'created_at',
                'updated_at', 'is_admin', 'login_count', 'success_rate',
                'account_balance', 'last_login'
            ]
        );
    }

    /**
     * Load data with proper eager loading and sorting.
     */
    protected function loadData(): void
    {
        $this->loading = true;

        try {
            $query = User::query()->with(['profile']);

            // Use the DataTable manager to handle the query
            $result = DataTable::fromQuery(
                query: $query,
                options: [
                    'page' => $this->page,
                    'recordsPerPage' => $this->recordsPerPage,
                    'sortStatus' => $this->sortStatus,
                ]
            );

            $this->records = $result['records'];
            $this->totalRecords = $result['totalRecords'];
        } catch (\Exception $e) {
            logger()->error('UsersTable load error: ' . $e->getMessage());
            $this->records = collect();
            $this->totalRecords = 0;
        } finally {
            $this->loading = false;
        }
    }

    /**
     * Handle edit user action.
     */
    public function editUser(int $userId): void
    {
        $this->redirect(route('users.edit', $userId));
    }

    /**
     * Handle delete user action.
     */
    public function deleteUser(int $userId): void
    {
        if ($userId > 1) {
            User::destroy($userId);
            $this->loadData();
        }
    }
}
