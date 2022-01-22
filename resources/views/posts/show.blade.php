<x-layout>
    <header>

    </header>
    <main>
        <section>
            <div class="container">
                <div class="post-info-card">
                    <div class="post-info-left">

                        <img class='post-info-img' src="https://horror-scale.s3.ca-central-1.amazonaws.com/{{$post->thumbnail}}"
                            alt="{{$post->title}} thumbnail">
                        @include('posts._add-favorites')

                    </div>

                    <div class="post-info-details">
                        <h1>{{$post->title}} &#8212; {{$post->author}}</h1>
                        <h3>{{$post->year}}</h3>
                        <i>{{ucwords($post->category->name)}}</i>
                        <div class='plot-box'>
                            <h4>Plot</h4>
                            <p> {{$post->summary}}</p>
                        </div>
                    </div>
                    <div class="post-info-score">

                        <h2 class='heading-secondary'>Rating</h2>
                        @if ($post->scores->count()===0)
                        No ratings yet
                        @else

                        <span class='score-span'>
                            <h4>{{ $post->scores->avg('total_score') }}</h4>
                        </span>
                        <i>{{$post->scores->count()}} votes</i>
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
    @include('components.message')


</x-layout>
