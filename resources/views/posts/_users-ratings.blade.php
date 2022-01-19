<div class='ratings-container'>
    <h2 class='heading-secondary'>Reviews</h2>
    @if($post->scores->count() === 0)
    <p>No reviews yet</p>
    @endif
    @foreach ($post->scores as $score)
    <div class='users-ratings'>
        <div>
            <h3>{{$score->user->username}}</h3>
            <h3>{{$score->total_score}}/10</h3>
            <h4>{{$score->created_at->diffForHumans()}}</h4>
        </div>
        <div>
        <p>{{$score->comment}}</p>
        </div>
    </div>
    @endforeach
</div>
