<section>
    @auth

@if ($post->favorite->contains('user_id', Auth::user()->id))
<p>This is in your favorites</p>
<form method="post" action='/favorites/{{ $post->id }}''>
    @method('DELETE')
    @csrf

    <button class='bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600'type="submit">
        Remove from favorites
    </button>
</form>

@else

<form method="post">
    @csrf

    <button class='bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600'type="submit">
        Add to favorites
    </button>
</form>
@endif

    @endauth
</section>
