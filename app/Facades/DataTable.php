<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * @method static \App\Support\DataTableManager register(string $name, array $config)
 * @method static array|null getConfig(string $name)
 * @method static \App\Livewire\Components\DataTable make(string $name = null, array $config = [])
 * @method static string render($expression)
 * @method static array fromQuery(Builder $query, array $columns = [], array $options = [])
 * @method static array fromCollection(Collection $collection, array $columns = [], array $options = [])
 * @method static array processColumns(array $columns)
 * @method static string validateSize(string $value, string $default = 'sm')
 * @method static string validateAlignment(string $value, string $default = 'center')
 * @method static array getDefaultClassNames()
 * @method static array getRecordsPerPageOptions()
 * @method static \Illuminate\Contracts\Container\Container getContainer()
 * 
 * @see \App\Support\DataTableManager
 */
class DataTable extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'datatable.manager';
    }

    /**
     * Register a new DataTable configuration.
     * 
     * @param string $name
     * @param array $config
     * @return \App\Support\DataTableManager
     */
    public static function configure(string $name, array $config): \App\Support\DataTableManager
    {
        return static::register($name, $config);
    }

    /**
     * Create a new DataTable from a query.
     * 
     * @param Builder $query
     * @param array $columns
     * @param array $options
     * @return \App\Livewire\Components\DataTable
     */
    public static function query(Builder $query, array $columns = [], array $options = []): \App\Livewire\Components\DataTable
    {
        $data = static::fromQuery($query, $columns, $options);
        return static::make(null, array_merge($options, $data));
    }

    /**
     * Create a new DataTable from a collection.
     * 
     * @param Collection $collection
     * @param array $columns
     * @param array $options
     * @return \App\Livewire\Components\DataTable
     */
    public static function collection(Collection $collection, array $columns = [], array $options = []): \App\Livewire\Components\DataTable
    {
        $data = static::fromCollection($collection, $columns, $options);
        return static::make(null, array_merge($options, $data));
    }

    /**
     * Create a new DataTable with the given configuration.
     * 
     * @param array $config
     * @return \App\Livewire\Components\DataTable
     */
    public static function create(array $config = []): \App\Livewire\Components\DataTable
    {
        return static::make(null, $config);
    }

    /**
     * Get a registered DataTable configuration.
     * 
     * @param string $name
     * @return \App\Livewire\Components\DataTable
     * @throws \InvalidArgumentException
     */
    public static function get(string $name): \App\Livewire\Components\DataTable
    {
        $config = static::getConfig($name);

        if (!$config) {
            throw new \InvalidArgumentException("DataTable configuration [{$name}] not found.");
        }

        return static::make($name);
    }
}
