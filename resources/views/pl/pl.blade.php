@extends('public/public')

@section('content')
    <div class="row-fluid">
        <div class="page-header">
            <h1>分类列表</h1>
        </div>

        @if(session('errMsg'))
            <div class="alert">{{ session('errMsg') }}</div>
        @endif

        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>序号</th>
                <th>昵称</th>
                <th>邮箱</th>
                <th>网址</th>
                <th>评论</th>
                <th>状态</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr class="list-roles">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->site_url }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->status ? '已通过' : '待审核' }}</td>
                    <td>
                        @if($comment->status == 0)
                            <a href="{{action("Admin\PlController@agree", ['id' => $comment->id])}}"><i class="icon-pencil"></i> 审核通过</a>
                        @endif
                        <a href="{{action("Admin\PlController@del", ['id' => $comment->id])}}"><i class="icon-trash"></i> 删除</a>
                    </td>
                </tr>
            @endforeach

            {{ $comments->links() }}
            </tbody>
        </table>
    </div>
@endsection