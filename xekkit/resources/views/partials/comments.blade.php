<div class="container-xl p-3 bg-light-dark">
    @foreach($news->comments as $comment)
        @include('partials.singlecomment', ['comment' => $comment,'level' => 0, 'author' => 'x/uCanadaba3', 'partner' => false, 'date' => "10 hours ago", 'comment' => "I love her so much!!!", 'votes' => '15', 'replies' => '1'])
    @endforeach
</div>
