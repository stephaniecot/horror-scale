<x-layout>
 <header>
            <h1 class='heading'>All Media</h1>
        </header>
    <section>


        <main class="container">


               <div class='filters'>
                   <a class='white-link' href="/posts">All Categories</a>
                   @foreach ($categories as $category)
                   <a class='white-link' href="/posts?category={{ $category->slug }}">{{ucwords($category->name)}}s</a>
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
            {{ $posts->links() }}
        </main>


    </section>

</x-layout>
