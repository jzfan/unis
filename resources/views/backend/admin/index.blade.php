@extends('backend.layout')

@section('content')

            <h2 class="page-header">后台统计</h2>
            <div class="col-xs-6 col-sm-3">
                <div class="panel panel-default">
                  <div class="panel-heading">会员统计</div>
                  <div class="panel-body">
                    {{ $members }}
                  </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="panel panel-default">
                  <div class="panel-heading">代理统计</div>
                  <div class="panel-body">
                    {{ $agents }}
                  </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="panel panel-default">
                  <div class="panel-heading">商户统计</div>
                  <div class="panel-body">

                  </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <div class="panel panel-default">
                  <div class="panel-heading">区域统计</div>
                  <div class="panel-body">
                    {{ $schools }}
                  </div>
                </div>
            </div>

@endsection

