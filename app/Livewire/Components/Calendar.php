<?php

namespace App\Livewire\Components;

/**
 * Calendar Component
 *
 * The Calendar component provides a date selection interface. It can be used standalone
 * or as part of more complex date picking components. It supports various customization
 * options for date rendering and selection behavior.
 *
 * @link https://mantine.dev/dates/calendar/
 *
 * @property mixed $static Removes focus management and keyboard events
 * @property mixed $firstDayOfWeek First day of the week (0-6, 0 = Sunday)
 * @property mixed $weekendDays Array of weekend day numbers (0-6)
 * @property mixed $minDate Minimum date that can be selected
 * @property mixed $maxDate Maximum date that can be selected
 * @property mixed $defaultDate Date that is displayed initially
 * @property mixed $hideOutsideDates Hide dates that are outside of the current month
 * @property mixed $weekdayFormat Format of weekday names ('dd', 'ddd', 'dddd')
 * @property mixed $getDayProps Function to add custom props to day buttons
 * @property mixed $renderDay Custom day render function
 * @property mixed $size Calendar size ('xs', 'sm', 'md', 'lg', 'xl')
 * @property mixed $withCellSpacing Add spacing between calendar cells
 * @property mixed $classNames Custom class names for calendar elements
 * @property mixed $styles Custom styles for calendar elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-calendar />
 * ```
 *
 * @example With Custom Day Props
 * ```blade
 * <x-mantine-calendar
 *     :get-day-props="function ($date) {
 *         return [
 *             'selected' => isSelected($date),
 *             'onClick' => fn() => handleSelect($date),
 *         ];
 *     }"
 * />
 * ```
 *
 * @example With Custom Day Rendering
 * ```blade
 * <x-mantine-calendar
 *     :render-day="function ($date) {
 *         return view('components.calendar-day', ['date' => $date]);
 *     }"
 * />
 * ```
 */
class Calendar extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $static Remove focus management
     * @param mixed $firstDayOfWeek First day of week
     * @param mixed $weekendDays Weekend days array
     * @param mixed $minDate Minimum selectable date
     * @param mixed $maxDate Maximum selectable date
     * @param mixed $defaultDate Initial display date
     * @param mixed $hideOutsideDates Hide outside dates
     * @param mixed $weekdayFormat Weekday name format
     * @param mixed $getDayProps Day props function
     * @param mixed $renderDay Day render function
     * @param mixed $size Calendar size
     * @param mixed $withCellSpacing Add cell spacing
     * @param mixed $classNames Custom classes
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $static = null,
        public mixed $firstDayOfWeek = null,
        public mixed $weekendDays = null,
        public mixed $minDate = null,
        public mixed $maxDate = null,
        public mixed $defaultDate = null,
        public mixed $hideOutsideDates = null,
        public mixed $weekdayFormat = null,
        public mixed $getDayProps = null,
        public mixed $renderDay = null,
        public mixed $size = null,
        public mixed $withCellSpacing = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'static' => $static,
            'firstDayOfWeek' => $firstDayOfWeek,
            'weekendDays' => $weekendDays,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'defaultDate' => $defaultDate,
            'hideOutsideDates' => $hideOutsideDates,
            'weekdayFormat' => $weekdayFormat,
            'getDayProps' => $getDayProps,
            'renderDay' => $renderDay,
            'size' => $size,
            'withCellSpacing' => $withCellSpacing,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
