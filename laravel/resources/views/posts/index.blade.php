@extends("layouts.maine")

@section("content")
    <div>
        @foreach($posts as $post)
            <div >
                <h2 ><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p>{{$post->created_at->toFormattedDateString()}}<a href="/user/5">  userName</a></p>

                <!-- 超过100变成。。。 -->
                <p>{{str_limit($post->content,100,'...')}}

            </div>
        @endforeach

    <!--links 方法将给予查找结果中其它页面的链接。每一个链接中都已经包含正确的 ?page 查找字符串变量。-->
            {{$posts->links()}}

    </div>
@endsection


