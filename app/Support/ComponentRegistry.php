<?php

namespace MantineLivewire\Support;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use MantineLivewire\Components\Accordion;
use MantineLivewire\Components\ActionIcon;
use MantineLivewire\Components\Affix;
use MantineLivewire\Components\Alert;
use MantineLivewire\Components\Anchor;
use MantineLivewire\Components\AppShell;
use MantineLivewire\Components\AreaChart;
use MantineLivewire\Components\AspectRatio;
use MantineLivewire\Components\Autocomplete;
use MantineLivewire\Components\Avatar;
use MantineLivewire\Components\BackgroundImage;
use MantineLivewire\Components\Badge;
use MantineLivewire\Components\BarChart;
use MantineLivewire\Components\Blockquote;
use MantineLivewire\Components\Box;
use MantineLivewire\Components\Breadcrumbs;
use MantineLivewire\Components\BubbleChart;
use MantineLivewire\Components\Burger;
use MantineLivewire\Components\Button;
use MantineLivewire\Components\Calendar;
use MantineLivewire\Components\Card;
use MantineLivewire\Components\Carousel;
use MantineLivewire\Components\Center;
use MantineLivewire\Components\Checkbox;
use MantineLivewire\Components\Chip;
use MantineLivewire\Components\ChipGroup;
use MantineLivewire\Components\CloseButton;
use MantineLivewire\Components\Code;
use MantineLivewire\Components\CodeHighlight;
use MantineLivewire\Components\CodeHighlightTabs;
use MantineLivewire\Components\Collapse;
use MantineLivewire\Components\ColorInput;
use MantineLivewire\Components\ColorPicker;
use MantineLivewire\Components\ColorSwatch;
use MantineLivewire\Components\Combobox;
use MantineLivewire\Components\CompositeChart;
use MantineLivewire\Components\Container;
use MantineLivewire\Components\ContextMenu;
use MantineLivewire\Components\CopyButton;
use MantineLivewire\Components\DateInput;
use MantineLivewire\Components\DatePicker;
use MantineLivewire\Components\DatePickerInput;
use MantineLivewire\Components\DateTimePicker;
use MantineLivewire\Components\DatesProvider;
use MantineLivewire\Components\Dialog;
use MantineLivewire\Components\Divider;
use MantineLivewire\Components\DonutChart;
use MantineLivewire\Components\Drawer;
use MantineLivewire\Components\Dropzone;
use MantineLivewire\Components\Fieldset;
use MantineLivewire\Components\FileButton;
use MantineLivewire\Components\FileInput;
use MantineLivewire\Components\Flex;
use MantineLivewire\Components\Flip;
use MantineLivewire\Components\FloatingIndicator;
use MantineLivewire\Components\FocusTrap;
use MantineLivewire\Components\Grid;
use MantineLivewire\Components\Group;
use MantineLivewire\Components\Highlight;
use MantineLivewire\Components\HoverCard;
use MantineLivewire\Components\Icon;
use MantineLivewire\Components\Image;
use MantineLivewire\Components\Indicator;
use MantineLivewire\Components\InlineCodeHighlight;
use MantineLivewire\Components\Input;
use MantineLivewire\Components\JsonInput;
use MantineLivewire\Components\Kbd;
use MantineLivewire\Components\LineChart;
use MantineLivewire\Components\Loader;
use MantineLivewire\Components\LoadingOverlay;
use MantineLivewire\Components\MantineComponent;
use MantineLivewire\Components\MantineList;
use MantineLivewire\Components\Mark;
use MantineLivewire\Components\Marquee;
use MantineLivewire\Components\Menu;
use MantineLivewire\Components\Modal;
use MantineLivewire\Components\ModalsProvider;
use MantineLivewire\Components\MonthPicker;
use MantineLivewire\Components\MonthPickerInput;
use MantineLivewire\Components\MultiSelect;
use MantineLivewire\Components\NativeSelect;
use MantineLivewire\Components\NavLink;
use MantineLivewire\Components\NavigationProgress;
use MantineLivewire\Components\Notification;
use MantineLivewire\Components\Notifications;
use MantineLivewire\Components\NumberFormatter;
use MantineLivewire\Components\NumberInput;
use MantineLivewire\Components\Overlay;
use MantineLivewire\Components\Pagination;
use MantineLivewire\Components\Paper;
use MantineLivewire\Components\PasswordInput;
use MantineLivewire\Components\PieChart;
use MantineLivewire\Components\Pill;
use MantineLivewire\Components\PillsInput;
use MantineLivewire\Components\PinInput;
use MantineLivewire\Components\Popover;
use MantineLivewire\Components\Portal;
use MantineLivewire\Components\Progress;
use MantineLivewire\Components\QueryBuilder;
use MantineLivewire\Components\RadarChart;
use MantineLivewire\Components\Radio;
use MantineLivewire\Components\Rating;
use MantineLivewire\Components\RichTextEditor;
use MantineLivewire\Components\RingProgress;
use MantineLivewire\Components\ScatterChart;
use MantineLivewire\Components\ScrollArea;
use MantineLivewire\Components\SegmentedControl;
use MantineLivewire\Components\Select;
use MantineLivewire\Components\SemiCircleProgress;
use MantineLivewire\Components\SimpleGrid;
use MantineLivewire\Components\Skeleton;
use MantineLivewire\Components\Slider;
use MantineLivewire\Components\Space;
use MantineLivewire\Components\Sparkline;
use MantineLivewire\Components\Spoiler;
use MantineLivewire\Components\Spotlight;
use MantineLivewire\Components\Stack;
use MantineLivewire\Components\Stepper;
use MantineLivewire\Components\SwitchInput;
use MantineLivewire\Components\Table;
use MantineLivewire\Components\Tabs;
use MantineLivewire\Components\TagsInput;
use MantineLivewire\Components\Text;
use MantineLivewire\Components\TextInput;
use MantineLivewire\Components\Textarea;
use MantineLivewire\Components\ThemeIcon;
use MantineLivewire\Components\TimeInput;
use MantineLivewire\Components\Timeline;
use MantineLivewire\Components\Title;
use MantineLivewire\Components\Tooltip;
use MantineLivewire\Components\Transition;
use MantineLivewire\Components\Tree;
use MantineLivewire\Components\TypographyStylesProvider;
use MantineLivewire\Components\UnstyledButton;
use MantineLivewire\Components\VisuallyHidden;
use MantineLivewire\Components\YearPicker;
use MantineLivewire\Components\YearPickerInput;

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
