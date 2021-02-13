@extends('layouts.app')

@section('content')

<header>

    <h1>profile page for {{$user->name}} </h1>

    <div>
        <img src="https://i.pravatar.cc/150?u={{ $user->email }}" alt="">
    </div> 

    <hr>
    
    <button type="button" class="btn btn-secondary btn-sm">Edit</button>
    <button type="button" class="btn btn-primary btn-sm">Fallow Me</button>
    <button type="button" class="btn btn-danger btn-sm">Delete</button>



</header>


<hr>

@include('_timeline', [
    'tweets' => $user->tweets
])

@endsection
