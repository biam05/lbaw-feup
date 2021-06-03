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
        @if(in_array($type, ['report_user', 'report_content' ]) /* Ban */)
            <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#banUser_{{$user->id}}">
                Ban User
            </button>
            @include('partials.modals.ban', ['user_id' => $user->id ])
        @endif
        @if(in_array($type, ['report_content']) /* Remove Content */)
                <button class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$content->content_id}}">
                    Delete Content
                </button>
                @if($content->type === "post")
                    @include('partials.modals.delete_post', ['news' => $content])
                @else
                    @include('partials.modals.delete_comment', ['comment' => $content])
                @endif

        @endif
        @if(in_array($type, ['unban_appeal', 'partner_request']) /* Remove Content */)
            <form method="post" action="/request/{{ $request->id }}/accept/">
                {{csrf_field()}}
                @method('patch')
                <button href="#" class="btn btn-primary me-2">Accept</button>
            </form>
        @endif
        <form method="post" action="/request/{{ $request->id }}/reject/">
            {{csrf_field()}}
            @method('patch')
            <button href="#" class="btn btn-danger">Reject</button>
        </form>
    </div>
@endif
