<?php

namespace MantineLivewire\Support;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use App\Livewire\Components\Accordion;
use App\Livewire\Components\ActionIcon;
use App\Livewire\Components\Affix;
use App\Livewire\Components\Alert;
use App\Livewire\Components\Anchor;
use App\Livewire\Components\AppShell;
use App\Livewire\Components\AreaChart;
use App\Livewire\Components\AspectRatio;
use App\Livewire\Components\Autocomplete;
use App\Livewire\Components\Avatar;
use App\Livewire\Components\BackgroundImage;
use App\Livewire\Components\Badge;
use App\Livewire\Components\BarChart;
use App\Livewire\Components\Blockquote;
use App\Livewire\Components\Box;
use App\Livewire\Components\Breadcrumbs;
use App\Livewire\Components\BubbleChart;
use App\Livewire\Components\Burger;
use App\Livewire\Components\Button;
use App\Livewire\Components\Calendar;
use App\Livewire\Components\Card;
use App\Livewire\Components\Carousel;
use App\Livewire\Components\Center;
use App\Livewire\Components\Checkbox;
use App\Livewire\Components\Chip;
use App\Livewire\Components\ChipGroup;
use App\Livewire\Components\CloseButton;
use App\Livewire\Components\Code;
use App\Livewire\Components\CodeHighlight;
use App\Livewire\Components\CodeHighlightTabs;
use App\Livewire\Components\Collapse;
use App\Livewire\Components\ColorInput;
use App\Livewire\Components\ColorPicker;
use App\Livewire\Components\ColorSwatch;
use App\Livewire\Components\Combobox;
use App\Livewire\Components\CompositeChart;
use App\Livewire\Components\Container;
use App\Livewire\Components\ContextMenu;
use App\Livewire\Components\CopyButton;
use App\Livewire\Components\DateInput;
use App\Livewire\Components\DatePicker;
use App\Livewire\Components\DatePickerInput;
use App\Livewire\Components\DateTimePicker;
use App\Livewire\Components\DatesProvider;
use App\Livewire\Components\Dialog;
use App\Livewire\Components\Divider;
use App\Livewire\Components\DonutChart;
use App\Livewire\Components\Drawer;
use App\Livewire\Components\Dropzone;
use App\Livewire\Components\Fieldset;
use App\Livewire\Components\FileButton;
use App\Livewire\Components\FileInput;
use App\Livewire\Components\Flex;
use App\Livewire\Components\Flip;
use App\Livewire\Components\FloatingIndicator;
use App\Livewire\Components\FocusTrap;
use App\Livewire\Components\Grid;
use App\Livewire\Components\Group;
use App\Livewire\Components\Highlight;
use App\Livewire\Components\HoverCard;
use App\Livewire\Components\Icon;
use App\Livewire\Components\Image;
use App\Livewire\Components\Indicator;
use App\Livewire\Components\InlineCodeHighlight;
use App\Livewire\Components\Input;
use App\Livewire\Components\JsonInput;
use App\Livewire\Components\Kbd;
use App\Livewire\Components\LineChart;
use App\Livewire\Components\Loader;
use App\Livewire\Components\LoadingOverlay;
use App\Livewire\Components\MantineComponent;
use App\Livewire\Components\MantineList;
use App\Livewire\Components\Mark;
use App\Livewire\Components\Marquee;
use App\Livewire\Components\Menu;
use App\Livewire\Components\Modal;
use App\Livewire\Components\ModalsProvider;
use App\Livewire\Components\MonthPicker;
use App\Livewire\Components\MonthPickerInput;
use App\Livewire\Components\MultiSelect;
use App\Livewire\Components\NativeSelect;
use App\Livewire\Components\NavLink;
use App\Livewire\Components\NavigationProgress;
use App\Livewire\Components\Notification;
use App\Livewire\Components\Notifications;
use App\Livewire\Components\NumberFormatter;
use App\Livewire\Components\NumberInput;
use App\Livewire\Components\Overlay;
use App\Livewire\Components\Pagination;
use App\Livewire\Components\Paper;
use App\Livewire\Components\PasswordInput;
use App\Livewire\Components\PieChart;
use App\Livewire\Components\Pill;
use App\Livewire\Components\PillsInput;
use App\Livewire\Components\PinInput;
use App\Livewire\Components\Popover;
use App\Livewire\Components\Portal;
use App\Livewire\Components\Progress;
use App\Livewire\Components\QueryBuilder;
use App\Livewire\Components\RadarChart;
use App\Livewire\Components\Radio;
use App\Livewire\Components\Rating;
use App\Livewire\Components\RichTextEditor;
use App\Livewire\Components\RingProgress;
use App\Livewire\Components\ScatterChart;
use App\Livewire\Components\ScrollArea;
use App\Livewire\Components\SegmentedControl;
use App\Livewire\Components\Select;
use App\Livewire\Components\SemiCircleProgress;
use App\Livewire\Components\SimpleGrid;
use App\Livewire\Components\Skeleton;
use App\Livewire\Components\Slider;
use App\Livewire\Components\Space;
use App\Livewire\Components\Sparkline;
use App\Livewire\Components\Spoiler;
use App\Livewire\Components\Spotlight;
use App\Livewire\Components\Stack;
use App\Livewire\Components\Stepper;
use App\Livewire\Components\SwitchInput;
use App\Livewire\Components\Table;
use App\Livewire\Components\Tabs;
use App\Livewire\Components\TagsInput;
use App\Livewire\Components\Text;
use App\Livewire\Components\TextInput;
use App\Livewire\Components\Textarea;
use App\Livewire\Components\ThemeIcon;
use App\Livewire\Components\TimeInput;
use App\Livewire\Components\Timeline;
use App\Livewire\Components\Title;
use App\Livewire\Components\Tooltip;
use App\Livewire\Components\Transition;
use App\Livewire\Components\Tree;
use App\Livewire\Components\TypographyStylesProvider;
use App\Livewire\Components\UnstyledButton;
use App\Livewire\Components\VisuallyHidden;
use App\Livewire\Components\YearPicker;
use App\Livewire\Components\YearPickerInput;

