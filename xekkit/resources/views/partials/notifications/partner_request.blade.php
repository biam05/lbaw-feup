<p class="text-center text-light">Partner Request.</p>

<div class="card bg-light-dark text-light mb-3">
  
    <div class="card-body">
        <div class="card-title">
            <p>
                <i class="fas fa-check"></i>
                <a href="/user/{{$request->request->user->username}}" class="link-light">{{$request->request->user->username}}</a> 
                wants to become a 
                <b class="text-secondary">partner</b>:
            </p>
        </div>
        <p class="card-text fw-light">{{$request->request->reason}}</p>
  
        @if($request->request->status)
            <p class="card-text">
                This request has been 
                @if($request->request->status === 'approved')
                    <b class="text-success">{{$request->request->status}}</b>
                @else
                    <b class="text-warning">{{$request->request->status}}</b>
                @endif
                by
                <a href="/user/{{$request->request->moderator->username}}" class="link-light">{{$request->request->moderator->username}}</a>.
            </p>
        @else
            <a href="#" class="btn btn-primary me-1">Accept</a>
            <a href="#" class="btn btn-danger">Reject</a>
        @endif
  
    </div>
</div> 
