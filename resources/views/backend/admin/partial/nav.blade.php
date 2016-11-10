<div class="col-sm-3 col-md-2">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel @if(Request::is('admin'))  panel-primary @else panel-default @endif">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a href="/admin">
            <span class="glyphicon glyphicon-home"></span>
            首页
          </a>
        </h4>
      </div>
    </div>

    <div class="panel @if(Request::is('admin/member*'))  panel-primary @else panel-default @endif">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a href="/admin/member">
            <span class="glyphicon glyphicon-user"></span>
            会员管理
          </a>
        </h4>
      </div>
    </div>


    <div class="panel @if(Request::is('admin/agent*') or Request::is('admin/order*'))  panel-primary @else panel-default @endif">
      <div class="panel-heading" role="tab" id="headingAgent">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseAgent" aria-expanded="true" aria-controls="collapseAgent">
            <span class="glyphicon glyphicon-briefcase"></span>
            代理管理
          </a>
        </h4>
      </div>
      <div id="collapseAgent" class="panel-collapse collapse   @if(Request::is('admin/agent*') or Request::is('admin/order*')) in @else panel-default @endif" role="tabpanel" aria-labelledby="headingAgent">
        <div class="panel-body">
          <div class="list-group">
            <a href="/admin/agent" class="list-group-item @if(Request::is('admin/agent*')) active @endif">
              <span class="glyphicon glyphicon-user"></span>
              代理账号
            </a>
            <a href="/admin/order" class="list-group-item @if(Request::is('admin/order*')) active @endif">
              <span class="glyphicon glyphicon-barcode"></span>
              订单管理
            </a>
            <a href="#" class="list-group-item @if(Request::is('admin/deliver*')) active @endif">
              <span class="glyphicon glyphicon-send"></span>
              配送管理
            </a>
          </div>
        </div>
      </div>
    </div>


    <div class="panel @if(Request::is('admin/suplier*') or Request::is('admin/shop*') or Request::is('admin/food*'))  panel-primary @else panel-default @endif">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <span class="glyphicon glyphicon-copyright-mark"></span>
            商户管理
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse  @if(Request::is('admin/suplier*') or Request::is('admin/shop*') or Request::is('admin/food*')) in @else panel-default @endif" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <div class="list-group">
            <a href="/admin/suplier" class="list-group-item @if(Request::is('admin/suplier*')) active @endif">
              <span class="glyphicon glyphicon-bookmark"></span>
              供应商
            </a>
            <a href="/admin/shop" class="list-group-item @if(Request::is('admin/shop*')) active @endif">
              <span class="glyphicon glyphicon-flag"></span>
              店面
            </a>
            <a href="/admin/food" class="list-group-item @if(Request::is('admin/food*')) active @endif">
              <span class="glyphicon glyphicon-cutlery"></span>
              食品
            </a>
          </div>

        </div>
      </div>
    </div>

    <div class="panel @if(Request::is('admin/school*') or Request::is('admin/room*') or Request::is('admin/canteen*') or Request::is('admin/dorm*') or Request::is('admin/campus*')) panel-primary @else panel-default @endif">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <span class="glyphicon glyphicon-map-marker"></span>
            学校管理
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse @if(Request::is('admin/school*') or Request::is('admin/room*') or Request::is('admin/canteen*') or Request::is('admin/dorm*') or Request::is('admin/campus*')) in @else panel-default @endif"" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <div class="list-group">
            <a href="/admin/school" class="list-group-item @if(Request::is('admin/school*')) active @endif">
              <span class="glyphicon glyphicon-book"></span>
              学校
            </a>
            <a href="/admin/campus" class="list-group-item @if(Request::is('admin/campus*')) active @endif">
              <span class="glyphicon glyphicon-pencil"></span>
              校区
            </a>
            <a href="/admin/canteen" class="list-group-item @if(Request::is('admin/canteen*')) active @endif">
              <span class="glyphicon glyphicon-fire"></span>
              食堂
            </a>
            <a href="/admin/dorm" class="list-group-item @if(Request::is('admin/dorm*')) active @endif">
              <span class="glyphicon glyphicon-home"></span>
              宿舍
            </a>
            <a href="/admin/room" class="list-group-item @if(Request::is('admin/room*')) active @endif">
              <span class="glyphicon glyphicon-time"></span>
              房间
            </a>
          </div>

        </div>
      </div>
    </div>

  </div>

</div>