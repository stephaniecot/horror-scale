<x-layout>
    <header>
        <h1 class='heading'>My Favorites</h1>
    </header>

    <section>


        <main class="container">
            @if ($favorites->count()==0)
            <p>You don't have any favorites in your list</p>
            @else
            <div class="cards-container">
                @foreach ($favorites as $favorite)
                <div class="card">
                    <h3 class='card-heading'>{{ $favorite->post->title }}</h3>
                    <a href="/posts/{{ $favorite->post->slug }}"><img class='card-img'
                        src="https://horror-scale.s3.ca-central-1.amazonaws.com/{{$favorite->post->thumbnail}}"
                            alt="{{$favorite->post->title}} thumbnail"></a>
                </div>


                @endforeach
            </div>
            @endif


        </main>

    </section>
</x-layout>
