<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @foreach (auth()->user()->follows as $user)

    <li class="mb-4">
        <div class="flex items-center text-sm">
            <img src="{{$user->avatar}}" class="rounded-full mr-2" alt="User avatar">
            {{$user->name}}
        </div>
    </li>
    @endforeach
</ul>