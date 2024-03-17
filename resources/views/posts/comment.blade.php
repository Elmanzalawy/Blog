

@foreach($post->comments as $comment)
    <div>
        <p>{{ $comment->body }}</p>
        <small>Commented by: {{ $comment->user->name }}</small>
    </div>
@endforeach
