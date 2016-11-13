<?php

namespace App\DataTables;

use App\Unis\User\User as Member;
use Yajra\Datatables\Services\DataTable;

class MemberDataTable extends DataTable
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
            ->addColumn('action', 'backend.admin.partial.actionDt.member')
            ->editColumn('created_at', function ($obj) {
                return $obj->created_at->format('Y/m/d');
            })
             ->editColumn('dorm_id', function ($obj) {
                return $obj->getAddress();
            })           
            ->editColumn('avatar', function ($obj) {
                return "<img src='$obj->avatar' class='avatar-small'/>";
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
        $query = Member::query()->where('role', 'member')->orderBy('id', 'desc');

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
            '头像'=>['name'=>'avatar', 'data'=>'avatar', 'orderable'=>false, 'searchable'=>false],
            '用户名'=>['name'=>'name', 'data'=>'name'],
            '邮箱'=>['name'=>'email', 'data'=>'email'],
            '宿舍'=>['name'=>'dorm_id', 'data'=>'dorm_id'],
            '地址'=>['name'=>'room_number', 'data'=>'room_number'],
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
        return 'members_' . time();
    }
}
