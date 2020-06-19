<div class="flex p-4 border-b border-b-grey-400">
    <div class="mr-2 flex-shrink-0">
        <img src="{{$tweet->user->avatar}}" class="rounded-full mr-2" alt="image-avatar">
    </div>
    <div>
        <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>