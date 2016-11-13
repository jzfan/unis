@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <script type="text/javascript">
            	var errs = '{{$error}}';
            	console.log(errs);
            </script>
            @endforeach
        </ul>
    </div>
@endif