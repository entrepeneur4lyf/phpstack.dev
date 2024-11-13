<?php

namespace App\Livewire\Components;

/**
 * Modal Component
 *
 * The Modal component is used to display content in a modal dialog. It can be customized with
 * various properties such as title, size, and visibility.
 *
 * @link https://mantine.dev/core/modal/
 *
 * @property mixed $opened Determines if the modal is opened
 * @property mixed $onClose Function called when the modal is closed
 * @property mixed $title Title of the modal
 * @property mixed $centered Center the modal on the screen
 * @property mixed $withCloseButton Show close button
 * @property mixed $closeButtonProps Props for the close button
 * @property mixed $overlayProps Props for the overlay
 * @property mixed $size Size of the modal
 * @property mixed $fullScreen Fullscreen modal
 * @property mixed $transitionProps Props for the transition effect
 * @property mixed $xOffset X offset of the modal
 * @property mixed $yOffset Y offset of the modal
 * @property mixed $radius Border radius of the modal
 * @property mixed $scrollAreaComponent Component for scroll area
 * @property mixed $trapFocus Trap focus within the modal
 * @property mixed $closeOnEscape Close modal on escape key
 * @property mixed $closeOnClickOutside Close modal on outside click
 * @property mixed $returnFocus Return focus to the element that opened the modal
 * @property mixed $removeScrollProps Remove scroll props from body
 * @property mixed $classNames Custom class names for modal elements
 * @property mixed $styles Custom styles for modal elements
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-modal :opened="true" title="My Modal" />
 * ```
 */
class Modal extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $opened Determines if the modal is opened
     * @param mixed $onClose Function called when the modal is closed
     * @param mixed $title Title of the modal
     * @param mixed $centered Center the modal on the screen
     * @param mixed $withCloseButton Show close button
     * @param mixed $closeButtonProps Props for the close button
     * @param mixed $overlayProps Props for the overlay
     * @param mixed $size Size of the modal
     * @param mixed $fullScreen Fullscreen modal
     * @param mixed $transitionProps Props for the transition effect
     * @param mixed $xOffset X offset of the modal
     * @param mixed $yOffset Y offset of the modal
     * @param mixed $radius Border radius of the modal
     * @param mixed $scrollAreaComponent Component for scroll area
     * @param mixed $trapFocus Trap focus within the modal
     * @param mixed $closeOnEscape Close modal on escape key
     * @param mixed $closeOnClickOutside Close modal on outside click
     * @param mixed $returnFocus Return focus to the element that opened the modal
     * @param mixed $removeScrollProps Remove scroll props from body
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $opened = null,
        public mixed $onClose = null,
        public mixed $title = null,
        public mixed $centered = null,
        public mixed $withCloseButton = null,
        public mixed $closeButtonProps = null,
        public mixed $overlayProps = null,
        public mixed $size = null,
        public mixed $fullScreen = null,
        public mixed $transitionProps = null,
        public mixed $xOffset = null,
        public mixed $yOffset = null,
        public mixed $radius = null,
        public mixed $scrollAreaComponent = null,
        public mixed $trapFocus = null,
        public mixed $closeOnEscape = null,
        public mixed $closeOnClickOutside = null,
        public mixed $returnFocus = null,
        public mixed $removeScrollProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'onClose' => $onClose,
            'title' => $title,
            'centered' => $centered,
            'withCloseButton' => $withCloseButton,
            'closeButtonProps' => $closeButtonProps,
            'overlayProps' => $overlayProps,
            'size' => $size,
            'fullScreen' => $fullScreen,
            'transitionProps' => $transitionProps,
            'xOffset' => $xOffset,
            'yOffset' => $yOffset,
            'radius' => $radius,
            'scrollAreaComponent' => $scrollAreaComponent,
            'trapFocus' => $trapFocus,
            'closeOnEscape' => $closeOnEscape,
            'closeOnClickOutside' => $closeOnClickOutside,
            'returnFocus' => $returnFocus,
            'removeScrollProps' => $removeScrollProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}

