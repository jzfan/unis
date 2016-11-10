@extends('backend.layout')

@section('content')
{!! $dataTable->table() !!}
@endsection

@section('js')

{!! $dataTable->scripts() !!}
@stop

