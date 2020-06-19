@extends('layouts.app')

@section('content')
<header class="mb-6 relative">
    <img class="rounded-lg mb-2" src="/images/cetama.jpg" alt="">

    <div class="flex justify-between items-center">
        <div>
            <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>

        <div>
            <a href="" class="mr-2 rounded-full border border-gray-300 text-black px-4 py-2 text-black text-xs">
                Edit Profile
            </a>
            <a href="" class="bg-blue-500 rounded-full shadow px-4 py-2 text-white text-xs">
                Follow me
            </a>
        </div>
        <img src="{{$user->avatar }}" class="rounded-full mr-2 absolute" alt=""
            style="width: 150px; left: calc(50% - 75px); top: 47%">
    </div>
</header>

@include('_timeline', ['tweets' => $user->tweets])
@endsection