/**
 * ModalRoot Component
 *
 * The ModalRoot component is used to manage the modal's state and behavior.
 *
 * @property mixed $opened Determines if the modal is opened
 * @property mixed $onClose Function called when the modal is closed
 * @property mixed $trapFocus Trap focus within the modal
 * @property mixed $closeOnEscape Close modal on escape key
 * @property mixed $closeOnClickOutside Close modal on outside click
 * @property mixed $returnFocus Return focus to the element that opened the modal
 * @property mixed $removeScrollProps Remove scroll props from body
 */
class ModalRoot extends MantineComponent
{
    public function __construct(
        public mixed $opened = null,
        public mixed $onClose = null,
        public mixed $trapFocus = null,
        public mixed $closeOnEscape = null,
        public mixed $closeOnClickOutside = null,
        public mixed $returnFocus = null,
        public mixed $removeScrollProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'opened' => $opened,
            'onClose' => $onClose,
            'trapFocus' => $trapFocus,
            'closeOnEscape' => $closeOnEscape,
            'closeOnClickOutside' => $closeOnClickOutside,
            'returnFocus' => $returnFocus,
            'removeScrollProps' => $removeScrollProps,
        ];
    }
}

/**
 * ModalOverlay Component
 *
 * The ModalOverlay component is used to display an overlay behind the modal.
 *
 * @property mixed $backgroundOpacity Opacity of the overlay background
 * @property mixed $blur Blur effect for the overlay
 * @property mixed $color Color of the overlay
 */
class ModalOverlay extends MantineComponent
{
    public function __construct(
        public mixed $backgroundOpacity = null,
        public mixed $blur = null,
        public mixed $color = null,
    ) {
        parent::__construct();

        $this->props = [
            'backgroundOpacity' => $backgroundOpacity,
            'blur' => $blur,
            'color' => $color,
        ];
    }
}

/**
 * ModalContent Component
 *
 * The ModalContent component is used to display the content of the modal.
 *
 * @property mixed $size Size of the modal content
 * @property mixed $radius Border radius of the modal content
 * @property mixed $centered Center the modal content
 * @property mixed $fullScreen Fullscreen modal content
 * @property mixed $xOffset X offset of the modal content
 * @property mixed $yOffset Y offset of the modal content
 * @property mixed $scrollAreaComponent Component for scroll area
 * @property mixed $transitionProps Props for the transition effect
 */
class ModalContent extends MantineComponent
{
    public function __construct(
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $centered = null,
        public mixed $fullScreen = null,
        public mixed $xOffset = null,
        public mixed $yOffset = null,
        public mixed $scrollAreaComponent = null,
        public mixed $transitionProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'size' => $size,
            'radius' => $radius,
            'centered' => $centered,
            'fullScreen' => $fullScreen,
            'xOffset' => $xOffset,
            'yOffset' => $yOffset,
            'scrollAreaComponent' => $scrollAreaComponent,
            'transitionProps' => $transitionProps,
        ];
    }
}

/**
 * ModalHeader Component
 *
 * The ModalHeader component is used to display the header of the modal.
 */
class ModalHeader extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * ModalTitle Component
 *
 * The ModalTitle component is used to display the title of the modal.
 */
class ModalTitle extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

/**
 * ModalCloseButton Component
 *
 * The ModalCloseButton component is used to display a button to close the modal.
 *
 * @property mixed $icon Icon for the close button
 * @property mixed $ariaLabel Accessibility label for the close button
 */
class ModalCloseButton extends MantineComponent
{
    public function __construct(
        public mixed $icon = null,
        public mixed $ariaLabel = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
            'aria-label' => $ariaLabel,
        ];
    }
}

/**
 * ModalBody Component
 *
 * The ModalBody component is used to display the body content of the modal.
 */
class ModalBody extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
