<?php

namespace App\View\Components;

use Livewire\Component;

/**
 * Example Calendar Component
 *
 * This example demonstrates various use cases and configurations of the MantineBlade Calendar component.
 * It showcases different selection modes, customizations, and interactive features through practical examples.
 *
 * Features demonstrated:
 * - Basic calendar usage
 * - Custom date selection
 * - Week selection
 * - Static calendar with indicators
 * - Custom settings and configurations
 * - Date range restrictions
 * - Weekend customization
 * - Weekday formatting
 *
 * @see \MantineBlade\Components\Calendar
 * @link https://mantine.dev/dates/calendar/
 */
class ExampleCalendar extends Component
{
    /**
     * Selected dates for multi-select example
     *
     * @var array
     */
    public $selected = [];

    /**
     * Currently hovered date for week selection
     *
     * @var string|null
     */
    public $hovered = null;

    /**
     * Selected value for week selection
     *
     * @var string|null
     */
    public $value = null;

    /**
     * Handle date selection
     *
     * Manages the selection of up to three dates, toggling their selected state
     *
     * @param string $date The date to select/deselect
     * @return void
     */
    public function handleSelect($date)
    {
        $isSelected = collect($this->selected)->contains(function ($d) use ($date) {
            return date('Y-m-d', strtotime($d)) === date('Y-m-d', strtotime($date));
        });

        if ($isSelected) {
            $this->selected = collect($this->selected)
                ->filter(function ($d) use ($date) {
                    return date('Y-m-d', strtotime($d)) !== date('Y-m-d', strtotime($date));
                })
                ->values()
                ->all();
        } elseif (count($this->selected) < 3) {
            $this->selected[] = $date;
        }
    }

    /**
     * Set hovered date for week selection
     *
     * @param string $date The date being hovered
     * @return void
     */
    public function setHovered($date)
    {
        $this->hovered = $date;
    }

    /**
     * Clear hovered date
     *
     * @return void
     */
    public function clearHovered()
    {
        $this->hovered = null;
    }

    /**
     * Set selected value for week selection
     *
     * @param string $date The selected date
     * @return void
     */
    public function setValue($date)
    {
        $this->value = $date;
    }

    /**
     * Render the component
     *
     * Demonstrates:
     * 1. Basic calendar with default settings
     * 2. Custom date picker with 3-date maximum
     * 3. Week picker with hover effects
     * 4. Static calendar with date indicators
     * 5. Calendar with custom settings (first day, weekend days, date range)
     *
     * Each example showcases different features and customization
     * options available with the Calendar component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return <<<'blade'
            <div>
                <!-- Basic usage -->
                <div>
                    <x-mantine-calendar />
                </div>

                <!-- Custom date picker (3 dates max) -->
                <div class="mt-8">
                    <x-mantine-calendar
                        :get-day-props="function ($date) {
                            return [
                                'selected' => collect($selected)->contains(function ($d) use ($date) {
                                    return date('Y-m-d', strtotime($d)) === date('Y-m-d', strtotime($date));
                                }),
                                'onClick' => fn() => \$this->handleSelect($date),
                            ];
                        }"
                    />
                </div>

                <!-- Week picker -->
                <div class="mt-8">
                    <x-mantine-calendar
                        :with-cell-spacing="false"
                        :get-day-props="function ($date) use ($value, $hovered) {
                            $isHovered = $hovered && isInWeekRange($date, $hovered);
                            $isSelected = $value && isInWeekRange($date, $value);
                            $isInRange = $isHovered || $isSelected;

                            return [
                                'onMouseEnter' => fn() => \$this->setHovered($date),
                                'onMouseLeave' => fn() => \$this->clearHovered(),
                                'inRange' => $isInRange,
                                'firstInRange' => $isInRange && date('N', strtotime($date)) == 1,
                                'lastInRange' => $isInRange && date('N', strtotime($date)) == 7,
                                'selected' => $isSelected,
                                'onClick' => fn() => \$this->setValue($date),
                            ];
                        }"
                    />
                </div>

                <!-- Static calendar with indicators -->
                <div class="mt-8">
                    <x-mantine-calendar
                        :static="true"
                        :render-day="function ($date) {
                            $day = date('j', strtotime($date));
                            return <<<'HTML'
                                <x-mantine-indicator
                                    size="6"
                                    color="red"
                                    offset="-2"
                                    :disabled="$day !== 16"
                                >
                                    <div>{{ $day }}</div>
                                </x-mantine-indicator>
                            HTML;
                        }"
                    />
                </div>

                <!-- With custom settings -->
                <div class="mt-8">
                    <x-mantine-calendar
                        size="lg"
                        :first-day-of-week="1"
                        :weekend-days="[0, 6]"
                        :min-date="now()->subMonths(2)"
                        :max-date="now()->addMonths(2)"
                        :default-date="now()"
                        :hide-outside-dates="true"
                        :weekday-format="'ddd'"
                    />
                </div>
            </div>
        blade;
    }

    /**
     * Check if a date is within the week range of a given value
     *
     * @param string $date Date to check
     * @param string $value Reference date
     * @return bool
     */
    private function isInWeekRange($date, $value)
    {
        if (!$value) {
            return false;
        }

        $startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($value)));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($value)));
        $date = date('Y-m-d', strtotime($date));

        return $date >= $startOfWeek && $date <= $endOfWeek;
    }
}
