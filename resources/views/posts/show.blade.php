<x-layout>

<section>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <ul>
        <li>{{$post->title}}</li>
        <li>{{$post->category->name}}</li>
        <li>{{$post->author}}</li>
        <li>{{$post->year}}</li>

    </ul>

    </main>
</section>

</x-layout>
