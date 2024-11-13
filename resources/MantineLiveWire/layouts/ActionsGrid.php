<?php

namespace App\Livewire\Layouts;

use App\Livewire\Components\Layouts\BaseLayout;

class ActionsGrid extends BaseLayout
{
    protected function getLayoutName(): string
    {
        return 'actions-grid';
    }

    public function component(): string
    {
        return 'resources/js/Components/Custom/ActionsGrid/index.js';
    }

    public function mingleData()
    {
        return array_merge(parent::mingleData(), [
            'items' => [
                [
                    'title' => 'Credit cards',
                    'icon' => 'credit-card',
                ],
                [
                    'title' => 'Banks nearby',
                    'icon' => 'building-bank',
                ],
                [
                    'title' => 'Transfers',
                    'icon' => 'repeat',
                ],
                [
                    'title' => 'Refunds',
                    'icon' => 'receipt-refund',
                ],
                [
                    'title' => 'Receipts',
                    'icon' => 'receipt',
                ],
                [
                    'title' => 'Taxes',
                    'icon' => 'receipt-tax',
                ],
                [
                    'title' => 'Reports',
                    'icon' => 'report',
                ],
                [
                    'title' => 'Payments',
                    'icon' => 'cash-banknote',
                ],
                [
                    'title' => 'Cashback',
                    'icon' => 'coin',
                ],
            ],
        ]);
    }
}
