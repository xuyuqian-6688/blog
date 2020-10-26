@extends("public/public")
@section("content")
    <div class="row-fluid">
        <div class="page-header">
            <h1>添加分类</h1>
        </div>
        @if(count($errors) > 0)
        <div class="alert alert-success">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <form class="form-horizontal" action="{{action("Admin\CateController@doadd")}}" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="name">列表名：</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="name" name="name" value="">
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-success btn-large" value="提交">
                    <input type="reset" class="btn btn-default" value="重置">
                </div>
            </fieldset>
        </form>
    </div>
@endsection