class ComponentRegistry
{
    /**
     * Components that have been used in views
     *
     * @var array
     */
    protected static $usedComponents = [];

    /**
     * PHP Components that have been loaded
     *
     * @var array
     */
    protected static $loadedPhpComponents = [];

    /**
     * Special case stylesheets that don't follow the standard pattern.
     * These correspond to the "Custom styles" section in the mantinelivewire.php config file.
     * Unlike standard Mantine components that follow the "@mantine/core/styles/{Component}.css" pattern,
     * these components use different paths or come from external packages:
     * 
     * - RichTextEditor: Uses @mantine/tiptap/styles.css
     * - Dropzone: Uses @mantine/dropzone/styles.css
     * - NavigationProgress: Uses @mantine/nprogress/styles.css
     * - Flip: Uses @gfazioli/mantine-flip/styles.css and styles.layer.css
     * - QueryBuilder: Uses react-querybuilder/dist/query-builder.css
     *
     * @var array<string, string[]>
     */
    protected static $specialStylesheets = [
        'RichTextEditor' => ['@mantine/tiptap/styles.css'],
        'Dropzone' => ['@mantine/dropzone/styles.css'],
        'NavigationProgress' => ['@mantine/nprogress/styles.css'],
        'Flip' => [
            '@gfazioli/mantine-flip/styles.css',
            '@gfazioli/mantine-flip/styles.layer.css'
        ],
        'QueryBuilder' => ['react-querybuilder/dist/query-builder.css']
    ];

    /**
     * Core component dependencies.
     * This maps components to their required dependencies to ensure all necessary
     * stylesheets are loaded. For example, Button requires UnstyledButton,
     * and all form inputs require Input and InlineInput.
     *
     * @var array<string, string[]>
     */
    protected static $coreDependencies = [
        'Button' => ['UnstyledButton'],
        'Modal' => ['Paper', 'CloseButton', 'Overlay', 'ModalBase'],
        'Select' => ['Input', 'Popover', 'ScrollArea'],
        'Checkbox' => ['Input', 'InlineInput', 'CheckboxCard', 'CheckboxIndicator'],
        'Radio' => ['Input', 'InlineInput', 'RadioCard', 'RadioIndicator'],
        'Switch' => ['Input', 'InlineInput'],
        'TextInput' => ['Input', 'InlineInput'],
        'NumberInput' => ['Input', 'InlineInput'],
        'PasswordInput' => ['Input', 'InlineInput'],
        'PinInput' => ['Input', 'InlineInput'],
        'ColorInput' => ['Input', 'InlineInput', 'ColorPicker'],
        'PillsInput' => ['Input', 'InlineInput', 'Pill'],
        'Drawer' => ['Paper', 'CloseButton', 'Overlay', 'ModalBase'],
        'Menu' => ['Paper', 'ScrollArea'],
        'Popover' => ['Paper', 'ScrollArea'],
        'Dialog' => ['Paper', 'Group'],
        'Notification' => ['Paper', 'Group', 'CloseButton'],
        'Card' => ['Paper'],
        'AppShell' => ['Paper', 'ScrollArea'],
        'LoadingOverlay' => ['Overlay', 'Loader'],
        'HoverCard' => ['Paper', 'ScrollArea'],
        'Tooltip' => ['Paper'],
        'Combobox' => ['Input', 'ScrollArea'],
        'MultiSelect' => ['Input', 'ScrollArea'],
        'NativeSelect' => ['Input'],
        'JsonInput' => ['Input'],
        'Textarea' => ['Input'],
        'FileInput' => ['Input'],
        'DateInput' => ['Input'],
        'TimeInput' => ['Input'],
        'MonthPickerInput' => ['Input'],
        'YearPickerInput' => ['Input'],
    ];

