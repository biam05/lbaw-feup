<div class="card mb-3 text-white bg-light-dark">
    <div class="card-body">
        <div class="row card-title justify-content-between mb-2">
            <a href="/news/{{$news->content_id}}" class="col-auto text-white text-decoration-none">
                <h5>{{$news->title}}</h5>
            </a>

            <!--verificar se é o owner -->
            @if (Auth::user() && $news->content->author_id === Auth::user()->id)
                <div class="col-auto">
                    <button type="button" class="card-report clickable-big text-primary pe-2 preventer" data-bs-toggle="modal" data-bs-target="#editPost_{{$news->content_id}}">
                        <i class="fa fa-pencil" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="col-auto card-report clickable-big text-danger preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$news->content_id}}">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
                </div>
                @include('partials.modals.delete_post', ['news' => $news])
                @include('partials.modals.edit_post', ['news' => $news])
            @else
                <button type="button" id="toastbtn" class="col-auto card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-exclamation-triangle" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"></i>
                </button>
            @endif
        </div>

        <div class="row justify-content-between card-subtitle mb-2">
            <a class="col-auto clickable text-muted text-decoration-none"  href="{{url('/user/' . $news->content->author->username)}}">
                <h6>
                    @if($news->content->author->is_partner)
                        <i class="fas fa-check"></i>
                    @endif
                    x/{{ $news->content->author->username  }}
                </h6>
            </a>
            <h6 class="col-auto text-muted">{{ $news->formatDate() }}</h6>
        </div>

        <a href="/news/{{$news->content_id}}" class="clickable-small text-decoration-none">
            @isset($news->image)
                <img src={{ asset('storage/img/news/' . $news->image) }} class="card-img-top" alt="{{$news->title}}" draggable="false">
            @endisset
        </a>
    
            <p class="card-text mt-3 text-white">{!! nl2br(e($news->content->body)) !!}</p>
    </div>
    <footer class="card-footer text-muted">
        <div class="row">
            @foreach ($news->tags as $tag)
                <a href="/search?search={{$tag->name}}" class="col-auto clickable text-white px-1 text-decoration-none">#{{ $tag->name }}</a>
            @endforeach
        </div>
        <div class="row align-items-center">
            <div class="col-auto d-flex flex-column pe-1">
                <button onclick='vote("{{ $news->content->id }}", true)' class="clickable-big">
                    <i id="arrow_up" class="fas fa-angle-up text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Upvote"></i>
                </button>
                <button onclick='vote("{{ $news->content->id }}", false)' class="clickable-big">
                    <i id="arrow_down" class="fas fa-angle-down text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Downvote"></i>
                </button>
            </div>
            <span class="col-auto ps-1 text-white" id="n-votes">{{$news->content->nr_votes}}</span>
            <button class="col-auto clickable text-white">
                <i class="fas fa-comment text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments"></i>
                &nbsp;{{$news->nr_comments}}
            </button>
        </div>
    </footer>
</div>

@once
    <script defer src="{{ asset('js/vote.js') }}"></script>
@endonce