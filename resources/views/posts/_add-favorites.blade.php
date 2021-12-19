<section>
    @auth

@if ($post->favorite->contains('user_id', Auth::user()->id))
<p>This is in your favorites</p>

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
