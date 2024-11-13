<?php

namespace MantineLivewire\Components;

/**
 * Fieldset Component
 *
 * The Fieldset component is used to group related elements within a form. It can include a legend
 * and provides options for styling and customization.
 *
 * @link https://mantine.dev/core/fieldset/
 *
 * @property string|null $legend Legend text for the fieldset
 * @property string|null $variant Visual variant ('default', 'filled', 'unstyled')
 * @property string|null $radius Border radius from theme.radius or number for value in px
 * @property bool|null $disabled Disable the fieldset
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-fieldset legend="Personal Information">
 *     <x-mantine-text-input label="First Name" />
 *     <x-mantine-text-input label="Last Name" />
 * </x-mantine-fieldset>
 * ```
 *
 * @example With Disabled State
 * ```blade
 * <x-mantine-fieldset legend="Personal Information" :disabled="true">
 *     <x-mantine-text-input label="First Name" />
 *     <x-mantine-text-input label="Last Name" />
 * </x-mantine-fieldset>
 * ```
 */
class Fieldset extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param string|null $legend Legend text
     * @param string|null $variant Visual style
     * @param string|null $radius Border radius
     * @param bool|null $disabled Disabled state
     */
    public function __construct(
        public ?string $legend = null,
        public ?string $variant = null,
        public ?string $radius = null,
        public ?bool $disabled = null,
    ) {
        parent::__construct();

        $this->props = [
            'legend' => $legend,
            'variant' => $variant,
            'radius' => $radius,
            'disabled' => $disabled,
        ];
    }
}
