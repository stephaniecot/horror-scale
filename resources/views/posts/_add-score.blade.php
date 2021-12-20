<section>

@auth



{{-- @if($post->scores->count() > 0 && $score::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists()) --}}
@if($post->scores->contains('user_id', Auth::user()->id))
<p>You have already voted</p>

@else


<form method="POST" action="/posts/{{ $post->slug }}/scores">
    @csrf

    <header class="flex items-center">

        <h2 class="ml-4">Add some weight on the scale</h2>
    </header>

    <div class="mt-6">
        <label for="comment">Comment</label>
        <textarea
            name="comment"
            class="w-full text-sm focus:outline-none focus:ring"
            rows="5"
            placeholder="Review this {{$post->category->name}}"></textarea>

        @error('comment')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-6">
        <label for="total-score">Total Score</label>
        <input type="text" name='total-score' id='total-score'>

        @error('total-score')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <label for="spooky-score">Spooky</label>
        <input type="text" name='spooky-score' id='spooky-score'>

        @error('spooky-score')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <label for="suspense-score">Suspense Score</label>
        <input type="text" name='suspense-score' id='suspense-score'>

        @error('suspense-score')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <label for="gore-score">Gore Score</label>
        <input type="text" name='gore-score' id='gore-score'>

        @error('gore-score')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-6">
        <label for="disturbing-score">Disturbing Score</label>
        <input type="text" name='disturbing-score' id='disturbing-score'>

        @error('disturbing-score')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <button type="submit">Submit</button>
    </div>
</form>
@endif



@else
<p class="font-semibold">
<a href="/register" class="hover:underline">Register</a> or
<a href="/login" class="hover:underline">log in</a> to rate this {{$post->category->name}}.
</p>
@endauth

</section>
