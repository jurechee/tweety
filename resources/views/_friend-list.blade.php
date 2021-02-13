<h1>Fallowing</h1>

<ul>
    @foreach (auth()->user()->fallows as $user)
    <a href="{{route('profile', $user)}}">
    <li>{{ $user->name }}</li>  
</a>
    @endforeach
    
    
</ul>