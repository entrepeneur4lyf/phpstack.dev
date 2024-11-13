<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see MantineLivewire\MantineLivewire
 */
class MantineLivewire extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return App\Models\MantineLivewire::class;
    }
}
