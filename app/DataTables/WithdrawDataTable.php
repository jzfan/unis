<?php

namespace App\DataTables;

use App\User;
use App\Unis\Business\Withdraw;
use Yajra\Datatables\Services\DataTable;

class WithdrawDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'backend.admin.partial.actionDt.withdraw')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Withdraw::with('user');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            '用户'=>['name'=>'user.name', 'data'=>'user.name'],
            '余额'=>['name'=>'user.balance', 'data'=>'user.balance'],
            '申请提现金额'=>['name'=>'amount', 'data'=>'amount'],
            '申请时间'=>['name'=>'created_at', 'data'=>'created_at'],   
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'withdraws_' . time();
    }
}
