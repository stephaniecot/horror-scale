<x-layout>

    <section class='md:flex md:justify-between px-6 py-10'>


        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            @foreach ($posts as $post)
           <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a>

            @endforeach

        </main>
        {{ $posts->links() }}

    </section>

</x-layout>
