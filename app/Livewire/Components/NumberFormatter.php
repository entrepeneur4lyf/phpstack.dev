<?php

namespace App\Livewire\Components;

/**
 * NumberFormatter component for formatting numbers with various options.
 *
 * The NumberFormatter component provides a flexible way to format numbers with
 * customizable separators, prefixes, suffixes, and decimal scaling.
 *
 * @see https://mantine.dev/core/number-formatter/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-number-formatter
 *     :value="1234.567"
 *     :decimal-scale="2"
 * />
 * ```
 *
 * @example With currency formatting
 * ```blade
 * <x-mantine-number-formatter
 *     :value="1234.56"
 *     prefix="$"
 *     :thousand-separator=","
 *     :decimal-separator="."
 * />
 * ```
 *
 * @example Custom grouping style
 * ```blade
 * <x-mantine-number-formatter
 *     :value="1234567.89"
 *     :thousands-group-style="'wan'"
 *     suffix=" units"
 * />
 * ```
 */
class NumberFormatter extends MantineComponent
{
    /**
     * Create a new NumberFormatter component instance.
     *
     * @param mixed $value Number to format
     * @param mixed $prefix String to add before the number
     * @param mixed $suffix String to add after the number
     * @param mixed $thousandSeparator Character to use as thousand separator
     * @param mixed $decimalSeparator Character to use as decimal separator
     * @param mixed $thousandsGroupStyle Grouping style ('thousand', 'lakh', 'wan')
     * @param mixed $decimalScale Number of decimal places to show
     * @param mixed $classNames Custom CSS classes
     * @param mixed $styles Custom CSS styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $prefix = null,
        public mixed $suffix = null,
        public mixed $thousandSeparator = null,
        public mixed $decimalSeparator = null,
        public mixed $thousandsGroupStyle = null,
        public mixed $decimalScale = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'thousandSeparator' => $thousandSeparator,
            'decimalSeparator' => $decimalSeparator,
            'thousandsGroupStyle' => $thousandsGroupStyle,
            'decimalScale' => $decimalScale,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
