<form method="POST" action="/profiles/{{$user->name}}/follow">
    @csrf

    <button type="submit" class="bg-blue-500 rounded-full shadow px-4 py-2 text-white text-xs">
        {{ 
            auth()
            ->user()
            ->isFollowing($user) ? 'Unfollow Me': 'Follow Me' }}
    </button>

</form>