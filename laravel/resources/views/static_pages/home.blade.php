@extends("layouts.maine")
@section('content')
    <h1>Hello Laravel</h1>
    <p>
        一切，将从这里开始。
    </p>
    <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在注册</a>
    </p>
@stop