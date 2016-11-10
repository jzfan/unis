@extends('backend.layout')

@section('content')

<h2>表单 <a href="/admin/school/create" class='btn btn-primary btn-xs'>新增</a></h2>
<div class="table-responsive">
            <table class="table table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>校名</th>
                  <th>省</th>
                  <th>市</th>
                  <th>区</th>
                  <th>街道</th>
                  <th>地址</th>
                  <th>状态</th>
                </tr>
              </thead>

            </table>
          </div>

@endsection

@section('js')
<script type="text/javascript">
  $(function() {
          $('table').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                url: '/api/school/dt',
                dataSrc: ''
              },
          columns: [
              {data: 'id'},
              {data: 'name'},
              {data: 'province'},
              {data: 'city'},
              {data: 'block'},
              {data: 'address'},
              {data: 'status'},
              {
                "render": function ( data, type, row ) {
                        return '<a href="/admin/school/'+row['id']+'" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span>查看</a><a class="btn btn-success btn-sm" href="/admin/school/'+row['id']+'/edit"><span class="glyphicon glyphicon-edit"></span>编辑</a><form style="display:inline-block" action="/admin/school/'+row['id']+'" method="POST">{!! csrf_field() !!}<input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" onclick="return confirm('+"'确定删除吗？'"+');"><span class="glyphicon glyphicon-trash"></span>删除</button></form>';
                    },
              }
          ]
          });
      });
</script>
@stop
