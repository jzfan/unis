<?php

namespace App\DataTables;

use App\Unis\Suplier\Food;
use Yajra\Datatables\Services\DataTable;

class FoodDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query()->with('shop'))
            ->addColumn('action', 'backend.admin.partial.actionDt.food')
            ->editColumn('created_at', function ($obj) {
                return $obj->created_at->format('Y/m/d');
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Food::query();

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
            'id',
            '食品'=>['name'=>'name', 'data'=>'name'],
            '店面'=>['name'=>'shop.name', 'data'=>'shop.name'],
            '类别'=>['name'=>'type', 'data'=>'type'],
            '介绍'=>['name'=>'description', 'data'=>'description'],
            '价格'=>['name'=>'price', 'data'=>'price'],
            '打折'=>['name'=>'discount', 'data'=>'discount'],
            '收藏'=>['name'=>'favorite', 'data'=>'favorite'],
            '状态'=>['name'=>'status', 'data'=>'status'],
            '创建于'=>['name'=>'created_at', 'data'=>'created_at']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'foods_' . time();
    }
}
