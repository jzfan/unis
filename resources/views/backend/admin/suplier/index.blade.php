@extends('backend.layout')

@section('content')

 
<h2>表单 <a href="/admin/suplier/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
 <table class="display" cellspacing="0" width="100%" id='dtSuplier'>

              <thead>
                <tr>
                  <th>#</th>
                  <th>商户名</th>
                  <th>负责人</th>
                  <th>邮箱</th>
                  <th>地址</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>

            </table>
          </div>

@endsection

@section('js')
<script type="text/javascript">
  var table = $('#dtSuplier').DataTable( {
       "ajax": {
          'url': '/api/suplier',
          "dataSrc": "",
        },
       "columns": [ 
        {"data" : 'id'},
        {"data" : 'company'},
        {"data": 'manager'},
        {"data": 'email'},
        {"data": 'address'},
        {"data": 'status'},
        {
            "render": function ( data, type, row ) {
                    return '<a href="/admin/suplier/'+row['id']+'" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span>查看</a><a class="btn btn-success btn-sm" href="/admin/suplier/'+row['id']+'/edit"><span class="glyphicon glyphicon-edit"></span>编辑</a><form style="display:inline-block" action="/admin/suplier/'+row['id']+'" method="POST">{!! csrf_field() !!}<input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" onclick="return confirm('+"'确定删除吗？'"+');"><span class="glyphicon glyphicon-trash"></span>删除</button></form>';
                },

        } , 
        ]
   } );


</script>
@stop

