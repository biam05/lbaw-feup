<p class="text-center text-light">Report Content.</p>
<div class="card bg-light-dark text-light mb-3">
    <div class="card-body">
        <div class="card-title">
            <i class="fas fa-exclamation-triangle"></i>
            <a href="/user/{{$request->request->user->username}}" class="link-light">{{$request->request->user->username}}</a>
            wants to <b class="text-secondary">report</b> a 
            <a href="/news/{{($request->content->type === "post") ? $request->content->content_id : $request->content->news_id}}" class="link-info">{{$request->content->type}}</a>
            made by 
            <a href="/user/{{$request->content->content->author->username}}" class="link-light">{{$request->content->content->author->username}}</a>
            :
        </div>
        <p class="card-text fw-light">{{$request->request->reason}}</p>
        <a href="#" class="btn btn-primary me-1">Accept</a>
        <a href="#" class="btn btn-danger">Reject</a>
    </div>
</div>
