
<div class="card mb-3 text-white bg-light-dark">
    <div class="card-body">
        <div class="row card-title justify-content-between mb-2">
            <a href="/news/{{$news->content_id}}" class="col-auto text-white text-decoration-none">
                <h5>{{$news->title}}</h5>
            </a>

            
            @if (Auth::user() && $news->content->author_id === Auth::user()->id)
                <div class="col-auto">
                    <button type="button" class="card-report clickable-big text-primary pe-2 preventer" data-bs-toggle="modal" data-bs-target="#editPost_{{$news->content_id}}">
                        <i class="fa fa-pencil" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="col-auto card-report clickable-big text-danger preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$news->content_id}}">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
                </div>
                <?php $type="news" ?>
                
                @include('partials.modals.delete_post', ['news' => $news])
                @include('partials.modals.edit_post', ['news' => $news])

            @elseif (Auth::user() && Auth::user()->is_moderator)
                <div class="col-auto">
                    <button type="button" class="col-auto card-report clickable-big text-danger preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal_{{$news->content_id}}">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
                </div>
                @include('partials.modals.delete_post', ['news' => $news])
            @elseif(Auth::user() && $news->content->author_id != Auth::user()->id)
                @include('partials.modals.report', ['report_to_id' => $news->content_id, 'type'=>"news", 'tab'=>$type, 'device'=>$device])
                <button type="button" id="toastbtn" class="col-auto card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#reportContent_{{$news->content_id}}_{{$type}}_{{$device}}">
                    <i class="fas fa-exclamation-triangle"></i></button>
            @endif
        </div>

        <div class="row justify-content-between card-subtitle mb-2">
            <a class="col-auto clickable text-muted text-decoration-none" href="{{url('/user/' . $news->content->author->username)}}">
                <h6>
                    @if($news->content->author->is_partner)
                        <i class="fas fa-check"></i>
                    @endif
                    x/{{ $news->content->author->username  }}
                </h6>
            </a>
            <h6 class="col-auto text-muted">{{ $news->content->formatDate() }}</h6>
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

            @include('partials.news.vote',['news'=>$news, 'type'=>$type, 'device'=>$device])
            
            <button class="col-auto clickable text-white">
                <i class="fas fa-comment text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments"></i>
                &nbsp;{{$news->nr_comments}}
            </button>
        </div>
    </footer>
</div>

@once
    <script defer src="{{ asset('js/vote.js') }}"></script>
    <script defer src="{{ asset('js/reply.js') }}"></script>
@endonce
