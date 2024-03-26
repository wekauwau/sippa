<?php

namespace App\Http\Controllers;

use App\DataTables\SickDataTable;

class SickController extends Controller
{
    public function index(SickDataTable $dataTable)
    {
        return $dataTable->render('health');
    }
}
