<?php

namespace App\View\Components;

use App\DataTables\PaymentDataTable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Payment extends Component
{
    public function __construct(
        public int $status
    ) {
    }

    public function render(): View|Closure|string
    {
        $dataTable = new PaymentDataTable();

        if ($this->status == 0) {
            $type = 'unpaid-payment';
        } else {
            $type = 'payment';
        }

        return $dataTable
            ->with('paymentStatus', $this->status)
            ->with('tableID', $type)
            ->render('components.payment');
    }
}
