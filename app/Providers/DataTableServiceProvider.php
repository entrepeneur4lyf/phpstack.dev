<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DataTableServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register main config file
        $this->mergeConfigFrom(
            __DIR__.'/../../config/mantinelivewire/datatable.php', 'mantinelivewire.datatable'
        );

        // Register feature configs
        foreach (['sorting', 'pagination', 'scrolling'] as $feature) {
            $this->mergeConfigFrom(
                __DIR__."/../../config/mantinelivewire/datatable/features/{$feature}.php",
                "mantinelivewire.datatable.features.{$feature}"
            );
        }

        // Register other configs
        foreach (['props', 'styling', 'renderers', 'events', 'validation'] as $config) {
            $this->mergeConfigFrom(
                __DIR__."/../../config/mantinelivewire/datatable/{$config}.php",
                "mantinelivewire.datatable.{$config}"
            );
        }

        // Register any bindings
        $this->app->singleton('datatable.manager', function ($app) {
            return new \App\Support\DataTableManager($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../../config/mantinelivewire/datatable.php' => config_path('mantinelivewire/datatable.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/props.php' => config_path('mantinelivewire/datatable/props.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/styling.php' => config_path('mantinelivewire/datatable/styling.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/renderers.php' => config_path('mantinelivewire/datatable/renderers.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/events.php' => config_path('mantinelivewire/datatable/events.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/validation.php' => config_path('mantinelivewire/datatable/validation.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/features/sorting.php' => config_path('mantinelivewire/datatable/features/sorting.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/features/pagination.php' => config_path('mantinelivewire/datatable/features/pagination.php'),
            __DIR__.'/../../config/mantinelivewire/datatable/features/scrolling.php' => config_path('mantinelivewire/datatable/features/scrolling.php'),
        ], 'mantinelivewire-datatable-config');

        // Add macros to Collection
        Collection::macro('toDataTableRecords', function () {
            return $this->map(function ($item) {
                return is_array($item) ? $item : $item->toArray();
            })->values();
        });

        // Add macros to Builder
        Builder::macro('toDataTable', function (array $columns = [], array $options = []) {
            $query = $this;
            
            // Handle sorting
            if (isset($options['sortStatus'])) {
                $field = $options['sortStatus']['columnAccessor'];
                $direction = $options['sortStatus']['direction'];
                
                if (str_contains($field, '.')) {
                    $parts = explode('.', $field);
                    $lastPart = array_pop($parts);
                    $relation = implode('.', $parts);
                    
                    $query = $query->orderBy(
                        $this->model->newQuery()
                            ->select($lastPart)
                            ->from($this->model->getTable())
                            ->join($relation, "{$relation}.id", '=', "{$this->model->getTable()}.{$relation}_id"),
                        $direction
                    );
                } else {
                    $query = $query->orderBy($field, $direction);
                }
            }

            // Handle pagination
            $page = $options['page'] ?? 1;
            $perPage = $options['recordsPerPage'] ?? config('mantinelivewire.datatable.features.pagination.defaultRecordsPerPage', 10);
            
            return [
                'records' => $query->skip(($page - 1) * $perPage)
                                 ->take($perPage)
                                 ->get()
                                 ->toDataTableRecords(),
                'totalRecords' => $query->count(),
            ];
        });

        // Register Livewire components
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('datatable', \App\Livewire\Components\DataTable::class);
        }

        // Register view components
        if (class_exists(\Illuminate\View\Component::class)) {
            $this->loadViewComponentsAs('mantine', [
                'datatable' => \App\View\Components\DataTable::class,
            ]);
        }

        // Register blade directives
        if (class_exists(\Illuminate\Support\Facades\Blade::class)) {
            \Illuminate\Support\Facades\Blade::directive('datatable', function ($expression) {
                return "<?php echo e(app('datatable.manager')->render($expression)); ?>";
            });
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            'datatable.manager',
        ];
    }
}
