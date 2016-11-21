@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
           
            <script type="text/javascript">
            	var errs = '{{ $errors->first() }}';
            	layer.open({
                    content: errs
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                  });
            </script>
            
        </ul>
    </div>
@endif