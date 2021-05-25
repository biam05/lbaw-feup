<article class="card bg-light-dark text-white mb-3">
    <div class="card-body">
      <div class="card-title">
        <p>
          <i class="fas fa-user-friends"></i>
          <a href="/users/{{ $notification->follower->username }}" class="link-light"> {{$notification->follower->username}}</a>
          is
          <b class="text-secondary"> following </b>
          you.
        </p>
      </div>
    </div>
  </article>
