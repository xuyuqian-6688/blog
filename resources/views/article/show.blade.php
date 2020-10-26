@extends("public/public")
@section("content")
    <div class="row-fluid">
        <div class="page-header">
            <h1>文章列表</h1>
        </div>
        @if(session("error"))
            <div class="alert">
                {{session("error")}}
            </div>
        @endif
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th width="10%">序号</th>
                <th width="10%">ID</th>
                <th width="40%">标题</th>
                <th width="10%">分类/ID</th>
                <th width="10%">点赞数</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $value)
                {{--@php dump($value->cateInfo->name);  @endphp--}}
                <tr class="list-roles">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->cateInfo->name}}</td>
                    <td>{{$value->love}}</td>
                    <td>
                        <a href="{{action("Admin\ArticleController@edit",["id"=>$value->id])}}"><i class="icon-pencil"></i> 修改</a>
                        <a href="{{action("Admin\ArticleController@del",["id"=>$value->id])}}" id="delete" ><i class="icon-trash"></i> 删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--{{ $data->links() }}--}}
        {{$data -> links()}}
        <a href="{{action("Admin\ArticleController@add")}}" class="btn btn-success">添加新文章</a>
    </div>
@endsection