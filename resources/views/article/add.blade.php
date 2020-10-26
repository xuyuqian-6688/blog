@extends("public/public")
@section("content")
    <div class="row-fluid">
        <div class="page-header">
            <h1>添加文章</h1>
        </div>
        @if(count($errors) > 0)
            <div class="alert alert-success">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form class="form-horizontal" action="{{action("Admin\ArticleController@doadd")}}" method="post">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="cate_id">分类ID：</label>
                    <div class="controls">
                        {{--<input type="text" class="input-xlarge" id="cate_id" name="cate_id" value="">--}}
                        <select name="cate_id" id="cate_id">
                            <option value="">---请选择---</option>
                            @foreach($cates as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="title">标题</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="title" name="title" value="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="content">内容</label>
                    <div class="controls">
                        {{--<input type="text" class="input-xlarge" id="content" name="content" value="">--}}
                        <div id="editor">
                        </div>
                        <textarea name="content" id="content" style="display: none;"></textarea>
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
@section("js")
    <script type="text/javascript" src="/static/wangEditor/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor
        var editor = new E('#editor')
        // 或者 var editor = new E( document.getElementById('editor') )
        editor.customConfig.onchange=function (html) {
            $('#content').val(html);
        }
        editor.create()
    </script>
@endsection