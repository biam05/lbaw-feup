<div class="container-xl p-3 bg-light-dark">
    @include('partials.singlecomment', ['level' => 0, 'author' => 'x/uCanadaba3', 'partner' => false, 'date' => "10 hours ago", 'comment' => "I love her so much!!!", 'votes' => '15', 'replies' => '1']) 
    @include('partials.singlecomment', ['level' => 1 , 'author' => 'x/johndoe', 'partner' => true, 'date' => "10 hours ago", 'comment' => "Yeah, she's an amazing artist :)", 'votes' => '2', 'replies' => '0']) 
    
    @include('partials.singlecomment', ['level' => 0, 'author' => "x/randomdude", 'partner' => false, 'date' => "2 days ago", 'comment' => "Never really liked her tbh", 'votes' => '1', 'replies' => '1'])
    
</div>  
