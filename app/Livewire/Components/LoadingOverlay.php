<?php

namespace MantineLivewire\Components;

/**
 * LoadingOverlay Component
 *
 * The LoadingOverlay component is used to display a loading overlay on top of other content.
 * It can be customized with visibility, loader properties, overlay properties, and transition effects.
 *
 * @link https://mantine.dev/core/loading-overlay/
 *
 * @property mixed $visible Determines if the loading overlay is visible
 * @property mixed $loaderProps Properties for the loader component
 * @property mixed $overlayProps Properties for the overlay
 * @property mixed $zIndex Z-index of the overlay
 * @property mixed $transitionProps Properties for the transition effect
 * @property mixed $classNames Custom class names for the overlay
 * @property mixed $styles Custom styles for the overlay
 *
 * @example Basic Usage
 * ```blade
 * <x-mantine-loading-overlay :visible="true" />
 * ```
 */
class LoadingOverlay extends MantineComponent
{
    /**
     * Create a new component instance.
     *
     * @param mixed $visible Determines if the loading overlay is visible
     * @param mixed $loaderProps Properties for the loader component
     * @param mixed $overlayProps Properties for the overlay
     * @param mixed $zIndex Z-index of the overlay
     * @param mixed $transitionProps Properties for the transition effect
     * @param mixed $classNames Custom class names
     * @param mixed $styles Custom styles
     */
    public function __construct(
        public mixed $visible = null,
        public mixed $loaderProps = null,
        public mixed $overlayProps = null,
        public mixed $zIndex = null,
        public mixed $transitionProps = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'visible' => $visible,
            'loaderProps' => $loaderProps,
            'overlayProps' => $overlayProps,
            'zIndex' => $zIndex,
            'transitionProps' => $transitionProps,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
