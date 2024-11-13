<?php

namespace App\Livewire\Components\Pagination;

use App\Livewire\Components\MantineComponent;

class Root extends MantineComponent
{
    public function __construct(
        public mixed $total = null,
        public mixed $value = null,
        public mixed $defaultValue = null,
        public mixed $onChange = null,
        public mixed $siblings = null,
        public mixed $boundaries = null,
        public mixed $color = null,
        public mixed $size = null,
        public mixed $radius = null,
        public mixed $getItemProps = null,
        public mixed $getControlProps = null,
    ) {
        parent::__construct();

        $this->props = [
            'total' => $total,
            'value' => $value,
            'defaultValue' => $defaultValue,
            'onChange' => $onChange,
            'siblings' => $siblings,
            'boundaries' => $boundaries,
            'color' => $color,
            'size' => $size,
            'radius' => $radius,
            'getItemProps' => $getItemProps,
            'getControlProps' => $getControlProps,
        ];
    }
}

class Items extends MantineComponent
{
    public function __construct(
        public mixed $dotsIcon = null,
    ) {
        parent::__construct();

        $this->props = [
            'dotsIcon' => $dotsIcon,
        ];
    }
}

class Next extends MantineComponent
{
    public function __construct(
        public mixed $icon = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
        ];
    }
}

class Previous extends MantineComponent
{
    public function __construct(
        public mixed $icon = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
        ];
    }
}

class First extends MantineComponent
{
    public function __construct(
        public mixed $icon = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
        ];
    }
}

class Last extends MantineComponent
{
    public function __construct(
        public mixed $icon = null,
    ) {
        parent::__construct();

        $this->props = [
            'icon' => $icon,
        ];
    }
}
