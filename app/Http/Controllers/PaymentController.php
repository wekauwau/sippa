<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;

class PaymentController extends Controller
{
    public function index()
    {
        return view('finance');
    }

    public function getPayments($status, PaymentDataTable $dataTable)
    {
        if ($status == 0) {
            $type = 'unpaid-payment';
        } else {
            $type = 'payment';
        }

        return $dataTable
            ->with('paymentStatus', $status)
            ->with('tableID', $type)
            ->render('components.' . $type);
    }
}
