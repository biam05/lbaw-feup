<article class="card bg-light-dark text-white mb-3">
    <div class="card-body">
      <div class="card-title">
        <p>
            @if($notification->getVote()->value > 0)
                <i class="fas fa-angle-up"></i>
            @else
                <i class="fas fa-angle-down"></i>
            @endif
            <a href="/users/{{ $notification->voter->username }}" class="link-light">{{ $notification->voter->username }}</a>
            @if($notification->getVote()->value > 0)
                <b class="text-success">upvoted </b>
            @else
                <b class="text-danger">downvoted </b>
            @endif
            your 
          <a href="/news/{{ $notification->content->id }}" class="link-light">post</a>.
        </p>
      </div>
    </div>
  </article>
