<?php

namespace App\Support;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;

class DataTableManager
{
    /**
     * The registered table configurations.
     */
    protected array $tables = [];

    /**
     * The base configuration.
     */
    protected array $config;

    /**
     * Create a new DataTableManager instance.
     */
    public function __construct()
    {
        $this->loadConfiguration();
    }

    /**
     * Load and merge all configuration files.
     */
    protected function loadConfiguration(): void
    {
        $this->config = Config::get('mantinelivewire.datatable', []);

        // Ensure required configuration sections exist
        $this->config = array_merge([
            'props' => [],
            'styling' => [],
            'renderers' => [],
            'features' => [],
            'events' => [],
            'validation' => [],
        ], $this->config);
    }

    /**
     * Get a configuration value.
     */
    public function config(string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->config;
        }

        return Arr::get($this->config, $key, $default);
    }

    /**
     * Configure a table instance.
     */
    public function configure(string $name, array $config): void
    {
        // Validate required configuration sections
        $this->validateConfiguration($config);

        // Merge with default configuration
        $config = $this->mergeWithDefaults($config);

        // Store the configuration
        $this->tables[$name] = $config;
    }

    /**
     * Get a configured table instance.
     */
    public function get(string $name): object
    {
        if (!isset($this->tables[$name])) {
            throw new InvalidArgumentException("Table '{$name}' has not been configured.");
        }

        return (object) $this->tables[$name];
    }

    /**
     * Validate the configuration array.
     */
    protected function validateConfiguration(array $config): void
    {
        // Validate required sections
        $requiredSections = ['columns', 'props'];
        foreach ($requiredSections as $section) {
            if (!isset($config[$section])) {
                throw new InvalidArgumentException("Missing required configuration section: {$section}");
            }
        }

        // Validate column configuration
        if (isset($config['columns'])) {
            foreach ($config['columns'] as $column) {
                if (!isset($column['accessor'])) {
                    throw new InvalidArgumentException('Each column must have an accessor.');
                }
            }
        }

        // Validate group configuration
        if (isset($config['groups'])) {
            foreach ($config['groups'] as $group) {
                if (!isset($group['id'])) {
                    throw new InvalidArgumentException('Each group must have an id.');
                }
                if (!isset($group['columns'])) {
                    throw new InvalidArgumentException('Each group must have columns.');
                }
            }
        }
    }

    /**
     * Merge configuration with defaults.
     */
    protected function mergeWithDefaults(array $config): array
    {
        // Merge props
        $config['props'] = array_merge(
            $this->config['props'],
            $config['props'] ?? []
        );

        // Merge styling
        $config['styling'] = array_merge(
            $this->config['styling'],
            $config['styling'] ?? []
        );

        // Merge features
        foreach (['sorting', 'pagination', 'scrolling'] as $feature) {
            if (isset($config['features'][$feature])) {
                $config['features'][$feature] = array_merge(
                    $this->config['features'][$feature] ?? [],
                    $config['features'][$feature]
                );
            } else {
                $config['features'][$feature] = $this->config['features'][$feature] ?? [];
            }
        }

        // Merge renderers
        $config['renderers'] = array_merge(
            $this->config['renderers'],
            $config['renderers'] ?? []
        );

        // Merge events
        $config['events'] = array_merge(
            $this->config['events'],
            $config['events'] ?? []
        );

        return $config;
    }

    /**
     * Process a query with DataTable options.
     */
    public function fromQuery($query, array $options = []): array
    {
        $page = $options['page'] ?? 1;
        $recordsPerPage = $options['recordsPerPage'] ?? 10;
        $sortStatus = $options['sortStatus'] ?? null;

        // Apply sorting
        if ($sortStatus) {
            $direction = $sortStatus['direction'] ?? 'asc';
            $field = $sortStatus['columnAccessor'] ?? 'id';

            if (str_contains($field, '.')) {
                $parts = explode('.', $field);
                $lastPart = array_pop($parts);
                $relation = implode('.', $parts);

                $query->orderBy(
                    $query->getModel()
                        ->newQuery()
                        ->select($lastPart)
                        ->from($query->getModel()->getTable())
                        ->join($relation, "{$relation}.id", '=', "{$query->getModel()->getTable()}.{$relation}_id"),
                    $direction
                );
            } else {
                $query->orderBy($field, $direction);
            }
        }

        // Get total count before pagination
        $totalRecords = $query->count();

        // Apply pagination
        $records = $query->skip(($page - 1) * $recordsPerPage)
                        ->take($recordsPerPage)
                        ->get();

        return [
            'records' => $records,
            'totalRecords' => $totalRecords,
        ];
    }

    /**
     * Get all registered tables.
     */
    public function getTables(): array
    {
        return $this->tables;
    }

    /**
     * Check if a table is configured.
     */
    public function hasTable(string $name): bool
    {
        return isset($this->tables[$name]);
    }

    /**
     * Remove a configured table.
     */
    public function removeTable(string $name): void
    {
        unset($this->tables[$name]);
    }

    /**
     * Clear all configured tables.
     */
    public function clearTables(): void
    {
        $this->tables = [];
    }
}
