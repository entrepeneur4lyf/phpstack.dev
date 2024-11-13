<?php

namespace MantineLivewire\Components\Layouts;

use Livewire\Component;
use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;

class BaseLayout extends Component implements HasMingles
{
    use InteractsWithMingles;

    public function component(): string
    {
        return 'resources/js/Components/Custom/BaseLayout/index.js';
    }

    public function mingleData()
    {
        return [
            'appName' => config('app.name'),
        ];
    }

    public function render()
    {
        return view('mantinelivewire::layouts.base');
    }
}
