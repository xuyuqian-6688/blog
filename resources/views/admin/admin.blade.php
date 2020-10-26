@extends("public/public")
@section("content")
    <div class="well hero-unit">
        <h1 style="color: #00fa00;">Welcome : {{session("userInfo.username")}}</h1>
    </div>
@endsection