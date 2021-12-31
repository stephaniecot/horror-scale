<x-layout>

    <section class='md:flex md:justify-between px-6 py-10'>


        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <h2>Movies by scores</h2>


            @foreach ($posts as $post)
           <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a>
           <h3>{{ $post->scores->avg('total_score') }}/10</h3>
           <h3>{{$post->scores->count()}} votes</h3>

            @endforeach

        </main>

    </section>

</x-layout>
