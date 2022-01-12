<x-layout>
    <header class='banner'>
        <div class='video-banner'>
            <video class='video-content' autoplay muted loop>
                <source src="{{URL::asset("/images/smoke-1.mp4")}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class='heading'>
            <h1>We like heavy stuff</h1>
        </div>

    </header>
    <main>
        <section>
            <div class='container'>
                <h2 class='heading-secondary'>Members top pick</h2>
                <div class="cards-container">
                    @foreach ($scores->take(3) as $score)
                    <div class="card">
                        <h3 class='card-heading'>{{ $score->title }}</h3>
                        {{ucwords($score->category->name)}}
                        <a href="/posts/{{ $score->slug }}"><img class='card-img'
                            src="{{ asset('storage/' . $score->thumbnail) }}" alt="{{$score->title}} thumbnail"></a>
                            <span class='card-rating'>{{$score->scores->avg('total_score')}}</span>
                    </div>
                    @endforeach
                </div>
                <a href="/scores">All scores</a>
            </div>
        </section>

        <section>
            <div class="container">
                <h2 class='heading-secondary'>Add some weight on the horror scale</h2>
                <h3>I want to rate ...</h3>
                <div class="cards-container">
                @foreach ($categories as $category)

                    <a href="/posts?category={{ $category->slug }}"><div class='img-container'>
                    <img src="/images/{{$category->name}}.jpg" class='img-link' alt="" width="300px">
                    <h4 class='centered'>{{ucwords($category->slug)}}</h4>
                </div></a>
              
                @endforeach
            </div>

            </div>
        </section>

    </main>
</x-layout>
