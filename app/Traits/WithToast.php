<?php

namespace App\Traits;

use App\Livewire\Layouts\Toast;

trait WithToast
{
    public Toast $toast;

    public function bootWithToast()
    {
        $this->toast = new Toast();
    }

    public function notify($type, $title, $message, $timeout = 4000)
    {
        $this->toast->notify($type, $title, $message, $timeout);
    }

    public function success($title, $message, $timeout = 4000)
    {
        $this->toast->success($title, $message, $timeout);
    }

    public function error($title, $message, $timeout = 4000)
    {
        $this->toast->error($title, $message, $timeout);
    }

    public function info($title, $message, $timeout = 4000)
    {
        $this->toast->info($title, $message, $timeout);
    }

    public function warning($title, $message, $timeout = 4000)
    {
        $this->toast->warning($title, $message, $timeout);
    }
}
