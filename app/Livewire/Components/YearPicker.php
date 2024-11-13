<?php

namespace App\Livewire\Components;

/**
 * YearPicker component - A date picker component specialized for selecting years.
 *
 * The YearPicker allows users to select a single year, multiple years, or a range of years.
 * It provides various customization options for date constraints, formatting, and styling.
 *
 * @see https://mantine.dev/dates/year-picker/
 *
 * @example Basic usage with single year selection
 * ```blade
 * <x-mantine-year-picker
 *     placeholder="Pick a year"
 *     :value="$selectedYear"
 * />
 * ```
 *
 * @example Range selection with min/max constraints
 * ```blade
 * <x-mantine-year-picker
 *     type="range"
 *     placeholder="Select years"
 *     :min-date="new Date('2020-01-01')"
 *     :max-date="new Date('2030-12-31')"
 * />
 * ```
 *
 * @example Multiple years selection with custom styling
 * ```blade
 * <x-mantine-year-picker
 *     type="multiple"
 *     placeholder="Select multiple years"
 *     :number-of-columns="2"
 *     size="lg"
 *     :years-list-format="'YYYY'"
 * />
 * ```
 *
 * @param mixed $value Current picker value
 * @param mixed $defaultValue Default value for uncontrolled component
 * @param mixed $onChange Callback for value change
 * @param mixed $type Picker type: 'default', 'range', or 'multiple'
 * @param mixed $allowDeselect Allow deselecting value by clicking selected year
 * @param mixed $allowSingleDateInRange Allow selecting single date as range
 * @param mixed $defaultDate Default date shown on picker
 * @param mixed $date Current date shown on picker
 * @param mixed $onDateChange Callback for date change
 * @param mixed $minDate Minimum possible date to select
 * @param mixed $maxDate Maximum possible date to select
 * @param mixed $getYearControlProps Function to add props to year control
 * @param mixed $numberOfColumns Number of columns to show in picker
 * @param mixed $size Controls size of year controls
 * @param mixed $yearsListFormat Format of years list labels
 * @param mixed $decadeLabelFormat Format of decade label
 * @param mixed $ariaLabels Aria labels for controls
 * @param mixed $classNames Custom class names for picker elements
 * @param mixed $styles Custom styles for picker elements
 */
class YearPicker extends MantineComponent
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $type = null,
        public mixed $allowDeselect = null,
        public mixed $allowSingleDateInRange = null,
        public mixed $defaultDate = null,
        public mixed $date = null,
        public mixed $onDateChange = null,
        public mixed $minDate = null,
        public mixed $maxDate = null,
        public mixed $getYearControlProps = null,
        public mixed $numberOfColumns = null,
        public mixed $size = null,
        public mixed $yearsListFormat = null,
        public mixed $decadeLabelFormat = null,
        public mixed $ariaLabels = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'type' => $type,
            'allowDeselect' => $allowDeselect,
            'allowSingleDateInRange' => $allowSingleDateInRange,
            'defaultDate' => $defaultDate,
            'date' => $date,
            'onDateChange' => $onDateChange,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'getYearControlProps' => $getYearControlProps,
            'numberOfColumns' => $numberOfColumns,
            'size' => $size,
            'yearsListFormat' => $yearsListFormat,
            'decadeLabelFormat' => $decadeLabelFormat,
            'ariaLabels' => $ariaLabels,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
