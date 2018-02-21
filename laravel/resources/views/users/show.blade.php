@extends('layouts.maine')
@section('title', $user->name)
@section('content')
    <div>
        <h3>{{$user->name}},welcome!</h3>
    </div>
    <div>
        @if(count($statuses)>0)
            <ol class="statuses">
                @foreach($statuses as $status)
                    @include('statuses._status');
                 @endforeach
            </ol>
            {!! $statuses->render() !!}
        @endif
    </div>
@stop
