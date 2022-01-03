<x-layout>

    <section>


        <main class="container">

            <div class="cards-container">
            @foreach ($posts as $post)
            <div class="card">
            <h3 class='card-heading'>{{ $post->title }}</h3>
            <a href="/posts/{{ $post->slug }}"><img class='card-img' src="{{ asset('storage/' . $post->thumbnail) }}" alt=""></a>
        </div>
            @endforeach

        </div>

        </main>
        {{ $posts->links() }}

    </section>

</x-layout>
