<x-layout>

    <section class='max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6'>
@if ($favorites->count()==0)
<p>You don't have any favorites in your list</p>

@else
            @foreach ($favorites as $favorite)
            <ul>
                <li>{{$favorite->post->title}}</li>
                <form method="post">
                    @csrf
                    @method('DELETE')

                    <button class='bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600'type="submit">
                        Remove from favorites
                    </button>
                </form>
            </ul>
            @endforeach
@endif

    </section>
</x-layout>
