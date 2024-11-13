<?php

namespace App\Livewire\Layouts;

use MantineLivewire\Components\Layouts\BaseLayout;

class Toast extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'toast';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/Toast/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'toast' => [
                'show' => false,
                'type' => 'info', // success, error, info, warning
                'title' => '',
                'message' => '',
                'timeout' => 4000,
            ],
        ]);
    }

    public function notify($type, $title, $message, $timeout = 4000)
    {
        $this->mingleUpdate('toast', [
            'show' => true,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'timeout' => $timeout,
        ]);
    }

    public function success($title, $message, $timeout = 4000)
    {
        $this->notify('success', $title, $message, $timeout);
    }

    public function error($title, $message, $timeout = 4000)
    {
        $this->notify('error', $title, $message, $timeout);
    }

    public function info($title, $message, $timeout = 4000)
    {
        $this->notify('info', $title, $message, $timeout);
    }

    public function warning($title, $message, $timeout = 4000)
    {
        $this->notify('warning', $title, $message, $timeout);
    }
}
