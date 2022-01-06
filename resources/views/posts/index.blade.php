<x-layout>

    <section>

        <header>
            <h1 class='heading'>All Posts</h1>
        </header>
        <main class="container">
            <select>
                <option value="category" disabled selected>Select Category
                </option>
                <option value="movies">Movies
                </option>
                <option value="books">Books
                </option>
            </select>



            <div class="cards-container">
                @foreach ($posts as $post)
                <div class="card">
                    <h3 class='card-heading'>{{ $post->title }}</h3>
                    {{$post->category->name}}
                    <a href="/posts/{{ $post->slug }}"><img class='card-img'
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt=""></a>

                </div>
                @endforeach

            </div>

        </main>
        {{ $posts->links() }}

    </section>

</x-layout>
