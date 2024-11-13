<?php

namespace App\Livewire\Components\Drawer;

use App\Livewire\Components\MantineComponent;

class Root extends MantineComponent
{
    public function __construct(
        public mixed $opened = null,
        public mixed $onClose = null,
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

class Overlay extends MantineComponent
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

class Content extends MantineComponent
{
    public function __construct(
        public mixed $position = null,
        public mixed $size = null,
        public mixed $offset = null,
        public mixed $radius = null,
        public mixed $scrollAreaComponent = null,
        public mixed $transitionProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'position' => $position,
            'size' => $size,
            'offset' => $offset,
            'radius' => $radius,
            'scrollAreaComponent' => $scrollAreaComponent,
            'transitionProps' => $transitionProps,
        ];
    }
}

class Header extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

class Title extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}

class CloseButton extends MantineComponent
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

class Body extends MantineComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->props = [];
    }
}
