<section>
    @auth

@if ($post->favorite->contains('user_id', Auth::user()->id))
<p>This is in your favorites</p>
<form method="post" action='/favorites/{{ $post->id }}''>
    @method('DELETE')
    @csrf

    <button type="submit">
        Remove from favorites
    </button>
</form>

@else

<form method="post">
    @csrf

    <button type="submit">
        Add to favorites
    </button>
</form>
@endif

    @endauth
</section>
