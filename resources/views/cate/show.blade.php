@extends("public/public")
@section("content")
    <div class="row-fluid">
        <div class="page-header">
            <h1>分类列表</h1>
        </div>
        @if(session("error"))
        <div class="alert">
            {{session("error")}}
        </div>
        @endif
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>序号</th>
                <th>ID</th>
                <th>列表名</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
            <tr class="list-roles">
                <td>{{$loop->iteration}}</td>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <a href="{{action("Admin\CateController@edit",["id"=>$value->id])}}"><i class="icon-pencil"></i> 修改</a>
                    <a href="{{action("Admin\CateController@del",["id"=>$value->id])}}" id="delete" ><i class="icon-trash"></i> 删除</a>
                    {{--<div class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Actions <span class="caret"></span></a>
                        <ul class="dropdown-menu pull-right">
                            <li></li>
                            <li></li>
                        </ul>
                    </div>--}}
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{action("Admin\CateController@add")}}" class="btn btn-success">添加新分类</a>
    </div>
@endsection