<?php

namespace App\Livewire\Components;

/**
 * Timeline component for displaying chronological sequences of events.
 *
 * The Timeline component helps visualize a series of events in chronological order,
 * with customizable bullets, active states, and alignment options. It's ideal for
 * displaying process flows, history, or step-by-step guides.
 *
 * @see https://mantine.dev/core/timeline/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-timeline :active="1">
 *     <x-mantine-timeline-item title="First step">
 *         Create account
 *     </x-mantine-timeline-item>
 *     <x-mantine-timeline-item title="Second step">
 *         Verify email
 *     </x-mantine-timeline-item>
 *     <x-mantine-timeline-item title="Final step">
 *         Get started
 *     </x-mantine-timeline-item>
 * </x-mantine-timeline>
 * ```
 *
 * @example Custom styling
 * ```blade
 * <x-mantine-timeline
 *     color="blue"
 *     :active="2"
 *     :bulletSize="24"
 *     :lineWidth="2"
 *     align="right"
 * >
 *     <x-mantine-timeline-item
 *         title="Custom bullet"
 *         bullet="✓"
 *         lineVariant="dashed"
 *     >
 *         Task completed
 *     </x-mantine-timeline-item>
 * </x-mantine-timeline>
 * ```
 *
 * @example With reverse active items
 * ```blade
 * <x-mantine-timeline
 *     :active="1"
 *     :reverseActive="true"
 *     radius="xl"
 * >
 *     <x-mantine-timeline-item title="Pending">
 *         Waiting for review
 *     </x-mantine-timeline-item>
 *     <x-mantine-timeline-item title="In Progress">
 *         Processing
 *     </x-mantine-timeline-item>
 * </x-mantine-timeline>
 * ```
 */
class Timeline extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $active Index of active element
     * @param mixed $bulletSize Size of bullet in px
     * @param mixed $lineWidth Width of the line in px
     * @param mixed $color Color from theme or CSS color value
     * @param mixed $align Timeline alignment ('left' | 'right')
     * @param mixed $reverseActive Reverse active items direction
     * @param mixed $radius Bullet border-radius in px
     * @param mixed $classNames Custom class names for timeline elements
     * @param mixed $styles Custom styles for timeline elements
     */
    public function __construct(
        public mixed $active = null,
        public mixed $bulletSize = null,
        public mixed $lineWidth = null,
        public mixed $color = null,
        public mixed $align = null,
        public mixed $reverseActive = null,
        public mixed $radius = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'active' => $active,
            'bulletSize' => $bulletSize,
            'lineWidth' => $lineWidth,
            'color' => $color,
            'align' => $align,
            'reverseActive' => $reverseActive,
            'radius' => $radius,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * TimelineItem component representing a single event in the timeline.
 *
 * Used as a child component within Timeline to represent individual events
 * or steps, with customizable titles, bullets, and line styles.
 *
 * @example Basic timeline item
 * ```blade
 * <x-mantine-timeline-item title="Event title">
 *     Event content goes here
 * </x-mantine-timeline-item>
 * ```
 */
class TimelineItem extends MantineComponent
{
    /**
     * Create a new timeline item instance.
     *
     * @param mixed $title Item title
     * @param mixed $bullet Custom bullet element
     * @param mixed $lineVariant Line style variant ('solid' | 'dashed' | 'dotted')
     * @param mixed $radius Bullet border-radius in px
     */
    public function __construct(
        public mixed $title = null,
        public mixed $bullet = null,
        public mixed $lineVariant = null,
        public mixed $radius = null,
    ) {
        parent::__construct();

        $this->props = [
            'title' => $title,
            'bullet' => $bullet,
            'lineVariant' => $lineVariant,
            'radius' => $radius,
        ];
    }
}
