<x-layout>
    <header>

    </header>
    <main>

        <div class="container">
        <div class="post-info-card">
            <div class="post-info-left">

                <img class='post-info-img' src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{$post->title}} thumbnail">
                @include('posts._add-favorites')
            </div>

            <div class="post-info-details">
                <h1>{{$post->title}} &#8212; {{$post->author}}</h1>
                <h3>{{$post->year}}</h3>
                <i>{{ucwords($post->category->name)}}</i>

                <h3>Summary</h3>
                <p>{{$post->summary}}</p>
            </div>
            <div class="post-info-score">
                <h3>Total :{{ $post->scores->avg('total_score') }}/10</h3>
                <h3>Spooky :{{ $post->scores->avg('spooky_score') }}</h3>
                <h3>Suspense :{{ $post->scores->avg('suspense_score') }}</h3>
                <h3>Gore :{{ $post->scores->avg('gore_score') }}</h3>
                <h3>Disturbing :{{ $post->scores->avg('disturbing_score') }}</h3>


                <h3>{{$post->scores->count()}} votes</h3>

            </div>
        </div>
    </div>


<div class="container">
    <ul>

        @include('posts._add-score')




        @foreach ($post->scores as $score)
        <li>{{$score->user->username}}</li>
        <li>{{$score->total_score}}</li>
        <li>{{$score->comment}}</li>
        @endforeach

    </ul>
</div>

        </main>


</x-layout>
