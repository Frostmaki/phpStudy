@extends('layouts.maine')
@section('title', '登录')

@section('content')
    <div>
        <div>
            <div>
                <h5>登录</h5>
            </div>
            <div>
                @include('shared._errors')

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div>
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password">密码：</label>
                        <input type="password" name="password" value="{{ old('password') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr>

                <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>
@stop