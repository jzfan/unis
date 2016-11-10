<?php

namespace App\DataTables;

use App\Unis\School\Dorm;
use Yajra\Datatables\Services\DataTable;

class DormDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query()->with('campus.school'))
            ->addColumn('action', 'backend.admin.partial.actionDt.dorm')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Dorm::query();

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
            '学校'=>['name'=>'campus.school.name','data'=>'campus.school.name', 'orderable'=>false, 'searchable'=>false],
            '校区'=>['name'=>'campus.name','data'=>'campus.name'],
            '宿舍'=>['name'=>'name','data'=>'name'],
            '地址'=>['name'=>'address','data'=>'address'],
            '状态'=>['name'=>'status','data'=>'status'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dorms_' . time();
    }
}
