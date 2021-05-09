<nav class="hidden-lg-up">
    
    <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab-mobile" role="tablist">
        @auth
            @include('partials.tab', ['active' => True, 'type' => 'feed', 'pc' => False, 'name' => "Feed"])
            @include('partials.tab', ['active' => False, 'type' => 'recent', 'pc' => False, 'name' => "Recent"])
        @endauth

        @guest            
            @include('partials.tab', ['active' => True, 'type' => 'recent', 'pc' => False, 'name' => "Recent"])
        @endguest
        
        @include('partials.tab', ['active' => False, 'type' => 'hot', 'pc' => False, 'name' => "Hot"])
        @include('partials.tab', ['active' => False, 'type' => 'explore', 'pc' => False, 'name' => "Explore"])
        
    </ul>

    <div class="tab-content" id="pills-tabContent-mobile">
        @auth
            @include('partials.tab_content', ['active'=>True, 'type'=>'feed', 'pc'=>False, 'explore'=>False, 'posts'=>$feedPosts])
            @include('partials.tab_content', ['active'=>False, 'type'=>'recent', 'pc'=>False, 'explore'=>False, 'posts'=>$recentPosts]) 
        @endauth

        @guest
            @include('partials.tab_content', ['active'=>True, 'type'=>'recent', 'pc'=>False, 'explore'=>False, 'posts'=>$recentPosts]) 
        @endguest 

        @include('partials.tab_content', ['active'=>False, 'type'=>'hot', 'pc'=>False, 'explore'=>False, 'posts'=>$hotPosts]) 
        @include('partials.tab_content', ['active'=>False, 'type'=>'explore', 'pc'=>False, 'explore'=>True, 'posts'=>$feedPosts]) 
    </div>
</nav>