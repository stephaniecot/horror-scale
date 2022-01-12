
    @auth

@if ($post->favorite->contains('user_id', Auth::user()->id))

<form method="post" action='/favorites/{{ $post->id }}''>
    @method('DELETE')
    @csrf

    <button class='general-button' type="submit">
        Remove from favorites
    </button>

</form>

@else

<form method="post">
    @csrf
    <button class='general-button' type="submit">
        Add to favorites
    </button>
</form>
@endif

    @endauth

