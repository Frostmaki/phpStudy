<li>
<h2>{{$status->title}}</h2>
<p>
  {{$status->created_at->diffForHumans() }}
  <span>
    <a href="{{route('users.show',$user->id)}}">
      {{$user->name}}
    </a>

  </span>
<p>
  {{str_limit($status->content,100,'...'}}
</p>
</li>
