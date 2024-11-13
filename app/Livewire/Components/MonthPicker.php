<?php

namespace App\Livewire\Components;

/**
 * MonthPicker component for selecting months and dates.
 *
 * The MonthPicker component provides a calendar-style interface for selecting months.
 * It supports single month selection, range selection, and multiple month selection modes.
 *
 * @see https://mantine.dev/dates/month-picker/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-month-picker
 *     :value="$selectedMonth"
 *     @change="selectedMonth = $event"
 * />
 * ```
 *
 * @example Range selection
 * ```blade
 * <x-mantine-month-picker
 *     type="range"
 *     :min-date="new Date(2023, 0)"
 *     :max-date="new Date(2024, 11)"
 *     :number-of-columns="2"
 * />
 * ```
 *
 * @example Multiple selection
 * ```blade
 * <x-mantine-month-picker
 *     type="multiple"
 *     :size="'lg'"
 *     :locale="'es'"
 *     :allow-deselect="true"
 * />
 * ```
 */
class MonthPicker extends MantineComponent
{
    /**
     * Create a new MonthPicker component instance.
     *
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param mixed $onChange Callback for value changes
     * @param mixed $type Picker type ('default', 'range', or 'multiple')
     * @param mixed $allowDeselect Allow deselecting values
     * @param mixed $allowSingleDateInRange Allow selecting single date in range picker
     * @param mixed $defaultDate Default date shown on mount
     * @param mixed $date Current displayed date
     * @param mixed $onDateChange Callback for date changes
     * @param mixed $maxLevel Maximum level user can go up to ('year' or 'decade')
     * @param mixed $minDate Minimum possible date to select
     * @param mixed $maxDate Maximum possible date to select
     * @param mixed $getYearControlProps Function to add props to year controls
     * @param mixed $getMonthControlProps Function to add props to month controls
     * @param mixed $numberOfColumns Number of pickers to show
     * @param mixed $size Component size ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $yearsListFormat Years list format
     * @param mixed $monthsListFormat Months list format
     * @param mixed $decadeLabelFormat Decade label format
     * @param mixed $yearLabelFormat Year label format
     * @param mixed $locale Locale used for labels
     * @param mixed $ariaLabels Aria labels
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
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
        public mixed $maxLevel = null,
        public mixed $minDate = null,
        public mixed $maxDate = null,
        public mixed $getYearControlProps = null,
        public mixed $getMonthControlProps = null,
        public mixed $numberOfColumns = null,
        public mixed $size = null,
        public mixed $yearsListFormat = null,
        public mixed $monthsListFormat = null,
        public mixed $decadeLabelFormat = null,
        public mixed $yearLabelFormat = null,
        public mixed $locale = null,
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
            'maxLevel' => $maxLevel,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'getYearControlProps' => $getYearControlProps,
            'getMonthControlProps' => $getMonthControlProps,
            'numberOfColumns' => $numberOfColumns,
            'size' => $size,
            'yearsListFormat' => $yearsListFormat,
            'monthsListFormat' => $monthsListFormat,
            'decadeLabelFormat' => $decadeLabelFormat,
            'yearLabelFormat' => $yearLabelFormat,
            'locale' => $locale,
            'ariaLabels' => $ariaLabels,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
