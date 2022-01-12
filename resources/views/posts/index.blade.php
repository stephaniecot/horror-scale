<x-layout>

    <section>

        <header>
            <h1 class='heading'>All Posts</h1>
        </header>
        <main class="container">


               <div>
                   <a class='general-button' href="/posts">See All</a>
                   @foreach ($categories as $category)
                   <a class='general-button'href="/posts?category={{ $category->slug }}">{{ucwords($category->name)}}</a>
                   @endforeach
                </div>


            <div class="cards-container">
                @foreach ($posts as $post)
                <div class="card">
                    <h3 class='card-heading'>{{ $post->title }}</h3>
                    {{ucwords($post->category->name)}}
                    <a href="/posts/{{ $post->slug }}"><img class='card-img'
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{$post->title}} thumbnail"></a>

                </div>
                @endforeach

            </div>

        </main>
        {{ $posts->links() }}

    </section>

</x-layout>
