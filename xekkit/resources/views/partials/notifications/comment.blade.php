<article id="comment-{{$notification->users_id}}-{{$notification->comment_id}}" class="card bg-light-dark text-light comment-notification mb-3">
    <div class="card-body mx-2">
        <div class="card-title row justify-content-between">
            <p class="col">
                <i class="fas fa-comment"></i>
                <a href="/users/{{ $notification->author->username }}" class="link-light"> {{$notification->author->username}}</a>
                <b class="text-info">commented</b> your
                <a href="/news/{{ $notification->comment->news_id }}" class="link-light">post</a>:
            </p>
            <button class="col-1 text-danger" onClick="deleteNotification({{$notification}}, '{{$notification->type}}')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete notification">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <p class="card-text fw-light">{{ $notification->comment->content->body }}</p>
    </div>
</article>
