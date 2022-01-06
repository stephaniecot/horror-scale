<x-layout>

    <main>
    <ul>
        <li>{{$post->title}}</li>
        <li>{{$post->category->name}}</li>
        <li><img src="{{ asset('storage/' . $post->thumbnail) }}" alt=""></li>
        <li>{{$post->author}}</li>
        <li>{{$post->year}}</li>
        <li>{{$post->summary}}</li>
        <li>Total score : {{$post->scores->avg('total_score')}}/10</li>

        @include('posts._add-favorites')

       @foreach ($post->scores as $score)
       <li>{{$score->user->username}}</li>
       <li>{{$score->total_score}}</li>
       <li>{{$score->comment}}</li>
       @endforeach

    </ul>



   @include('posts._add-score')

    </main>


</x-layout>
