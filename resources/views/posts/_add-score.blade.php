<div class="score-form">

    @auth


    @if($post->scores->contains('user_id', Auth::user()->id))
    <p>You have already voted</p>

    @else


    <form method="POST" action="/posts/{{ $post->slug }}/scores">
        @csrf


        <h2 class='heading-secondary'>Add some weight on the scale</h2>


        <div>
            <label for="comment">Comment</label>
            <textarea name="comment" rows="3" placeholder="Review this {{$post->category->name}}"></textarea>

            @error('comment')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-6">
            <label for="total-score">Total Score</label>
            <input type="range" min='0' max='10' name='total-score' id='total-score'>

            @error('total-score')
            <span>{{ $message }}</span>
            @enderror
        </div>


        <div>
            <button class='submit-button' type="submit">Submit</button>
        </div>
    </form>
    @endif



    @else
    <p>
        <a class='small-link' href="/register">Register</a> or
        <a class='small-link' href="/login">login</a> to rate this {{$post->category->name}}.
    </p>
    @endauth

</div>
