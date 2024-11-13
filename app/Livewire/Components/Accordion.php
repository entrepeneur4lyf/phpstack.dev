<?php

namespace App\Livewire\Components;

/**
 * Accordion Component
 *
 * The Accordion component displays a list of expandable sections. It's commonly used to organize
 * content into collapsible sections to save vertical space and reduce information overload.
 *
 * @link https://mantine.dev/core/accordion/
 *
 * @property mixed $value Current controlled value
 * @property mixed $defaultValue Default value for uncontrolled state
 * @property mixed $onChange Callback fired when value changes
 * @property mixed $multiple Allow multiple items to be opened at the same time
 * @property mixed $variant Visual variant of the accordion ('default', 'contained', 'filled', 'separated')
 * @property mixed $radius Border radius from theme.radius or number to set value in px
 * @property mixed $chevronPosition Position of the chevron ('left' or 'right')
 * @property mixed $disableChevronRotation Disable chevron rotation animation
 * @property mixed $chevron Custom chevron icon
 * @property mixed $order Order of button and chevron ('button-chevron' or 'chevron-button')
 * @property mixed $transitionDuration Duration of the transition animation in ms
 * @property mixed $unstyled Remove default styles
 * @property mixed $classNames Custom class names for accordion elements
 * @property mixed $styles Custom styles for accordion elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-accordion>
 *     <x-mantine-accordion-item value="item1">
 *         <x-mantine-accordion-control>
 *             First Item
 *         </x-mantine-accordion-control>
 *         <x-mantine-accordion-panel>
 *             First item content
 *         </x-mantine-accordion-panel>
 *     </x-mantine-accordion-item>
 * </x-mantine-accordion>
 * ```
 *
 * @example Multiple Items
 * ```blade
 * <x-mantine-accordion :multiple="true" :defaultValue="['item1']">
 *     <x-mantine-accordion-item value="item1">
 *         <x-mantine-accordion-control :icon="$icon">
 *             First Item
 *         </x-mantine-accordion-control>
 *         <x-mantine-accordion-panel>
 *             Content
 *         </x-mantine-accordion-panel>
 *     </x-mantine-accordion-item>
 *     <!-- More items... -->
 * </x-mantine-accordion>
 * ```
 */
class Accordion extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current controlled value
     * @param mixed $defaultValue Default value for uncontrolled state
     * @param mixed $onChange Callback fired when value changes
     * @param mixed $multiple Allow multiple items to be opened
     * @param mixed $variant Visual variant of the accordion
     * @param mixed $radius Border radius value
     * @param mixed $chevronPosition Position of chevron
     * @param mixed $disableChevronRotation Disable chevron animation
     * @param mixed $chevron Custom chevron icon
     * @param mixed $order Button and chevron order
     * @param mixed $transitionDuration Animation duration
     * @param mixed $unstyled Remove default styles
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    /**
     * Create a new component instance.
     *
     * @param mixed $value Current controlled value
     * @param mixed $defaultValue Default value for uncontrolled state
     * @param mixed $onChange Callback fired when value changes
     * @param mixed $multiple Allow multiple items to be opened
     * @param mixed $variant Visual variant of the accordion
     * @param mixed $radius Border radius value
     * @param mixed $chevronPosition Position of chevron
     * @param mixed $disableChevronRotation Disable chevron animation
     * @param mixed $chevron Custom chevron icon
     * @param mixed $order Heading level for controls (2-6)
     * @param mixed $transitionDuration Animation duration
     * @param mixed $unstyled Remove default styles
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $multiple = null,
        public mixed $variant = null,
        public mixed $radius = null,
        public mixed $chevronPosition = null,
        public mixed $disableChevronRotation = null,
        public mixed $chevron = null,
        public mixed $order = null,
        public mixed $transitionDuration = null,
        public mixed $unstyled = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        // Validate order is between 2-6 if provided
        if ($this->order !== null) {
            $this->order = max(2, min(6, (int)$this->order));
        }

        $this->props = [
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'multiple' => $multiple,
            'variant' => $variant,
            'radius' => $radius,
            'chevronPosition' => $chevronPosition,
            'disableChevronRotation' => $disableChevronRotation,
            'chevron' => $chevron,
            'order' => $this->order,
            'transitionDuration' => $transitionDuration,
            'unstyled' => $unstyled,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * AccordionItem Component
 *
 * Represents a single item within an Accordion. Must contain AccordionControl
 * and AccordionPanel components as children.
 *
 * @property mixed $value Unique value of the item
 */
class AccordionItem extends MantineComponent
{
    /**
     * Create a new AccordionItem instance.
     *
     * @param mixed $value Unique identifier for the accordion item
     */
    public function __construct(
        public mixed $value = null,
    ) {
        parent::__construct();

        $this->props = [
            'value' => $value,
        ];
    }
}

/**
 * AccordionControl Component
 *
 * Control element that toggles associated panel visibility. Must be placed
 * inside AccordionItem component.
 *
 * @property mixed $icon Icon displayed next to the label
 * @property mixed $disabled Disables control button
 */
class AccordionControl extends MantineComponent
{
    /**
     * Create a new AccordionControl instance.
     *
     * @param mixed $icon Optional icon element
     * @param mixed $disabled Whether the control is disabled
     */
    public function __construct(
        public mixed $icon = null,
        public mixed $disabled = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
            'disabled' => $disabled,
        ];
    }
}

/**
 * AccordionPanel Component
 *
 * Content panel that is shown/hidden when the associated control is clicked.
 * Must be placed inside AccordionItem component.
 */
class AccordionPanel extends MantineComponent
{
    /**
     * Create a new AccordionPanel instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
