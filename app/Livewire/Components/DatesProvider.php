<?php

namespace App\Livewire\Components;

/**
 * DatesProvider Component
 *
 * The DatesProvider component is used to provide date-related context to its children.
 * It can be used to manage date selection and provide settings for date-related components.
 *
 * @link https://mantine.dev/core/dates-provider/
 *
 * @property mixed $settings Settings for date management
 * @property mixed $classNames Custom class names for the component
 * @property mixed $styles Custom styles for the component
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-dates-provider :settings="['firstDayOfWeek' => 1]">
 *     <x-mantine-date-picker label="Select a date" />
 * </x-mantine-dates-provider>
 * ```
 */
class DatesProvider extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $settings Settings for date management
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $settings = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'settings' => $settings,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
