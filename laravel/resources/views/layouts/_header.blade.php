<header>
    <a href="/" id="logo">Sample header</a>
    <div style="display: inline-block;float: right;">
        <ul style="display: inline">
            @if(Auth::check())
                <li style="display: inline"><a href="{{route('users.show',Auth::user()->id)}}">{{Auth::user()->name}}</a></li>
                <li style="display: inline">
                    <a id="logout" href="#">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" name="button">退出</button>
                        </form>
                    </a>
                </li>
            @else
                <li style="display: inline"><a href="{{route('help')}}">帮助</a></li>
                <li style="display: inline"><a href="{{ route('login') }}">登录</a></li>
            @endif
        </ul>
    </div>
</header>