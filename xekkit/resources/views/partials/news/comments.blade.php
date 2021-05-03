<form action="" class="container-xl mb-3 p-3 bg-light-dark"> 
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="postComment" class="form-label text-white fs-5">Leave a comment here:</label>
        <textarea class="form-control" id="postComment" rows="3" required>{{ old('postComment')}}</textarea>  
    </div>
    <div class="row pe-3">
        <button type="submit" class="col-auto btn btn-primary ms-auto">Send</button>
    </div>
</form>

@if(count($news->comments))
    <div class="container-xl p-3 bg-light-dark">
        @foreach($news->comments as $comment)
            @include('partials.news.single_comment', ['comment' => $comment,'level' => 0, 'author' => 'x/uCanadaba3', 'partner' => false, 'date' => "10 hours ago", 'comment' => "I love her so much!!!", 'votes' => '15', 'replies' => '1'])
        @endforeach
    </div>
@endif
