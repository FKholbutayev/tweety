<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse (current_user()->follows as $user)

    <li class="mb-4">
        <a class="flex items-center text-sm" href="{{ route('profile', $user) }}">
            <img src="{{$user->avatar}}" width="40" height="40" class="rounded-full mr-2" alt="User avatar">
            {{$user->name}}
        </a>
    </li>

    @empty
    <li>No friends yet</li>

    @endforelse
</ul>