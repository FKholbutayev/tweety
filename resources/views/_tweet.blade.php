<div class="flex p-4 border-b border-b-grey-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile', $tweet->user)}}">
            <img src="{{$tweet->user->avatar}}" width="50" height="50" class="rounded-full mr-2" alt="image-avatar">
        </a>
    </div>
    <div>
        <a href="{{ route('profile', $tweet->user)}}">
            <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        </a>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>