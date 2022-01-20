<div class='ratings-container'>
    <h2 class='heading-secondary'>Reviews</h2>
    @if($post->scores->count() === 0)
    <p>No reviews yet</p>
    @endif
    @foreach ($post->scores as $score)
    <div class='users-ratings'>
        <div class='rating-header'>
            <h4>{{$score->user->username}}</h4>
            <h4>{{$score->total_score}}/10</h4>

        </div>
        <i>{{$score->created_at->diffForHumans()}}</i>
        <div>
            <p>{{$score->comment}}</p>
        </div>
    </div>
    @endforeach
</div>
