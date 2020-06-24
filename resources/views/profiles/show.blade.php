<x-app>
    <header class="mb-6 relative">
        <img class="rounded-lg mb-2" src="/images/cetama.jpg" alt="">

        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="flex">
                <a href="" class="mr-2 rounded-full border border-gray-300 text-black px-4 py-2 text-black text-xs">
                    Edit Profile
                </a>

                <form method="POST" action="/profiles/{{$user->name}}/follow">
                    @csrf

                    <button type="submit" class="bg-blue-500 rounded-full shadow px-4 py-2 text-white text-xs">
                        {{ 
                            auth()
                            ->user()
                            ->isFollowing($user) ? 'Unfollow Me': 'Follow Me' }}
                    </button>

                </form>

            </div>
        </div>
        <p class="text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
            been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum. </p>

        <img src="{{$user->avatar }}" class="rounded-full mr-2 absolute" alt=""
            style="width: 150px; left: calc(50% - 75px); top: 138px">

    </header>

    @include('_timeline', ['tweets' => $user->tweets])
</x-app>