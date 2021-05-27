<article class="card bg-light-dark text-light comment-notification mb-3">
    <div class="card-body">
      <div class="card-title">
        <p>
          <i class="fas fa-comment"></i>
          <a href="/users/{{ $notification->author->username }}" class="link-light"> {{$notification->author->username}}</a>
          <b class="text-info">commented</b> your 
          <a href="/news/{{ $notification->comment->news_id }}" class="link-light">post</a>:
        </p>
      </div>
      <p class="card-text fw-light">{{ $notification->comment->content->body }}</p>
    </div>
  </article>
