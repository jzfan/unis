<?php

namespace App\DataTables;

use App\Unis\School\Campus;
use Yajra\Datatables\Services\DataTable;

class CampusDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query()->with('school'))
            ->addColumn('action', 'backend.admin.partial.actionDt.campus')
            ->editColumn('created_at', function($obj){
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
        $query = Campus::query();

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
            '学校'=>['name'=>'school.name', 'data'=>'school.name'],
            '校区'=>['name'=>'name', 'data'=>'name'],
            '地址'=>['name'=>'address', 'data'=>'address'],
            '状态'=>['name'=>'status', 'data'=>'status'],
            '创建于'=>['name'=>'created_at', 'data'=>'created_at'],   
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'campuses_' . time();
    }
}