    /**
     * Register a component as being used
     *
     * @param string $componentName
     * @return void
     */
    public static function register(string $componentName): void
    {
        static::$usedComponents[$componentName] = true;

        // Register core dependencies automatically
        if (isset(static::$coreDependencies[$componentName])) {
            foreach (static::$coreDependencies[$componentName] as $dep) {
                static::$usedComponents[$dep] = true;
            }
        }
    }

    /**
     * Get required stylesheets based on used components.
     * Uses case-insensitive matching to handle stylesheets that might be defined
     * with different casing in the config file, such as:
     * - @mantine/tiptap/styles.css
     * - @mantine/core/styles/Button.css
     * - @mantine/core/styles/button.css
     *
     * @return array
     */
    public static function getRequiredStylesheets(): array
    {
        $stylesheets = Config::get('mantinelivewire.stylesheets', []);
        $required = [];

        // Always include required global styles if enabled
        if (isset($stylesheets['@mantine/core/styles/global.css']) && 
            $stylesheets['@mantine/core/styles/global.css']) {
            $required['@mantine/core/styles/global.css'] = true;
        }

        foreach (static::$usedComponents as $component => $used) {
            // First check for special case stylesheets
            if (isset(static::$specialStylesheets[$component])) {
                foreach (static::$specialStylesheets[$component] as $specialStylesheet) {
                    if (isset($stylesheets[$specialStylesheet]) && $stylesheets[$specialStylesheet]) {
                        $required[$specialStylesheet] = true;
                    }
                }
                continue;
            }

            // Standard Mantine component stylesheet
            $stylesheet = "@mantine/core/styles/{$component}.css";
            
            // Case-insensitive search in stylesheets array
            $found = false;
            foreach ($stylesheets as $key => $enabled) {
                if (strcasecmp($key, $stylesheet) === 0 && $enabled) {
                    $required[$key] = true;
                    $found = true;
                    break;
                }
            }

            if ($found) {
                // Include dependencies if enabled
                static::includeComponentDependencies($component, $stylesheets, $required);
            }
        }

        return $required;
    }

    /**
     * Get list of used components
     *
     * @return array
     */
    public static function getUsedComponents(): array
    {
        return array_keys(static::$usedComponents);
    }

    /**
     * Check if a component has been used
     *
     * @param string $componentName
     * @return bool
     */
    public static function isComponentUsed(string $componentName): bool
    {
        return isset(static::$usedComponents[$componentName]);
    }

    /**
     * Check if a component is protected
     *
     * @param string $componentName
     * @return bool
     */
    public static function isProtected(string $componentName): bool
    {
        $protectedComponents = Config::get('mantinelivewire.protected_components', []);
        return in_array($componentName, $protectedComponents);
    }

    /**
     * Include required dependencies for specific components
     *
     * @param string $component
     * @param array $stylesheets
     * @param array &$required
     * @return void
     */
    protected static function includeComponentDependencies(string $component, array $stylesheets, array &$required): void
    {
        if (isset(static::$coreDependencies[$component])) {
            foreach (static::$coreDependencies[$component] as $dep) {
                $depStylesheet = "@mantine/core/styles/{$dep}.css";
                
                // Case-insensitive search for dependency stylesheet
                foreach ($stylesheets as $key => $enabled) {
                    if (strcasecmp($key, $depStylesheet) === 0 && $enabled) {
                        $required[$key] = true;
                        break;
                    }
                }
            }
        }
    }

    /**
     * Reset the registry while preserving protected components
     *
     * @return void
     */
    public static function reset(): void
    {
        // Get protected components before reset
        $protectedComponents = [];
        foreach (static::$usedComponents as $component => $used) {
            if (static::isProtected($component)) {
                $protectedComponents[$component] = true;
            }
        }

        // Reset registries
        static::$usedComponents = $protectedComponents;
        static::$loadedPhpComponents = array_filter(
            static::$loadedPhpComponents,
            fn($class) => static::isProtected(class_basename($class))
        );
    }
}
