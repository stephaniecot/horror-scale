<x-layout>
    <header>
        <h1 class='heading'>Media by scores</h1>
    </header>
    <section>


        <main class="container">

            <div class="cards-container">
                @foreach ($posts as $post)
                <div class="card">
                    <h2 class='card-heading'>{{ $post->title }}</h2>
                    {{ucwords($post->category->name)}}
                    <a href="/posts/{{ $post->slug }}"><img class='card-img'
                        src="https://horror-scale.s3.ca-central-1.amazonaws.com/{{$post->thumbnail}}" alt="{{$post->title}} thumbnail"></a>
                    <h3 class='card-rating'>{{ $post->scores->avg('total_score') }}/10</h3>
                    <h3>{{$post->scores->count()}} votes</h3>

                </div>
                @endforeach

            </div>

        </main>

    </section>

</x-layout>
