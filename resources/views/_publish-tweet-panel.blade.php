<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" required placeholder="what's up doc" class="w-full">
        </textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img src="{{auth()->user()->avatar}}" width="50" height="50" class="rounded-full mr-2" alt="">
            <button class="bg-blue-500 shadow rounded-lg py-2 px-2 text-white" type="submit">Tweet-a-roo</button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>