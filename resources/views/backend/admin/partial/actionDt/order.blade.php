<a href="/admin/order/{{ $order_no }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span>查看</a><a class="btn btn-success btn-sm" href="/admin/order/{{ $order_no }}/edit"><span class="glyphicon glyphicon-edit"></span>编辑</a><form style="display:inline-block" action="/admin/order/{{ $order_no }}" method="POST">{!! csrf_field() !!}<input type="horder_noden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" onclick="return confirm('确定删除吗？');"><span class="glyphicon glyphicon-trash"></span>删除</button></form>