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
    <div class="d-flex">
        <form action="/comment/{{ $request->id }}/accept/">
            {{csrf_field()}}
            @method('patch')
            <button href="#" class="btn btn-primary me-1">Accept</button>
        </form>
        <form action="/comment/{{ $request->id }}/reject/">
            {{csrf_field()}}
            @method('patch')
            <button href="#" class="btn btn-danger">Reject</button>
        </form>
    </div>
@endif
