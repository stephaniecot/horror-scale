<x-layout>

    <section class='max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6'>
@if ($favorites->count()==0)
<p>You don't have any favorites in your list</p>

@else
            @foreach ($favorites as $favorite)
            <ul>
                <li>{{$favorite->post->title}}</li>
            </ul>
            @endforeach
@endif

    </section>
</x-layout>