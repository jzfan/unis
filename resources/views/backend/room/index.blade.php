@extends('backend.layout')

@section('content')

<h2>表单</h2>
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>学校</th>
                  <th>校区</th>
                  <th>宿舍</th>
                  <th>房间号</th>
                  <th>人数</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($rooms as $room)
                <tr>
                  <td>{{ $room->id }}</td>
                  <td>{{ $room->dorm->campus->school->name }}</td>
                  <td>{{ $room->dorm->campus->name }}</td>
                  <td>{{ $room->dorm->name }}</td>
                  <td>{{ $room->number }}</td>
                  <td>{{ $room->users_count }}</td>
                  <td>
@include('backend.partial.action', ['role'=>'admin', 'category'=>'room'])
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          {!! $rooms->links() !!}

@endsection

