@if($request->status)
    <p class="card-text">
        This request has been 
        @if($request->status === 'approved')
            <b class="text-success">{{$request->status}}</b>
        @else
            <b class="text-danger">{{$request->status}}</b>
        @endif
        by
        <a href="/user/{{$request->moderator->username}}" class="link-light">{{$request->moderator->username}}</a>.
    </p>
@else
    <a href="#" class="btn btn-primary me-1">Accept</a>
    <a href="#" class="btn btn-danger">Reject</a>
@endif
