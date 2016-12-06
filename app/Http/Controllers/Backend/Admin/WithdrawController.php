<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Requests;
use App\Unis\User\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\DataTables\WithdrawDataTable;

class WithdrawController extends Controller
{
    public function index(WithdrawDataTable $dataTable)
    {
        return $dataTable->render('backend.admin.partial.dt');
    }
}
