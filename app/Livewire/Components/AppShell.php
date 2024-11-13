<?php

namespace App\Livewire\Components;

/**
 * AppShell Component
 *
 * The AppShell component is a layout component that implements a common application shell pattern with 
 * header, navbar, aside and footer areas. It provides a structured layout for building complex applications
 * with a consistent user interface.
 *
 * @link https://mantine.dev/core/app-shell/
 *
 * @property array|null $header Configuration for the header area. Pass header props as an array.
 * @property array|null $navbar Configuration for the navbar area. Pass navbar props as an array.
 * @property array|null $aside Configuration for the aside area. Pass aside props as an array.
 * @property array|null $footer Configuration for the footer area. Pass footer props as an array.
 * @property string|array|null $padding Controls padding within the shell. Can be a string (xs, sm, md, lg, xl) or an array for responsive values.
 * @property string|null $layout Layout type of the shell. Available options: 'default', 'alt'.
 * @property bool|null $withBorder Determines if borders should be displayed between shell sections.
 * @property int|null $zIndex Sets z-index of all elements.
 * @property int|null $transitionDuration Duration of transitions in milliseconds.
 * @property string|null $transitionTimingFunction CSS timing function for transitions.
 * @property bool $disabled When true, navbar, aside and header elements are not rendered.
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-app-shell
 *     :header="['height' => 60]"
 *     :navbar="['width' => 300, 'breakpoint' => 'sm']"
 *     :padding="'md'"
 * >
 *     <x-slot:header>
 *         Your header content
 *     </x-slot:header>
 *
 *     <x-slot:navbar>
 *         Your navigation content
 *     </x-slot:navbar>
 *
 *     Main content goes here
 * </x-mantine-app-shell>
 * ```
 *
 * @example Responsive Layout
 * ```blade
 * <x-mantine-app-shell
 *     :navbar="['width' => ['base' => 200, 'sm' => 300], 'breakpoint' => 'sm']"
 *     :aside="['width' => ['base' => 200, 'sm' => 300], 'breakpoint' => 'sm']"
 *     :padding="['base' => 'sm', 'sm' => 'md', 'lg' => 'lg']"
 *     :layout="'alt'"
 * >
 *     <!-- Component content -->
 * </x-mantine-app-shell>
 * ```
 */
class AppShell extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param array|null $header Header configuration
     * @param array|null $navbar Navbar configuration
     * @param array|null $aside Aside configuration
     * @param array|null $footer Footer configuration
     * @param string|array|null $padding Padding configuration
     * @param string|null $layout Layout type
     * @param bool|null $withBorder Enable/disable borders
     * @param int|null $zIndex Z-index value
     * @param int|null $transitionDuration Duration of transitions
     * @param string|null $transitionTimingFunction Transition timing function
     * @param bool $disabled Disable shell elements
     */
    public function __construct(
        public ?array $header = null,
        public ?array $navbar = null,
        public ?array $aside = null,
        public ?array $footer = null,
        public string|array|null $padding = null,
        public ?string $layout = null,
        public ?bool $withBorder = null,
        public ?int $zIndex = null,
        public ?int $transitionDuration = null,
        public ?string $transitionTimingFunction = null,
        public bool $disabled = false,
    ) {
        parent::__construct();

        $this->props = [
            'header' => $header,
            'navbar' => $navbar,
            'aside' => $aside,
            'footer' => $footer,
            'padding' => $padding ?? config('mantine.defaults.appshell.padding', 'md'),
            'layout' => $layout ?? config('mantine.defaults.appshell.layout', 'default'),
            'withBorder' => $withBorder ?? config('mantine.defaults.appshell.withBorder', true),
            'zIndex' => $zIndex ?? config('mantine.defaults.appshell.zIndex', 200),
            'transitionDuration' => $transitionDuration ?? config('mantine.defaults.appshell.transitionDuration', 200),
            'transitionTimingFunction' => $transitionTimingFunction ?? config('mantine.defaults.appshell.transitionTimingFunction', 'ease'),
            'disabled' => $disabled,
        ];
    }
}
