<x-layout>

<section>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <ul>
        <li>{{$post->title}}</li>
        <li>{{$post->category->name}}</li>
        <li>{{$post->author}}</li>
        <li>{{$post->year}}</li>
        <li>{{$post->summary}}</li>

       @foreach ($post->scores as $score)
       <li>{{$score->user->username}}</li>
       <li>{{$score->total_score}}</li>
       <li>{{$score->comment}}</li>
       @endforeach

    </ul>

    @auth

        <form method="POST" action="/posts/{{ $post->slug }}/scores">
            @csrf

            <header class="flex items-center">

                <h2 class="ml-4">Add some weight on the scale</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="comment"
                    class="w-full text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Quick, think of something to say!"
                    required></textarea>

                @error('comment')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-6">
                <select name="total-score" id="total-score">
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                    <option value="1">1</option>
                </select>

                @error('total-score')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit">Submit</button>
            </div>
        </form>

@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth

    </main>
</section>

</x-layout>
