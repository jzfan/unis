<a href='/{{ $role }}/{{ $category }}/{{ $$category->id }}' class='btn btn-info btn-sm'><span class="glyphicon glyphicon-search"></span>
 查看</a>
<a class='btn btn-success btn-sm' href='/{{ $role }}/{{ $category }}/{{ $$category->id }}/edit'><span class="glyphicon glyphicon-edit"></span>
 编辑</a>
 <form style="display:inline-block" action='/{{ $role }}/{{ $category }}/{{ $$category->id }}' method="POST">
   {!! csrf_field() !!}
   <input type="hidden" name="_method" value='DELETE'>
                    <button class='btn btn-danger btn-sm' onclick="return confirm('确定删除吗？');"><span class="glyphicon glyphicon-trash"></span>
 删除</button>
 </form>