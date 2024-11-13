<?php

namespace App\Livewire\Components;

/**
 * DatePicker Component
 *
 * The DatePicker component provides a date selection interface. It supports various date formats,
 * validation, and can be used in forms and custom interfaces.
 *
 * @link https://mantine.dev/core/date-picker/
 *
 * @property mixed $value Current date value
 * @property mixed $defaultValue Default date value for uncontrolled state
 * @property mixed $onChange Function called when date changes
 * @property mixed $type Type of date picker ('default', 'range', etc.)
 * @property mixed $allowDeselect Allow deselecting the date
 * @property mixed $allowSingleDateInRange Allow single date selection in range mode
 * @property mixed $defaultDate Default date to display
 * @property mixed $date Current date
 * @property mixed $onDateChange Function called when date changes
 * @property mixed $defaultLevel Default level to display
 * @property mixed $level Current level
 * @property mixed $onLevelChange Function called when level changes
 * @property mixed $maxLevel Maximum level to display
 * @property mixed $minLevel Minimum level to display
 * @property mixed $hideOutsideDates Hide dates outside the current month
 * @property mixed $hideWeekdays Hide weekdays
 * @property mixed $weekendDays Array of weekend days
 * @property mixed $firstDayOfWeek First day of the week (0-6, 0 = Sunday)
 * @property mixed $renderDay Function to render custom day
 * @property mixed $getDayProps Function to get custom props for day buttons
 * @property mixed $getYearControlProps Function to get props for year control
 * @property mixed $getMonthControlProps Function to get props for month control
 * @property mixed $minDate Minimum selectable date
 * @property mixed $maxDate Maximum selectable date
 * @property mixed $excludeDate Excluded dates
 * @property mixed $numberOfColumns Number of columns in the calendar
 * @property mixed $size Input size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $yearsListFormat Format for years list
 * @property mixed $monthsListFormat Format for months list
 * @property mixed $decadeLabelFormat Format for decade label
 * @property mixed $yearLabelFormat Format for year label
 * @property mixed $monthLabelFormat Format for month label
 * @property mixed $locale Locale for date formatting
 * @property mixed $ariaLabels Accessibility labels
 * @property mixed $classNames Custom class names for input elements
 * @property mixed $styles Custom styles for input elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-date-picker
 *     label="Select a date"
 *     placeholder="Pick a date"
 * />
 * ```
 *
 * @example With Min and Max Dates
 * ```blade
 * <x-mantine-date-picker
 *     label="Select a date"
 *     min-date="2023-01-01"
 *     max-date="2023-12-31"
 * />
 * ```
 *
 * @example With Error State
 * ```blade
 * <x-mantine-date-picker
 *     label="Select a date"
 *     error="Invalid date selected"
 * />
 * ```
 */
class DatePicker extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current value
     * @param mixed $defaultValue Default value
     * @param mixed $onChange Change handler
     * @param mixed $type Type of date picker
     * @param mixed $allowDeselect Allow deselect
     * @param mixed $allowSingleDateInRange Allow single date in range
     * @param mixed $defaultDate Default date
     * @param mixed $date Current date
     * @param mixed $onDateChange Date change handler
     * @param mixed $defaultLevel Default level
     * @param mixed $level Current level
     * @param mixed $onLevelChange Level change handler
     * @param mixed $maxLevel Maximum level
     * @param mixed $minLevel Minimum level
     * @param mixed $hideOutsideDates Hide outside dates
     * @param mixed $hideWeekdays Hide weekdays
     * @param mixed $weekendDays Weekend days
     * @param mixed $firstDayOfWeek First day of week
     * @param mixed $renderDay Render day function
     * @param mixed $getDayProps Get day props function
     * @param mixed $getYearControlProps Get year control props function
     * @param mixed $getMonthControlProps Get month control props function
     * @param mixed $minDate Minimum date
     * @param mixed $maxDate Maximum date
     * @param mixed $excludeDate Excluded dates
     * @param mixed $numberOfColumns Number of columns
     * @param mixed $size Input size
     * @param mixed $yearsListFormat Years list format
     * @param mixed $monthsListFormat Months list format
     * @param mixed $decadeLabelFormat Decade label format
     * @param mixed $yearLabelFormat Year label format
     * @param mixed $monthLabelFormat Month label format
     * @param mixed $locale Locale
     * @param mixed $ariaLabels Accessibility labels
     * @param mixed $classNames Custom classes
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
        public mixed $defaultLevel = null,
        public mixed $level = null,
        public mixed $onLevelChange = null,
        public mixed $maxLevel = null,
        public mixed $minLevel = null,
        public mixed $hideOutsideDates = null,
        public mixed $hideWeekdays = null,
        public mixed $weekendDays = null,
        public mixed $firstDayOfWeek = null,
        public mixed $renderDay = null,
        public mixed $getDayProps = null,
        public mixed $getYearControlProps = null,
        public mixed $getMonthControlProps = null,
        public mixed $minDate = null,
        public mixed $maxDate = null,
        public mixed $excludeDate = null,
        public mixed $numberOfColumns = null,
        public mixed $size = null,
        public mixed $yearsListFormat = null,
        public mixed $monthsListFormat = null,
        public mixed $decadeLabelFormat = null,
        public mixed $yearLabelFormat = null,
        public mixed $monthLabelFormat = null,
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
            'defaultLevel' => $defaultLevel,
            'level' => $level,
            'onLevelChange' => $onLevelChange,
            'maxLevel' => $maxLevel,
            'minLevel' => $minLevel,
            'hideOutsideDates' => $hideOutsideDates,
            'hideWeekdays' => $hideWeekdays,
            'weekendDays' => $weekendDays,
            'firstDayOfWeek' => $firstDayOfWeek,
            'renderDay' => $renderDay,
            'getDayProps' => $getDayProps,
            'getYearControlProps' => $getYearControlProps,
            'getMonthControlProps' => $getMonthControlProps,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'excludeDate' => $excludeDate,
            'numberOfColumns' => $numberOfColumns,
            'size' => $size,
            'yearsListFormat' => $yearsListFormat,
            'monthsListFormat' => $monthsListFormat,
            'decadeLabelFormat' => $decadeLabelFormat,
            'yearLabelFormat' => $yearLabelFormat,
            'monthLabelFormat' => $monthLabelFormat,
            'locale' => $locale,
            'ariaLabels' => $ariaLabels,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
