<?php

namespace MantineLivewire\Components;

/**
 * ModalsProvider component for managing modals in your application.
 *
 * The ModalsProvider component is a context provider that enables the use of modals throughout your application.
 * It should be placed near the root of your application to make modal functionality available globally.
 *
 * @see https://mantine.dev/core/modals/
 *
 * @example
 * ```blade
 * <x-mantine-modals-provider>
 *     <!-- Your app content -->
 * </x-mantine-modals-provider>
 * ```
 *
 * @example Using with custom modal props
 * ```blade
 * <x-mantine-modals-provider
 *     :modal-props="[
 *         'size' => 'lg',
 *         'centered' => true,
 *         'overlayProps' => ['blur' => 3]
 *     ]"
 * >
 *     <!-- App content -->
 * </x-mantine-modals-provider>
 * ```
 */
class ModalsProvider extends MantineComponent
{
    /**
     * Create a new ModalsProvider component instance.
     *
     * @param mixed $modals Array of modal configurations
     * @param mixed $modalProps Default props spread to all modals
     * @param mixed $labels Labels used in modal components
     * @param mixed $classNames Custom classNames for modal elements
     * @param mixed $styles Custom styles for modal elements
     */
    public function __construct(
        public mixed $modals = null,
        public mixed $modalProps = null,
        public mixed $labels = null,
        public mixed $classNames = null,
        public mixed $styles = null,
    ) {
        parent::__construct();

        $this->props = [
            'modals' => $modals,
            'modalProps' => $modalProps,
            'labels' => $labels,
            'classNames' => $classNames,
            'styles' => $styles,
        ];
    }
}
