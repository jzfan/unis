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

   <div class="panel @if(Request::is('admin/agent*'))  panel-primary @else panel-default @endif">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a href="/admin/agent">
        <span class="glyphicon glyphicon-briefcase"></span>
          代理管理
        </a>
      </h4>
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
    <span class="glyphicon glyphicon-glass"></span>
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

     <div class="panel @if(Request::is('admin/school*') or Request::is('admin/canteen*') or Request::is('admin/dorm*'))  panel-primary @else panel-default @endif">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <span class="glyphicon glyphicon-map-marker"></span>
          校区管理
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse @if(Request::is('admin/school*') or Request::is('admin/canteen*') or Request::is('admin/dorm*')) in @else panel-default @endif"" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <div class="list-group">
  <a href="/admin/school" class="list-group-item @if(Request::is('admin/school*')) active @endif">
    <span class="glyphicon glyphicon-book"></span>
    学校
  </a>
  <a href="/admin/canteen" class="list-group-item @if(Request::is('admin/canteen*')) active @endif">
    <span class="glyphicon glyphicon-cutlery"></span>
    食堂
</a>
<a href="/admin/dorm" class="list-group-item @if(Request::is('admin/dorm*')) active @endif">
    <span class="glyphicon glyphicon-cutlery"></span>
    宿舍
</a>
</div>

      </div>
    </div>
  </div>

<!--   <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div> -->
</div>

        </div>