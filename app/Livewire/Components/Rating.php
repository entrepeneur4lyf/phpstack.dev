<?php

namespace App\Livewire\Components;

/**
 * Rating Component
 *
 * The Rating component is used to display a rating system, allowing users to select a value
 * from a predefined range. It supports various customization options such as color, size,
 * and symbols for filled and empty states.
 *
 * @link https://mantine.dev/core/rating/
 *
 * @property ?string $color Color of the rating stars
 * @property ?string $size Size of the rating stars
 * @property ?int $count Total number of stars
 * @property ?bool $highlightSelectedOnly Highlight only selected stars
 * @property mixed $value Current rating value
 * @property mixed $defaultValue Default rating value
 * @property ?bool $readOnly Determines if the rating is read-only
 * @property ?int $fractions Number of fractions for half stars
 * @property mixed $emptySymbol Symbol for empty stars
 * @property mixed $fullSymbol Symbol for filled stars
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-rating value="3" count="5" />
 * ```
 */
class Rating extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param ?string $color Color of the rating stars
     * @param ?string $size Size of the rating stars
     * @param ?int $count Total number of stars
     * @param ?bool $highlightSelectedOnly Highlight only selected stars
     * @param mixed $value Current rating value
     * @param mixed $defaultValue Default rating value
     * @param ?bool $readOnly Determines if the rating is read-only
     * @param ?int $fractions Number of fractions for half stars
     * @param mixed $emptySymbol Symbol for empty stars
     * @param mixed $fullSymbol Symbol for filled stars
     */
    public function __construct(
        public ?string $color = null,
        public ?string $size = null,
        public ?int $count = null,
        public ?bool $highlightSelectedOnly = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public ?bool $readOnly = null,
        public ?int $fractions = null,
        public mixed $emptySymbol = null,
        public mixed $fullSymbol = null,
    ) {
        parent::__construct();

        $this->props = [
            'color' => $color,
            'size' => $size,
            'count' => $count,
            'highlightSelectedOnly' => $highlightSelectedOnly,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'readOnly' => $readOnly,
            'fractions' => $fractions,
            'emptySymbol' => $emptySymbol,
            'fullSymbol' => $fullSymbol,
        ];
    }
}
