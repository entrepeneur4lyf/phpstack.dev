<?php

namespace App\Livewire\Components\Combobox;

use App\Livewire\Components\MantineComponent;

class Target extends MantineComponent
{
    public function __construct(
        public ?string $targetType = null,
        public ?bool $withAriaAttributes = null,
        public mixed $refProp = null,
    ) {
        parent::__construct();

        $this->props = [
            'targetType' => $targetType,
            'withAriaAttributes' => $withAriaAttributes,
            'refProp' => $refProp,
        ];
    }
}
