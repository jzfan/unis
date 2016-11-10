<?php

namespace App\DataTables;

use App\Unis\Suplier\Shop;
use Yajra\Datatables\Services\DataTable;

class ShopDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query()->with('canteen.campus.school', 'suplier'))
            ->addColumn('action', 'backend.admin.partial.actionDt.shop')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Shop::query();

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
                    ->addAction(['width' => '280px'])
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
            '店名'=>['name'=>'name', 'data'=>'name'],
            '学校'=>['name'=>'canteen.campus.school.name', 'data'=>'canteen.campus.school.name', 'orderable'=>false, 'searchable'=>false],
            '校区'=>['name'=>'canteen.campus.name', 'data'=>'canteen.campus.name', 'orderable'=>false, 'searchable'=>false],
            '食堂'=>['name'=>'canteen.name', 'data'=>'canteen.name'],
            '供应商'=>['name'=>'suplier.company', 'data'=>'suplier.company'],
            '创建时间'=>['name'=>'created_at', 'data'=>'created_at']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'shops_' . time();
    }
}
