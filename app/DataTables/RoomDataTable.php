<?php

namespace App\DataTables;

use App\Unis\School\Room;
use Yajra\Datatables\Services\DataTable;

class RoomDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query()->with('dorm.campus.school'))
            ->addColumn('action', 'backend.admin.partial.actionDt.room')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Room::query();

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
            '学校'=>['name'=>'dorm.campus.school.name','data'=>'dorm.campus.school.name', 'orderable'=>false, 'searchable'=>false],
            '校区'=>['name'=>'dorm.campus.name','data'=>'dorm.campus.name', 'orderable'=>false, 'searchable'=>false],
            '宿舍'=>['name'=>'dorm.name','data'=>'dorm.name'],
            '房间'=>['name'=>'number','data'=>'number'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'rooms_' . time();
    }
}
