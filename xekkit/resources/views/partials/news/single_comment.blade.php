<div class="row mb-3">
    @for ($i = 0; $i < $comment->level; $i++)
        <div class="col-auto ps-4"></div>
    @endfor
    <div class="col">
        <div class="d-flex">
            @if(!empty($comment->content->author->photo))
                <img src={{ asset('storage/img/users/' . $comment->content->author->photo) }} class="rounded-circle" alt="{{ $comment->content->author->username }}" width="30px" height="30px">
            @else
                <img src={{ asset('img/user.png') }} class="rounded-circle" alt="{{$comment->content->author->username}}" width="30px" height="30px">
            @endif
            <p class="text-white text-muted px-2 m-0"><small>
                    <a class="col-auto text-muted pe-2" href="../user/{{ $comment->content->author->username  }}">
                        @if($comment->content->author->is_partner){?>
                        <i class="fas fa-check"></i>
                        @endif
                        x/{{ $comment->content->author->username }}</a>{{ $comment->content->formatDate() }}</small>
                @if (Auth::user() && Auth::user()->is_moderator)
                    <button class="clickable-big text-muted ps-2" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$comment->content_id}}">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
{{--                    @include('partials.modals.delete_post', ['news' => $news])--}}
                @else
                    <button class="clickable-big text-muted ps-2">
                        <i class="fas fa-exclamation-triangle" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"></i>
                    </button>
                @endif
            </p>
        </div>
        <div class="row ms-4">
            <p class="text-white m-0 pb-1">{{ $comment->content->body }}</p>
            <div class="row align-items-center text-muted">
                <div class="col-auto d-flex flex-row pe-1 align-items-center">
                    <button class="clickable-big me-1">
                        <i class="fas fa-angle-up text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Upvote"></i>
                    </button>
                    <span class="col-auto ps-0 text-white">{{ $comment->content->nr_votes }}</span>
                    <button class="clickable-big ms-1">
                        <i class="fas fa-angle-down text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Downvote"></i>
                    </button>
                </div>
                <button type="button" class="col-auto clickable text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-reply text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Reply"></i> Reply
                </button>
            </div>
        </div>
    </div>
</div>
@each('partials.news.single_comment', $comment->getChilds, "comment")
