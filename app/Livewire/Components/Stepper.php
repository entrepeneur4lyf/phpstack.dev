<?php

namespace App\Livewire\Components;

/**
 * Stepper component for displaying multi-step processes or workflows.
 *
 * The Stepper component helps break down complex processes into manageable steps,
 * showing progress through a sequence of actions. It's commonly used in forms,
 * onboarding flows, and checkout processes.
 *
 * @see https://mantine.dev/core/stepper/
 *
 * @example Basic usage
 * ```blade
 * <x-mantine-stepper :active="$currentStep">
 *     <x-mantine-stepper-step label="Step 1" description="Create account">
 *         Step 1 content
 *     </x-mantine-stepper-step>
 *     <x-mantine-stepper-step label="Step 2" description="Verify email">
 *         Step 2 content
 *     </x-mantine-stepper-step>
 *     <x-mantine-stepper-step label="Step 3" description="Complete profile">
 *         Step 3 content
 *     </x-mantine-stepper-step>
 * </x-mantine-stepper>
 * ```
 *
 * @example Custom styling
 * ```blade
 * <x-mantine-stepper
 *     :active="$step"
 *     color="blue"
 *     size="lg"
 *     radius="md"
 *     orientation="vertical"
 * >
 *     {{ $steps }}
 * </x-mantine-stepper>
 * ```
 *
 * @example With custom icons and click handling
 * ```blade
 * <x-mantine-stepper
 *     :active="$step"
 *     icon-position="right"
 *     :completed-icon="$checkIcon"
 *     :allow-next-steps-select="true"
 *     :on-step-click="$stepClickHandler"
 * >
 *     {{ $content }}
 * </x-mantine-stepper>
 * ```
 */
class Stepper extends MantineComponent
{
    /**
     * Create a new Stepper component instance.
     *
     * @param mixed $active Current active step index
     * @param mixed $color Color from theme or custom color value
     * @param mixed $radius Border radius of steps ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $size Controls size of all elements ('xs', 'sm', 'md', 'lg', 'xl')
     * @param mixed $iconSize Size of step icons in px
     * @param mixed $orientation Stepper orientation ('horizontal' or 'vertical')
     * @param mixed $iconPosition Controls icon position relative to step body ('right' or 'left')
     * @param mixed $completedIcon Icon displayed when step is completed
     * @param mixed $allowNextStepsSelect Allows clicking steps after active step
     * @param mixed $onStepClick Called when step is clicked
     * @param mixed $classNames Custom class names for stepper elements
     * @param mixed $styles Custom styles for stepper elements
     */
    public function __construct(
        public mixed $active = null,
        public mixed $color = null,
        public mixed $radius = null,
        public mixed $size = null,
        public mixed $iconSize = null,
        public mixed $orientation = null,
        public mixed $iconPosition = null,
        public mixed $completedIcon = null,
        public mixed $allowNextStepsSelect = null,
        public mixed $onStepClick = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'active' => $active,
            'color' => $color,
            'radius' => $radius,
            'size' => $size,
            'iconSize' => $iconSize,
            'orientation' => $orientation,
            'iconPosition' => $iconPosition,
            'completedIcon' => $completedIcon,
            'allowNextStepsSelect' => $allowNextStepsSelect,
            'onStepClick' => $onStepClick,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
