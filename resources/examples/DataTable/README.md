# DataTable Component Examples

The DataTable component provides a powerful way to display and manage tabular data with built-in support for:
- Sorting
- Pagination
- Color scheme integration
- Custom cell renderers
- Type-safe column configuration

## Basic Usage

```php
use App\Livewire\Components\DataTable;

class MyTable extends DataTable
{
    public function __construct()
    {
        parent::__construct(
            columns: [
                [
                    'accessor' => 'id',
                    'title' => 'ID',
                    'width' => 80,
                ],
                [
                    'accessor' => 'name',
                    'title' => 'Name',
                    'sortable' => true,
                ],
            ],
            allowedSortFields: ['id', 'name'],
            defaultSortField: 'id',
            defaultSortDirection: 'asc',
        );
    }

    protected function loadData(): void
    {
        $query = YourModel::query();
        $query = $this->applySorting($query);
        $this->totalRecords = $query->count();
        $this->records = $this->applyPagination($query)->get();
    }
}
```

## Column Configuration

Each column can have the following properties:

```php
[
    // Required
    'accessor' => 'field_name',     // Field to access in the data
    
    // Optional
    'title' => 'Display Name',      // Column header (defaults to formatted accessor)
    'sortable' => true,             // Enable sorting (default: true)
    'width' => 100,                 // Column width in pixels
    'hidden' => false,              // Hide column
    'ellipsis' => false,           // Truncate overflowing text
    'textAlignment' => 'left',      // Text alignment
    'render' => 'RendererName',    // Built-in renderer to use
]
```

## Built-in Renderers

The DataTable component comes with several built-in renderers:

### ColorSchemeBadge

Renders color scheme values with appropriate styling:

```php
[
    'accessor' => 'color_scheme',
    'title' => 'Theme',
    'render' => 'ColorSchemeBadge',  // Renders as a badge with color
]
```

### DateTime

Formats dates in a consistent way:

```php
[
    'accessor' => 'created_at',
    'title' => 'Created',
    'render' => 'DateTime',  // Formats as "MMM d, yyyy HH:mm"
]
```

## Styling Options

The component supports various styling options:

```php
parent::__construct(
    // ... columns config ...
    striped: true,              // Alternate row colors
    highlightOnHover: true,     // Highlight rows on hover
    withBorder: true,           // Add border around table
    borderRadius: 'md',         // Border radius
    shadow: 'sm',               // Shadow depth
    fontSize: 'sm',             // Font size
    withColumnBorders: false,   // Add borders between columns
);
```

## Color Scheme Integration

The DataTable automatically integrates with the color scheme system:
- Adapts to light/dark mode
- Smooth transitions when switching themes
- Proper contrast in all modes
- Consistent styling with other components

See the UsersTable example for a complete implementation.
