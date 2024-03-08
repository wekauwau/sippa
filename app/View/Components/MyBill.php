<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MyBill extends Component
{
    public $result;

    public function __construct(
        public int $userid,
    ) {
        $this->result = DB::table('payments')
            ->join('bills', 'bill_id', '=', 'bills.id')
            ->where('payments.user_id', $userid)
            ->where('payments.status', 0)
            ->orderBy('bills.deadline')
            ->get([
                'bills.name',
                'bills.info',
                'bills.deadline',
                'bills.amount',
            ]);
    }

    public function render(): View|Closure|string
    {
        return view('components.my-bill');
    }
}
