<?php

namespace App\DataTables;

use App\Unis\Order\Order;
use Yajra\Datatables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->addColumn('action', 'backend.admin.partial.actionDt.order')
            ->editColumn('total', '￥ {!! $total !!} 元')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Order::query()->with('orderer', 'deliver');

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
                    ->addAction(['width' => '180px'])
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
            'No'=>['name'=>'order_no', 'data'=>'order_no'],
            '物品'=>['name'=>'subject', 'data'=>'subject'],
            '下单人'=>['name'=>'orderer.name', 'data'=>'orderer.name', 'orderable'=>false],
            '接单人'=>['name'=>'deliver.name', 'data'=>'deliver.name','defaultContent' => '', 'orderable'=>false],
            '共计'=>['name'=>'total', 'data'=>'total'],
            '地址'=>['name'=>'address', 'data'=>'address'],
            '状态'=>['name'=>'orders.status', 'data'=>'status'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orders_' . time();
    }
}
