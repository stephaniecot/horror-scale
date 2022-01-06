<section>

@auth



{{-- @if($post->scores->count() > 0 && $score::where('user_id', Auth::user()->id)->where('post_id', $post->id)->exists()) --}}
@if($post->scores->contains('user_id', Auth::user()->id))
<p>You have already voted</p>

@else


<form method="POST" action="/posts/{{ $post->slug }}/scores">
    @csrf

    <header>

        <h2>Add some weight on the scale</h2>
    </header>

    <div>
        <label for="comment">Comment</label>
        <textarea
            name="comment"
            rows="5"
            placeholder="Review this {{$post->category->name}}"></textarea>

        @error('comment')
            <span >{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-6">
        <label for="total-score">Total Score</label>
        <input type="text" name='total-score' id='total-score'>

        @error('total-score')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="spooky-score">Spooky</label>
        <input type="text" name='spooky-score' id='spooky-score'>

        @error('spooky-score')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="suspense-score">Suspense Score</label>
        <input type="text" name='suspense-score' id='suspense-score'>

        @error('suspense-score')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="gore-score">Gore Score</label>
        <input type="text" name='gore-score' id='gore-score'>

        @error('gore-score')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="disturbing-score">Disturbing Score</label>
        <input type="text" name='disturbing-score' id='disturbing-score'>

        @error('disturbing-score')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>
@endif



@else
<p>
<a href="/register">Register</a> or
<a href="/login">log in</a> to rate this {{$post->category->name}}.
</p>
@endauth

</section>
