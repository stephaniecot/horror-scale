<x-layout>
    <header>

    </header>
    <main>
        <section>
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

                <h2 class='heading-secondary'>Score</h2>
                @if ($post->scores->count()===0)
                No score yet
                @else
                <h3>Total Score:</h3>
                <span class='score-span'><h4>{{ $post->scores->avg('total_score') }}</h4></span>
                <h4>{{$post->scores->count()}} votes</h4>
                @endif

            </div>
        </div>
    </div>


<div class="container">

    <div class='scores-container'>
        @include('posts._add-score')
        @include('posts._users-ratings')

    </div>
</div>
</section>
        </main>


</x-layout>
