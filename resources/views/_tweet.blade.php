

<a href="{{route('profile', $tweet->user)}}">
    <div>
        <img src="https://i.pravatar.cc/40?u={{ $tweet->user->email }}" alt="">
    </div>
</a>

<h5>
    <a href="{{route('profile', $tweet->user)}}">
        {{ $tweet->user->name}}
    </a>
</h5>
            <p>{{ $tweet->body }}</p>