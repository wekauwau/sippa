<?php

namespace App\Http\Controllers;

use App\DataTables\ViolationDataTable;

class ViolationController extends Controller
{
    public function index(ViolationDataTable $dataTable)
    {
        return $dataTable->render('violation');
    }
}
